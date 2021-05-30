<?php
    include 'connect.php';
    define('PATH', 'slike/');
?>

<!DOCTYPE html>
<html>
<head>
	<title>PWA projekt</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        
    </style>
</head>
<body>
    <div id="logo">
        <img src="slike/lexpress_logo.png">
    </div>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="kategorija.php?id=kultura">KULTURA</a></li>
                <li><a href="kategorija.php?id=sport">SPORT</a></li>
                <li><a href="unos.html">UNOS</a></li>
                <li><a href="registracija.php">REGISTRACIJA</a></li>
                <li><a href="prijava.php">PRIJAVA</a></li>
                <li><a href="administracija.php">ADMINISTRACIJA</a></li>
            </ul>
        </nav>
    </header>
    
    <section>
        <h3>Kultura</h3>
        <article id="divArtikla1">
            <?php 
                $query = "SELECT * FROM artikli WHERE arhiva = 0 AND kategorija = 'kultura' LIMIT 4";
                $result = mysqli_query($dbc, $query);
                $i = 1;
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $naslov = $row['naslov'];
                    $opis = $row['sazetak'];
                    $slika = PATH.$row['slika'];
                    echo 
                        "
                        <aside>
                            <img src='$slika' id='img'>
                            <p class='red'><a href = 'clanak.php?id=$id'>$naslov</a></p>
                            <p>$opis</p>
                        </aside>
                        ";
                    if($i < 4){
                        echo "<div class='hl'></div>";
                    }
                    $i++;
                }
            
            ?>
        </article>
        <h3>Sport</h3>
        <article id="divArtikla2">
            <?php 
                $query = "SELECT * FROM artikli WHERE arhiva = 0 AND kategorija = 'sport' LIMIT 4";
                $result = mysqli_query($dbc, $query);
                $i = 1;
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $naslov = $row['naslov'];
                    $opis = $row['sazetak'];
                    $slika = PATH.$row['slika'];
                    echo 
                        "
                        <aside>
                            <img src='$slika' id='img'>
                            <p class='nlue'><a href = 'clanak.php?id=$id'>$naslov</a></p>
                            <p>$opis</p>
                        </aside>
                        ";
                    if($i < 4){
                        echo "<div class='hl'></div>";
                    }
                    $i++;
                }
            
            ?>
        </article>
        
    </section>
    
    <footer>
        <p>Tin Milaković | tmilakovi@tvz.hr</p>
    </footer>
</body>
</html>