<?php
    $kat = $_GET['id'];
    include 'connect.php';
    define('PATH', 'slike/');
    $query = "SELECT COUNT(*) AS total FROM artikli WHERE arhiva = '0' AND kategorija = '$kat'";
    $broj_q = mysqli_query($dbc, $query);
    $broj_a = mysqli_fetch_assoc($broj_q);
    $broj = $broj_a['total'];
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
        <h3><?php echo strtoupper($kat); ?></h3>
        
            <?php 
                $query = "SELECT * FROM artikli WHERE arhiva = 0 AND kategorija = '$kat'";
                $result = mysqli_query($dbc, $query);
                $i = 1;
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $naslov = $row['naslov'];
                    $opis = $row['sazetak'];
                    $slika = PATH.$row['slika'];
                    if($i % 4 == 1){
                        echo "<article id='divArtikla1'>";
                    }
                    echo 
                        "
                        <aside>
                            <img src='$slika' id='img'>
                            <p class='red'><a href = 'clanak.php?id=$id'>$naslov</a></p>
                            <p>$opis</p>
                        </aside>
                        ";
                    if($i % 4 != 0 && $i != $broj){
                        echo "<div class='hl'></div>";
                    }
                    if($i % 4 == 0){
                        echo "</article>";
                    }
                    $i++;
                }
            
            ?>
        
    </section>
    
    <footer>
        <p>Tin Milaković | tmilakovi@tvz.hr</p>
    </footer>
</body>
</html>