<?php
    include_once 'GetAllRecordsFromDb.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Results</title>

    <link rel="stylesheet" href="css/my.css">
</head>
<body>
<div class="container">
    <a href="index.php">Import data</a>
    <?php if(empty($records)): echo '</br> Записей в базе данных нет'?>
    <? else: ?>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <?php
            foreach ($records as $record)
                array_shift($record);
                foreach ($record as $key=>$value): ?>
                    <th scope="col"><?=$key?></th>
                    <?$mas[] = $key?>
            <? endforeach; ?>
            <?php $dataIntoFile[] = $mas ?>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($records as $record): array_shift($record); $dataIntoFile[] = (array_values($record));
        ?>
        <tr>
            <td><?=$record['UID']?></td>
            <td><?=$record['Name']?></td>
            <td><?=$record['Age']?></td>
            <td><?=$record['Email']?></td>
            <td><?=$record['Phone']?></td>
            <td><?=$record['Gender']?></td>
        </tr>
        <? endforeach; ?>
        </tbody>
    </table>
    <? endif?>
<!--    --><?php
//    $fp = fopen('file.csv', 'w');
//    foreach ($dataIntoFile as $fields) {
//        fputcsv($fp, $fields);
//    }
//    fclose($fp);
//    $file = 'file.csv';
//    function file_force_download($file) {
//        if (file_exists('file.csv')) {
//            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
//            // если этого не сделать файл будет читаться в память полностью!
//            if (ob_get_level()) {
//                ob_end_clean();
//            }
//            // заставляем браузер показать окно сохранения файла
//            header('Content-Description: File Transfer');
//            header('Content-Type: application/octet-stream');
//            header('Content-Disposition: attachment; filename=' . basename('file.csv'));
//            header('Content-Transfer-Encoding: binary');
//            header('Expires: 0');
//            header('Cache-Control: must-revalidate');
//            header('Pragma: public');
//            header('Content-Length: ' . filesize('file.csv'));
//            // читаем файл и отправляем его пользователю
//            readfile('file.csv');
//            exit;
//        }
//    }
//    file_force_download($fp);
//    ?>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>