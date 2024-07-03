<?php 
session_start();
include "../app/database/db.php";
include "../path.php";



$idRepair = $_POST['id_repairs'];
$RepairsTextPart = $_POST['text-part'];
$part_number = $_POST['part_number'];

$CNC = selectCNConInv($machine_inventory);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}else{
    $RepairsData = [
      
        'id_repairs' => $idRepair,
        'part_number' => $part_number,
        'text' => $RepairsTextPart,

    ];

    $idRepair = insert('repairs_part',$RepairsData);
 
    // die('success');
  
}


$file = $_FILES['file'];
//  Получаем количество загружаемых элементов в многомерном массиве
$allfile =  count($file['name']);
for ($i = 0; $i < $allfile; $i++) {

    $path = ROOT_PATH . "/assets/img/repairs/";
    foreach($_FILES['file'] as $k => $l) {
        foreach($l as $i => $v) {
            $files[$i][$k] = $v;
        }
    };		
  
    foreach ($files as $k => $file) {
    
        $error = $success = '';
        // Проверим на ошибки загрузки.
        if (!empty($file['error']) || empty($file['tmp_name'])) {
            switch (@$file['error']) {
                case 1:
                case 2: array_push($errMsg,"Превышен размер загружаемого файла."); break;
                case 3: array_push($errMsg,"Файл был получен только частично."); break;
                
                case 6: array_push($errMsg,"Файл не загружен - отсутствует временная директория."); break;
                case 7: array_push($errMsg,"Не удалось записать файл на диск."); break;
                case 8: array_push($errMsg,"PHP-расширение остановило загрузку файла."); break;
                case 9: array_push($errMsg,"Файл не был загружен - директория не существует."); break;
                case 10: array_push($errMsg,"Превышен максимально допустимый размер файла."); break;
                case 11: array_push($errMsg,"Данный тип файла запрещен."); break;
                case 12: array_push($errMsg,"Ошибка при копировании файла."); break;
                default: array_push($errMsg,"Файл не был загружен - неизвестная ошибка."); break;
            }
        } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
    
            $error = 'Не удалось загрузить файл.';
        } else {
            // Оставляем в имени файла только буквы, цифры и некоторые символы.
            $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
            $name = mb_eregi_replace($pattern, '-', $file['name']);
            $name = mb_ereg_replace('[-]+', '-', $name);
            
            // Т.к. есть проблема с кириллицей в названиях файлов (файлы становятся недоступны).
            // Сделаем их транслит:
            $converter = array(
                'а' => 'a',   'б' => 'b',   'в' => 'v',    'г' => 'g',   'д' => 'd',   'е' => 'e',
                'ё' => 'e',   'ж' => 'zh',  'з' => 'z',    'и' => 'i',   'й' => 'y',   'к' => 'k',
                'л' => 'l',   'м' => 'm',   'н' => 'n',    'о' => 'o',   'п' => 'p',   'р' => 'r',
                'с' => 's',   'т' => 't',   'у' => 'u',    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',  'ь' => '',    'ы' => 'y',   'ъ' => '',
                'э' => 'e',   'ю' => 'yu',  'я' => 'ya', 
            
                'А' => 'A',   'Б' => 'B',   'В' => 'V',    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
                'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
                'Л' => 'L',   'М' => 'M',   'Н' => 'N',    'О' => 'O',   'П' => 'P',   'Р' => 'R',
                'С' => 'S',   'Т' => 'T',   'У' => 'U',    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
                'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',  'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
                'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
            );
    
            $name_file = strtr($name, $converter);
            
            $parts = pathinfo($name);
    
            if (empty($name_file) || empty($parts['extension'])) {
                array_push($errMsg,"Недопустимый тип файла");
            } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                array_push($errMsg,"Недопустимый тип файла");
            } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                array_push($errMsg,"Недопустимый тип файла");
            } else {
                // Чтобы не затереть файл с таким же названием, добавим префикс.
                $i = 0;
                $prefix = '';
                while (is_file($path . $parts['filename'] . $prefix . '.' . $parts['extension'])) {
                      $prefix = '(' . ++$i . ')';
                }
                $name_file_up = $parts['filename'] . $prefix . '.' . $parts['extension'];
                
                // Перемещаем файл в директорию.
             
                if (move_uploaded_file($file['tmp_name'], $path . $name_file_up)) {
    
                    $repairs_img_up = [ 
                        'id_patr' =>  $idRepair,
                        'name_img' => $name_file_up,
                        'part' => $part_number
                    ];
                   
                    // Далее можно сохранить название файла в БД и т.п.
                    $error_img = insert('img_repairs', $repairs_img_up);
                    $success = 'Файл «' . $name_file_up . '» успешно загружен.';
                } else {
                    $error = 'Не удалось загрузить файл.';
                }
            }
        }
        
        // Выводим сообщение о результате загрузки.
    
    
    
    }

};