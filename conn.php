<?php
function createDB($dbname)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password);
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if (mysqli_query($conn, $sql)) {
        echo "Baza danych została pomyślnie utworzona pod nazwą $dbname";
    } else {
        echo "Błąd podczas tworzenia bazy danych: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

function createTable($table_name, $field_name_one, $field_name_two)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = $_GET['db_name'];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Połączenie nieudane: " . mysqli_connect_error());
    }
    $sql = "CREATE TABLE IF NOT EXISTS $table_name(id INT AUTO_INCREMENT PRIMARY KEY, $field_name_one VARCHAR(255) NOT NULL, $field_name_two INT NOT NULL)";
    if (mysqli_query($conn, $sql)) {
        echo "<br>Tabela została utworzona pod nazwą $table_name";
    } else {
        echo "Błąd podczas tworzenia tabeli: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>