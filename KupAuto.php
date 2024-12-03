<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header id="baner">
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>

    <?php
    $host="127.0.0.1";
    $uzytkownik="root";
    $haslo="";
    $dbname="kupauto";

    $conn = new mysqli($host, $uzytkownik, $haslo, $dbname);
    ?>


    <main>

        <section id="pierwszyblok">

        <?php

// Wykonanie zapytania SQL
$sql1 = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10";
$result1 = $conn->query($sql1);

// Sprawdzenie, czy zapytanie zwróciło dane
    $row1 = $result1->fetch_assoc();
    
    // Wyświetlanie danych w HTML
    echo "<div class='oferta-dnia'>";
    
    // Obraz samochodu
    echo "<img src='" . $row1['zdjecie'] . "' alt='Oferta dnia' >";
    
    // Nagłówek z modelem samochodu
    echo "<h4>Oferta Dnia: Toyota " . $row1['model'] . "</h4>";
    
    // Paragraf z rocznikiem, przebiegiem i rodzajem paliwa
    echo "<p>Rocznik: " . $row1['rocznik'] . ", przebieg: " . $row1['przebieg'] . ", rodzaj paliwa: " . $row1['paliwo'] . "</p>";
    
    // Nagłówek z ceną
    echo "<h4>Cena: " . $row1['cena'] . "</h4>";
    
    echo "</div>";
?>

        </section>


        <section id="drugiblok"> 

            <h2>Oferty Wyróżnione</h2>
            <?php 
                $sql2="SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie
                FROM marki
                JOIN samochody ON marki.id = samochody.marki_id
                WHERE 
                    samochody.wyrozniony = 1
                LIMIT 4;";
                
                $result2=$conn->query($sql2);
                $row2 = $result2 -> fetch_assoc();
                echo "<div class='a8tdi'>";
                echo "<img src='". $row2['zdjecie'] . "' alt='" . $row2['model'] .  "'>";
                echo "<h4>" . $row2['nazwa'] . $row2['model'] . "</h4>";
                echo "<p>Rocznik:" . $row2['rocznik'] . "</p>";
                echo "<h4>Cena: " . $row2['cena'] . "</h4>";
                echo "</div>";

                echo "<div class='a8'>";
                echo "<img src='". $row2['zdjecie'] . "' alt='" . $row2['model'] .  "'>";
                echo "<h4>" . $row2['nazwa'] . $row2['model'] . "</h4>";
                echo "<p>Rocznik:" . $row2['rocznik'] . "</p>";
                echo "<h4>Cena: " . $row2['cena'] . "</h4>";
                echo "</div>"







            ?>

        </section>
        


        <section>
            <h2>Wybierz markę</h2>
            
            <form action="bezpieczne_przetwarzanie.php" method="POST">

        <label for="lista">Wybierz opcję:</label>
        <select id="lista" name="wybrana_opcja">
        </select>
        <br><br>

        <button type="submit">Wyszukaj</button>
    </form>
        </section>

    </main>
    
    <footer>
    <p>Stronę wykonał: XD</p>
    <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>
</html>