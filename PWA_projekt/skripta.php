<?php
include 'insert.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>PWA projekt</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
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
                <li><a href="administracija.php">ADMINISTRACIJA</a></li>
            </ul>
        </nav>
    </header>
    
    <section>
        <article id="articleClanak">
            <aside>
                <h4>
                    <?php echo $category; ?>
                </h4>
                <h2>
                    <?php echo $title; ?>
                </h2>
                <h7>Objavljeno: <?php echo $date; ?></h7>
                <?php 
                    echo "<img src=$target_dir id='imgClanak'>";
                ?>
                <p id = "about">
                    <?php echo $about; ?>
                </p>
                <p>
                    <?php echo $content; ?>
                </p>
            </aside>
        </article>
        
    </section>
    
    <footer>
        <p>Tin Milaković | tmilakovi@tvz.hr</p>
    </footer>
</body>
</html>