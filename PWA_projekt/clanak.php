<?php
    $id = $_GET['id']; 
    include "connect.php";
    define('PATH', 'slike/');

    $query = "SELECT * FROM artikli WHERE id = $id";
    $result = mysqli_query($dbc, $query);
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $naslov = $row['naslov'];
        $datum = $row['datum'];
        $opis = $row['sazetak'];
        $tekst = $row['tekst'];
        $slika_naziv = $row['slika'];
        $slika = PATH.$row['slika'];
        $kategorija = $row['kategorija'];
        $arhiva = $row['arhiva'];
    }
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
        <article id="articleClanak">
            <aside>
                <h4><?php echo $kategorija; ?></h4>
                <h2><?php echo $naslov; ?></h2>
                <h7>Objavljeno: <?php echo $datum; ?></h7>
                <img src="<?php echo $slika; ?>" id="imgClanak">
                <p>
                    <?php echo $opis; ?>
                </p>
                <p>
                    <?php echo $tekst; ?>
                </p>
            </aside>
        </article>
        
    </section>
    
    <footer>
        <p>Tin Milaković | tmilakovi@tvz.hr</p>
    </footer>
</body>
</html>