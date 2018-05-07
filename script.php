<?php 

// Table
if ($_POST['site']) {
    $siteUrl = trim($_POST['site']);

    // Проверка, если отсутсвует протокол, то добавляем протокол к домену
    if (preg_match('~.://~', $siteUrl) == false) {
        $siteUrl = 'http://' . $siteUrl;
    }

    // Проверка, если есть ответ от сервера значит адрес сайта корректный
    $responce = get_headers($siteUrl);
    if ($responce) {
        $title = 'Результат проверки: ' . $siteUrl;

        // Проверка наличия файла robots.txt
        $headers = get_headers($siteUrl.'/robots.txt');
        $responce = explode(" ", $headers[0]);

        if ($responce[1] != 404) {
            // Файл robots.txt присутствует
            $checkFile = 'Файл robots.txt присутствует';
            $checkFileRecom = 'Доработки не требуются';
            $statusFile = '<td class="ok" rowspan="2">Oк</td>';
            $statusFileExcel = 'Ок';

            // Получаем содержимое robots.txt
            $html = file_get_contents($siteUrl.'/robots.txt');

            // Проверка указания директивы Host
            if (preg_match('~Host~', $html)) {
                // Директива Host указана
                $checkHost = 'Директива Host указана.';
                $checkHostRecom = 'Доработки не требуются';
                $statusHost = '<td class="ok" rowspan="2">Oк</td>';
                $statusHostExcel = 'Ок';

                // Проверка к-во директив Host прописанных в файле
                $countHost = substr_count($html, 'Host');
                if ($countHost == 1) {
                    // К-во директив равно 1
                    $checkCountHost = 'В файле прописана 1 директива Host';
                    $checkCountHostRecom = 'Доработки не требуются';
                    $statusCountHost = '<td class="ok" rowspan="2">Oк</td>';
                    $statusCountHostExcel = 'Ок';

                } else {
                    // К-во директив больше 1
                    $checkCountHost = 'В файле прописано несколько директив Host';
                    $checkCountHostRecom = 'Программист: Директива Host должна быть указана в файле толоко 1 раз. Необходимо удалить все дополнительные директивы Host и оставить только 1, корректную и соответствующую основному зеркалу сайта';
                    $statusCountHost = '<td class="error" rowspan="2">Ошибка</td>';
                    $statusCountHostExcel = 'Ошибка';
                }

            } else {
                // В файле robots.txt не указана директива Host
                $checkHost = 'В файле robots.txt не указана директива Host.';
                $checkHostRecom = 'Программист: Для того, чтобы поисковые системы знали, какая версия сайта является основных зеркалом, необходимо прописать адрес основного зеркала в директиве Host. В данный момент это не прописано. Необходимо добавить в файл robots.txt директиву Host. Директива Host задётся в файле 1 раз, после всех правил.';
                $statusHost = '<td class="error" rowspan="2">Ошибка</td>';
                $statusHostExcel = 'Ошибка';

                // Проверка невозможна, т.к. директива Host отсутствует
                $checkCountHost = 'Проверка невозможна, т.к. директива Host отсутствует';
                $statusCountHost = '<td class="error" rowspan="2">Ошибка</td>';
                $statusCountHostExcel = 'Ошибка';
            }

            // Проверка размера файла robots.txt
            $file_open = fopen($siteUrl, "r");
            $file_size = "";
            while(($str = fread($file_open, 1024)) != null) {
                $file_size += strlen($str);
            }
            
            // Конвертирование чисел
            function size_convert($bytes) {
                $bytes = floatval($bytes);
                    $arBytes = array(
                        0 => array(
                            "UNIT" => "TB",
                            "VALUE" => pow(1024, 4)
                        ),
                        1 => array(
                            "UNIT" => "GB",
                            "VALUE" => pow(1024, 3)
                        ),
                        2 => array(
                            "UNIT" => "MB",
                            "VALUE" => pow(1024, 2)
                        ),
                        3 => array(
                            "UNIT" => "KB",
                            "VALUE" => 1024
                        ),
                        4 => array(
                            "UNIT" => "B",
                            "VALUE" => 1
                        ),
                    );
        
                foreach($arBytes as $arItem) {
                    if($bytes >= $arItem["VALUE"]) {
                        $result = $bytes / $arItem["VALUE"];
                        $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
                        break;
                    }
                }
                return $result;
            }

            // Проверка robots.txt, если размер меньше или равно 32
            if (size_convert($file_size) <= 32) {
                // Размер файла находится в пределах допустимой нормы
                $checkSize = 'Размер файла robots.txt состаляет ' . size_convert($file_size) . ', что находится впределах допустимой нормы';
                $checkSizeRecom = 'Доработки не требуются';
                $statusSize = '<td class="ok" rowspan="2">Oк</td>';
                $statusSizeExcel = 'Ок';

            } else {
                // Размер файла превышает допустимую норму
                $checkSize = 'Размер файла robots.txt состаляет ' . size_convert($file_size) . ', что превышает допустимую норму';
                $checkSizeRecom = 'Программист: Максимально допустимый размер файла robots.txt составляем 32 кб. Необходимо отредактировть файл robots.txt таким образом, чтобы его размер не превышал 32 Кб';
                $statusSize = '<td class="error" rowspan="2">Ошибка</td>';
                $statusSizeExcel = 'Ошибка';
            }

            // Проверка указания директивы Sitemap
            if (preg_match('~Sitemap~', $html)) {
                // Директива Sitemap указана
                $checkSitemap = 'Директива Sitemap указана';
                $checkSitemapRecom = 'Доработки не требуются';
                $statusSitemap = '<td class="ok" rowspan="2">Oк</td>';
                $statusSitemapExcel = 'Ок';

            } else {
                // В файле robots.txt не указана директива Sitemap
                $checkSitemap = 'В файле robots.txt не указана директива Sitemap';
                $checkSitemapRecom = 'Программист: Добавить в файл robots.txt директиву Sitemap';
                $statusSitemap = '<td class="error" rowspan="2">Ошибка</td>';
                $statusSitemapExcel = 'Ошибка';
            }

            // Проверка кода ответа от сервера файла robots.txt
            if ($responce[1] == 200) {
                // Статус 200
                $checkResponce = "Файл robots.txt отдает код ответа от сервера 200";
                $checkResponceRecom = 'Доработки не требуются';
                $statusResponce = '<td class="ok" rowspan="2">Oк</td>';
                $statusResponceExcel = 'Ок';

            } else {
                // Статус не равен 200
                $checkResponce = "При обращении к файлу robots.txt сервер возвращает код ответа " .$responce[1];
                $checkResponceRecom = "Программист: Файл robots.txt должны отдавать код ответа 200, иначе файл не будет обрабатываться. Необходимо настроить сайт таким образом, чтобы при обращении к файлу robots.txt сервер возвращает код ответа 200";
                $statusResponce = '<td class="error" rowspan="2">Ошибка</td>';
                $statusResponceExcel = 'Ошибка';
            }

        } else {
            // Файл robots.txt не сущетсвует.
            $checkFile = 'Файл robots.txt отсутствует.';
            $checkFileRecom = 'Программист: Создать файл robots.txt и разместить его на сайте.';
            $statusFile = '<td class="error" rowspan="2">Ошибка</td>';
            $statusFileExcel = 'Ошибка';
        }

    } else {
        // Некорректный адрес сайта
        $title = "Ошибка. Неверный адрес сайта!";
    }
    
}

