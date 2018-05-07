<?php

require_once 'Classes/PHPExcel.php';
require_once 'script.php';

// Excel
if ($_POST['save']) {

    // Создание обьекта PHPexcel
    $excel = new PHPExcel();
    $excel->setActiveSheetIndex(0);
    $getActiveSheet = $excel->getActiveSheet();

    // Установка ширины столбцов
    $getActiveSheet->getColumnDimension('A')->setWidth(5);
    $getActiveSheet->getColumnDimension('B')->setWidth(55);
    $getActiveSheet->getColumnDimension('C')->setWidth(10);
    $getActiveSheet->getColumnDimension('D')->setWidth(15);
    $getActiveSheet->getColumnDimension('E')->setWidth(70);

    // Установка высоты столбцов
    for ($i = 1; $i < 20; $i++) {
        $getActiveSheet->getRowDimension($i)->setRowHeight(15);
    }

    // Стили для верхней надписи строка 1
    $styleHeader = array(
        // Шрифт
        'font' => array(
            'bold' => true
        ),

        //Заполнение цветом
        'fill' => array(
            'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
            'color' => array(
                'rgb' => '8DB6CD'
            )
        ),

        //рамки
        'borders' => array(
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'left' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'right' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            )
        )
    );
    
    $getActiveSheet->getStyle('A1')->applyFromArray($styleHeader);
    $getActiveSheet->getStyle('B1')->applyFromArray($styleHeader);
    $getActiveSheet->getStyle('C1')->applyFromArray($styleHeader);
    $getActiveSheet->getStyle('D1')->applyFromArray($styleHeader);
    $getActiveSheet->getStyle('E1')->applyFromArray($styleHeader);

    // Дополнительные стили для "А,С" строка 1
    $styleAC = array (
        // Выравнивание
        'alignment' => array (
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        )
    );

    $getActiveSheet->getStyle('A1')->applyFromArray($styleAC);
    $getActiveSheet->getStyle('C1')->applyFromArray($styleAC);

    // Стили для строки 2,5,8,11,14,17
    $styleRow2_17 = array(
        //Заполнение цветом
        'fill' => array(
            'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
            'color' => array(
                'rgb' => 'E8E8E8'
            )
        ),

        //рамки
        'borders' => array(
            'top' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'left' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'right' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            )
        )
    );

    // Строки 2,5,8,11,14,17
    $getActiveSheet->getStyle('A2:E2')->applyFromArray($styleRow2_17);
    $getActiveSheet->getStyle('A5:E5')->applyFromArray($styleRow2_17);
    $getActiveSheet->getStyle('A8:E8')->applyFromArray($styleRow2_17);
    $getActiveSheet->getStyle('A11:E11')->applyFromArray($styleRow2_17);
    $getActiveSheet->getStyle('A14:E14')->applyFromArray($styleRow2_17);
    $getActiveSheet->getStyle('A17:E17')->applyFromArray($styleRow2_17);

    // Стили для ячеек "A,В,С" строки 3-4, 6-7, 9-10, 12-13, 15-16, 18-19
    $styleRow3_19 = array(
        // Выравнивание
        'alignment' => array (
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        ),

        //Заполнение цветом
        'fill' => array(
            'type' => PHPExcel_STYLE_FILL::FILL_SOLID
        ),

        //рамки
        'borders' => array(
            'top' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'left' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'right' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            )
        )
    );

    // Ячеки "А"
    $getActiveSheet->getStyle('A3:A4')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('A6:A7')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('A9:A10')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('A12:A13')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('A15:A16')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('A18:A19')->applyFromArray($styleRow3_19);

    // Ячеки "В"
    $getActiveSheet->getStyle('B3:B4')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('B6:B7')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('B9:B10')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('B12:B13')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('B15:B16')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('B18:B19')->applyFromArray($styleRow3_19);

    // Ячеки "С"
    $getActiveSheet->getStyle('C3:C4')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('C6:C7')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('C9:C10')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('C12:C13')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('C15:C16')->applyFromArray($styleRow3_19);
    $getActiveSheet->getStyle('C18:C19')->applyFromArray($styleRow3_19);

    // Дополнительныес стили для ячейки "А" строки 3-4, 6-7, 9-10, 12-13, 15-16, 18-19
    $styleA = array(
        // Выравнивание
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
    );

    $getActiveSheet->getStyle('A3:A4')->applyFromArray($styleA);
    $getActiveSheet->getStyle('A6:A7')->applyFromArray($styleA);
    $getActiveSheet->getStyle('A9:A10')->applyFromArray($styleA);
    $getActiveSheet->getStyle('A12:A13')->applyFromArray($styleA);
    $getActiveSheet->getStyle('A15:A16')->applyFromArray($styleA);
    $getActiveSheet->getStyle('A18:A19')->applyFromArray($styleA);

    // Стили для ячейки "C" строки 3-4, 6-7, 9-10, 12-13, 15-16, 18-19
    // $statusFileExcel если Ок, то закрашиваем зеленым иначе красным
    if ($statusFileExcel == 'Ок') {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => '90EE90'
                )
            ),
        );

        $getActiveSheet->getStyle('C3:C4')->applyFromArray($styleC);
    
    } else {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => 'FF6347'
                )
            ),
        );

        $getActiveSheet->getStyle('C3:C4')->applyFromArray($styleC);
    }

    // $statusHostExcel если Ок, то закрашиваем зеленым иначе красным
    if ($statusHostExcel == 'Ок') {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => '90EE90'
                )
            ),
        );

        $getActiveSheet->getStyle('C6:C7')->applyFromArray($styleC);
    
    } else {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => 'FF6347'
                )
            ),
        );

        $getActiveSheet->getStyle('C6:C7')->applyFromArray($styleC);
    }

    // $statusCountHostExcel если Ок, то закрашиваем зеленым иначе красным
    if ($statusCountHostExcel == 'Ок') {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => '90EE90'
                )
            ),
        );

        $getActiveSheet->getStyle('C9:C10')->applyFromArray($styleC);
    
    } else {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => 'FF6347'
                )
            ),
        );

        $getActiveSheet->getStyle('C9:C10')->applyFromArray($styleC);
    }
    
    // $statusSizeExcel если Ок, то закрашиваем зеленым иначе красным
    if ($statusSizeExcel == 'Ок') {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => '90EE90'
                )
            ),
        );

        $getActiveSheet->getStyle('C12:C13')->applyFromArray($styleC);
    
    } else {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => 'FF6347'
                )
            ),
        );

        $getActiveSheet->getStyle('C12:C13')->applyFromArray($styleC);
    }
    
    // $statusSitemapExcel если Ок, то закрашиваем зеленым иначе красным
    if ($statusSitemapExcel == 'Ок') {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => '90EE90'
                )
            ),
        );

        $getActiveSheet->getStyle('C15:C16')->applyFromArray($styleC);
    
    } else {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => 'FF6347'
                )
            ),
        );

        $getActiveSheet->getStyle('C15:C16')->applyFromArray($styleC);
    }
    
    // $statusResponceExcel если Ок, то закрашиваем зеленым иначе красным
    if ($statusResponceExcel == 'Ок') {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => '90EE90'
                )
            ),
        );

        $getActiveSheet->getStyle('C18:C19')->applyFromArray($styleC);
    
    } else {
        $styleC = array(
            // Выравнивание
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            ),
    
            //Заполнение цветом
            'fill' => array(
                'type' => PHPExcel_STYLE_FILL::FILL_SOLID,
                'color' => array(
                    'rgb' => 'FF6347'
                )
            ),
        );

        $getActiveSheet->getStyle('C18:C19')->applyFromArray($styleC);
    }

    // Допольнительные стили для "D" строки 3-4, 6-7, 9-10, 12-13, 15-16, 18-19
    $styleD = array(
        // Выравнивание
        'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'wrap' => true
        ),

        //рамки
        'borders' => array(
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'left' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'right' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            )
        )
    );

    $getActiveSheet->getStyle('D3')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D4')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D6')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D7')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D9')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D10')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D12')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D13')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D15')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D16')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D18')->applyFromArray($styleD);
    $getActiveSheet->getStyle('D19')->applyFromArray($styleD);


    // Допольнительные стили для "E" строки 3-4, 6-7, 9-10, 12-13, 15-16, 18-19
    $styleE = array(
        // Выравнивание
        'alignment' => array(
            'wrap' => true
        ),

        //рамки
        'borders' => array(
            'bottom' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'left' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            ),
            'right' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => 'BEBEBE'
                )
            )
        )
    );
    $getActiveSheet->getStyle('E3')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E4')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E6')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E7')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E9')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E10')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E12')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E13')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E15')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E16')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E18')->applyFromArray($styleE);
    $getActiveSheet->getStyle('E19')->applyFromArray($styleE);

    // Обьединение строк 3-4, 6-7, 9-10, 12-13, 15-16, 18-19
    $getActiveSheet->mergeCells('A3:A4');
    $getActiveSheet->mergeCells('B3:B4');
    $getActiveSheet->mergeCells('C3:C4');

    $getActiveSheet->mergeCells('A6:A7');
    $getActiveSheet->mergeCells('B6:B7');
    $getActiveSheet->mergeCells('C6:C7');

    $getActiveSheet->mergeCells('A9:A10');
    $getActiveSheet->mergeCells('B9:B10');
    $getActiveSheet->mergeCells('C9:C10');

    $getActiveSheet->mergeCells('A12:A13');
    $getActiveSheet->mergeCells('B12:B13');
    $getActiveSheet->mergeCells('C12:C13');

    $getActiveSheet->mergeCells('A15:A16');
    $getActiveSheet->mergeCells('B15:B16');
    $getActiveSheet->mergeCells('C15:C16');

    $getActiveSheet->mergeCells('A18:A19');
    $getActiveSheet->mergeCells('B18:B19');
    $getActiveSheet->mergeCells('C18:C19');

    // Заполнение таблицы данными
    // Шапка таблицы
    $getActiveSheet->setCellValue('A1', '№');
    $getActiveSheet->setCellValue('B1', 'Название проверки');
    $getActiveSheet->setCellValue('C1', 'Статус');
    $getActiveSheet->setCellValue('D1', '');
    $getActiveSheet->setCellValue('E1', 'Текущее состояние');

    // Ячейка "А"
    $getActiveSheet->setCellValue('A3', 1);
    $getActiveSheet->setCellValue('A6', 2);
    $getActiveSheet->setCellValue('A9', 3);
    $getActiveSheet->setCellValue('A12', 4);
    $getActiveSheet->setCellValue('A15', 5);
    $getActiveSheet->setCellValue('A18', 6);

    // Ячейка "В"
    $getActiveSheet->setCellValue('B3', 'Проверка наличия файла robots.txt');
    $getActiveSheet->setCellValue('B6', 'Проверка указания директивы Host');
    $getActiveSheet->setCellValue('B9', 'Проверка количества директив Host, прописанных в файле');
    $getActiveSheet->setCellValue('B12', 'Проверка размера файла robots.txt');
    $getActiveSheet->setCellValue('B15', 'Проверка указания директивы Sitemap');
    $getActiveSheet->setCellValue('B18', 'Проверка кода ответа сервера для файла robots.txt');

    // Ячейка "C"
    $getActiveSheet->setCellValue('C3', $statusFileExcel);
    $getActiveSheet->setCellValue('C6', $statusHostExcel);
    $getActiveSheet->setCellValue('C9', $statusCountHostExcel);
    $getActiveSheet->setCellValue('C12', $statusSizeExcel);
    $getActiveSheet->setCellValue('C15', $statusSitemapExcel);
    $getActiveSheet->setCellValue('C18', $statusResponceExcel);

    // Ячейка "D"
    $getActiveSheet->setCellValue('D3', 'Состояние');
    $getActiveSheet->setCellValue('D4', 'Рекомендации');
    $getActiveSheet->setCellValue('D6', 'Состояние');
    $getActiveSheet->setCellValue('D7', 'Рекомендации');
    $getActiveSheet->setCellValue('D9', 'Состояние');
    $getActiveSheet->setCellValue('D10', 'Рекомендации');
    $getActiveSheet->setCellValue('D12', 'Состояние');
    $getActiveSheet->setCellValue('D13', 'Рекомендации');
    $getActiveSheet->setCellValue('D15', 'Состояние');
    $getActiveSheet->setCellValue('D16', 'Рекомендации');
    $getActiveSheet->setCellValue('D18', 'Состояние');
    $getActiveSheet->setCellValue('D19', 'Рекомендации');

    // Ячейка "E"
    $getActiveSheet->setCellValue('E3', $checkFile);
    $getActiveSheet->setCellValue('E4', $checkFileRecom);
    $getActiveSheet->setCellValue('E6', $checkHost);
    $getActiveSheet->setCellValue('E7', $checkHostRecom);
    $getActiveSheet->setCellValue('E9', $checkCountHost);
    $getActiveSheet->setCellValue('E10', $checkCountHostRecom);
    $getActiveSheet->setCellValue('E12', $checkSize);
    $getActiveSheet->setCellValue('E13', $checkSizeRecom);
    $getActiveSheet->setCellValue('E15', $checkSitemap);
    $getActiveSheet->setCellValue('E16', $checkSitemapRecom);
    $getActiveSheet->setCellValue('E18', $checkResponce);
    $getActiveSheet->setCellValue('E19', $checkResponceRecom);

    // Запись и сохранение в файле table.xls 
    header("Content-Type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename='table.xls'");

    $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
    $objWriter->save('php://output');

}