<?php require_once 'excel.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <h2><?php echo $title; ?></h2>
        
        <!-- Проверка, если есть ответ от сервера, то отображаем таблицу -->
        <?php if ($responce) : ?>
            <table>
                <tr>
                    <th>№</th>
                    <th>Название проверки</th>
                    <th>Статус</th>
                    <th></th>
                    <th>Текущее состояние</th>
                </tr>

                <!-- row 1 -->
                <tr>
                    <td rowspan="2">1</td>
                    <td rowspan="2">Проверка наличия файла robots.txt</td>
                    <?php echo $statusFile; ?>
                    <td>Состояние</td>
                    <td><?php echo $checkFile; ?></td>
                </tr>
                <tr> 
                    <td>Рекомендации</td>
                    <td><?php echo $checkFileRecom; ?></td>
                </tr>
                
                <!-- Проверка, если robots.txt сущетсвует, то выводим остальной результат -->
                <?php if ($responce[1] != 404) : ?>
            
                <!-- row 2 -->
                <tr>
                    <td rowspan="2">2</td>
                    <td rowspan="2">Проверка указания директивы Host</td>
                    <?php echo $statusHost; ?>
                    <td>Состояние</td>
                    <td><?php echo $checkHost; ?></td>
                </tr>
                <tr> 
                    <td>Рекомендации</td>
                    <td><?php echo $checkHostRecom; ?></td>
                </tr>

                <!-- row 3 -->
                <tr>
                    <td rowspan="2">3</td>
                    <td rowspan="2">Проверка количества директив Host, прописанных в файле</td>
                    <?php echo $statusCountHost; ?>
                    <td>Состояние</td>
                    <td><?php echo $checkCountHost; ?></td>
                </tr>
                <tr> 
                    <td>Рекомендации</td>
                    <td><?php echo $checkCountHostRecom; ?></td>
                </tr>

                <!-- row 4 -->
                <tr>
                    <td rowspan="2">4</td>
                    <td rowspan="2">Проверка размера файла robots.txt</td>
                    <?php echo $statusSize; ?>
                    <td>Состояние</td>
                    <td><?php echo $checkSize; ?></td>
                </tr>
                <tr> 
                    <td>Рекомендации</td>
                    <td><?php echo $checkSizeRecom; ?></td>
                </tr>

                <!-- row 5 -->
                <tr>
                    <td rowspan="2">5</td>
                    <td rowspan="2">Проверка указания директивы Sitemap</td>
                    <?php echo $statusSitemap; ?>
                    <td>Состояние</td>
                    <td><?php echo $checkSitemap; ?></td>
                </tr>
                <tr> 
                    <td>Рекомендации</td>
                    <td><?php echo $checkSitemapRecom; ?></td>
                </tr>

                <!-- row 6 -->
                <tr>
                    <td rowspan="2">6</td>
                    <td rowspan="2">Проверка кода ответа сервера для файла robots.txt</td>
                    <?php echo $statusResponce; ?>
                    <td>Состояние</td>
                    <td><?php echo $checkResponce; ?></td>
                </tr>
                <tr> 
                    <td>Рекомендации</td>
                    <td><?php echo $checkResponceRecom; ?></td>
                </tr>
                <?php endif; ?>

            </table>
        <?php endif; ?>

        <form action="excel.php" method="POST">
            <input type="hidden" name="site" value="<?php echo $siteUrl ?>">
            <input type="submit" name="save" value="Сохранить">
        </form>
    </div>
</body>
</html>