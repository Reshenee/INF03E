<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów
            świnkowe maluszki</h1>
    </header>
    <section>
        <nav>
            <a href="peruwianka.php">Rasa Peruwianka</a>
            <a href="american.php">Rasa American</a>
            <a href="crested.php">Rasa Crested</a>
        </nav>
        <section id="prawy">
            <h3>Poznaj wszystkie rasy świnek morskich</h3>
            <ol>
                 <?php
                    $con = mysqli_connect("localhost", "root", "", "hodowla");
                    $zapytanie4 = "SELECT rasa FROM rasy";

                    $wynik = mysqli_query($con, $zapytanie4);
                    while ($row = mysqli_fetch_array($wynik)) {
                        echo "<li>".$row['rasa']."</li>";
                    }

                 ?>
            </ol>
        </section>
        <main>
            <img src="american.jpg" alt="Świnka morska rasy american">
             <?php
                $zapytanie2 = "SELECT DISTINCT data_ur, miot, rasa FROM swinki INNER JOIN rasy ON swinki.rasy_id=rasy.id WHERE rasy_id = 6";

                $wynik = mysqli_query($con, $zapytanie2);
                while ($row = mysqli_fetch_array($wynik)) {
                    echo "<h2>Rasa: ".$row['rasa']."</h2>";
                    echo "<p>Data urodzenia: ".$row['data_ur']."</p>";
                    echo "<p>Oznaczenie miotu: ".$row['miot']."</p>";
                }
             ?>
            <hr>
            <h2>Świnki w tym miocie</h2>
            <?php
                $zapytanie3 = "SELECT imie, cena, opis FROM swinki WHERE rasy_id = 6";
                
                $wynik = mysqli_query($con, $zapytanie3);
                while ($row = mysqli_fetch_array($wynik)) {
                    echo "<h3>".$row['imie']." - ".$row['cena']." zł</h3>";
                    echo "<p>".$row['opis']."</p>";
                }

                mysqli_close($con);
            ?>
        </main>
    </section>
    <footer>
        <p>Stronę wykonał: Raman Dzianisau</p>
    </footer>
</body>
</html>