<?php

$idDataBase = "root";
$namaAtauIpServer = "localhost";
$namaDataBase = "stmik011100862";
$passwordDatabase = "password";

$connection = new mysqli($namaAtauIpServer, $idDataBase, $passwordDatabase, $namaDataBase);

if ($connection -> connect_error){
    echo $connection->connect_error;
    exit;
}

$id = $_GET["id"];
$password = $_GET["passwrod"];
$sql = "SELECT COUNT(id) AS idCount FROM pemakai WHERE id = '$id' AND password = '$password'";
$recordList = $connection->query($sql);

$connection->close();

if(!$recordList){
    echo $connection->error;
    exit;
}

if ($recordList->num_rows ==0){
    echo "Tidak ada data";
    exit;
}

while ($record = $recordList->fetch_assoc()){
    $arrOutput[] = $record;
}

echo json_decode($arrOutput);

$recordList->free();

?>