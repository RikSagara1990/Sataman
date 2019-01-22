<?php
/**
 * Функция загрузки файла (аплоадер)
 * @param  int    $max_file_size    максимальный размер файла в мегабайтах
 * @param  array  $valid_extensions массив допустимых расширений
 * @param  string $upload_dir       директория загрузки
 * @return array                    сообщение о ходе выполнения
 */

    
    function uploadHandle($max_file_size = 1024, $valid_extensions = array(), $upload_dir = '.', $name)
    {
        $error = null;
        $info  = null;
        $max_file_size *= 1048576;  // размер файла в Mb
        if ($_FILES['loadlogo']['error'] === UPLOAD_ERR_OK)
        {
            // проверяем расширение файла
            $file_extension = pathinfo($_FILES['loadlogo']['name'], PATHINFO_EXTENSION);
            if (in_array(strtolower($file_extension), $valid_extensions))
            {
                // проверяем размер файла
                if ($_FILES['loadlogo']['size'] < $max_file_size)
                {
          $file_name = $name .'.jpeg'; 
                    $destination = $upload_dir .'/' . $file_name;


                    if (move_uploaded_file($_FILES['loadlogo']['tmp_name'], $destination))
                        $info = 'Файл успешно загружен';
                    else
                        $error = 'Не удалось загрузить файл';
                }
                else
                    $error = 'Размер файла больше допустимого';
            }
            else
                $error = 'У файла недопустимое расширение';
        }
        else
        {
            // массив ошибок
            $error_values = array(

                UPLOAD_ERR_INI_SIZE   => 'Размер файла больше разрешенного директивой upload_max_filesize в php.ini',
                UPLOAD_ERR_FORM_SIZE  => 'Размер файла превышает указанное значение в MAX_FILE_SIZE',
                UPLOAD_ERR_PARTIAL    => 'Файл был загружен только частично',
                UPLOAD_ERR_NO_FILE    => 'Не был выбран файл для загрузки',
                UPLOAD_ERR_NO_TMP_DIR => 'Не найдена папка для временных файлов',
                UPLOAD_ERR_CANT_WRITE => 'Ошибка записи файла на диск'

                                  );

            $error_code = $_FILES['loadlogo']['error'];

            if (!empty($error_values[$error_code]))
                $error = $error_values[$error_code];
            else
                $error = 'Случилось что-то непонятное';
        }

        return array('info' => $info, 'error' => $error, 'destination' => $destination);
    }

    function loadimage($enname){
        $extensions = array('jpg', 'jpeg'); //какие типы файлов разрешается загружать
        $upload_dir = '../img/food';  // папка для загрузки (создать на сервере)
        // $enname - задает имя файла
        $message = uploadHandle(8, $extensions, $upload_dir, $enname);
        if(!empty($message['error'])) {
            if($message['error'] = 'Не был выбран файл для загрузки') {
                echo "<script>alert(\"{$message['error']}\")</script>";
                return $message['destination'] = '///img/food/none.jpg';
            }
            echo "<script>alert(\"{$message['error']}\")</script>";
            exit();}
        return $message['destination'];
    }
?>
