<?php

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $line = [$name, $surname];

        try {
            saveToFile($line);
            echo 'Hello ' . $name . ' ' . $surname . '!';
        } catch (Exception $ex) {
            http_response_code(500);
        }
}

function saveToFile($line) {
    $handle = fopen("/tmp/names.csv", "a");
    if ($handle == false) {
        throw new Exception('Unable to open csv file!');
    } else {
        $length=fputcsv($handle, $line);
        if($length == false) {
            throw new Exception('Unable to save line to csv file!');
        }
        fclose($handle);
    }
}
