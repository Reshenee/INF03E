<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<?php

    $serwer = 'localhost'; 
    $user = 'root';
    $haslo = '';
    $baza = 'motory';

    $conn = new mysqli($serwer, $user, $haslo, $baza);

?>
<body>
    <img src="pliki/motor.png" alt="motocykl">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <main>
        <section id="left">
            <h2>Gdzie pojechac?</h2>
            <dl>
                <?php
                    $sql = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM wycieczki NATURAL JOIN zdjecia";
                    if ($udane = $conn -> query($sql)){
                        while ($row = $udane -> fetch_row()){
                            echo "<dt> $row[0] rozpoczyna się w $row[2] , <a href='pliki/$row[3].jpg'>zobacz zdjęcie</a></dt>";
                            echo "<dd> $row[1] </dd>";
                        }
                    }
                ?>
            </dl>
        </section>
        <section id="right">
            <section id="right-up">
                <h2>Co kupic?</h2>
                <ol>
                    <li>Honda CBR125R</li>
                    <li>Yamaha YBR125</li>
                    <li>Honda VFR800i</li>
                    <li>Honda CBR1100XX</li>
                    <li>BMW R1200GS LC</li>
                </ol>
            </section>
            <section id="right-down">
                <h2>Statystyki</h2>
                <p>Wpisanych wycieczek: <?php $sql = "SELECT COUNT(wycieczki.id) as 'wycieczki' FROM wycieczki;";
                 if ($udane = $conn -> query($sql)){
                    while ($row = $udane -> fetch_array()){
                        echo $row['wycieczki'];
                    }
                } ?></p>
                <p>Użytkowników forum: 200</p>
                <p>Przesłanych zdjęć: 1300</p>
            </section>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: Raman Dzianisau</p>
    </footer>
</body>
</html>