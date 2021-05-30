<?php
    session_start();
    include 'connect.php';
    
    if(isset($_POST['username']) && isset($_POST['pass'])){
        $korisnickoIme = $_POST['username'];
        $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);

        if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt, 's', $korisnickoIme);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $korisnickoImeBaza = null;
            $lozinkaHash = null;
            $razina = null;

            mysqli_stmt_bind_result($stmt, $korisnickoImeBaza, $lozinkaHash, $razina);
            mysqli_stmt_fetch($stmt);

            if(password_verify($_POST['pass'], $lozinkaHash)){
                echo "Prijava uspješna.\n";
                $_SESSION['login'] = true;
                $_SESSION['level'] = $razina;
                $_SESSION['username'] = $korisnickoIme;
                mysqli_close($dbc);
                
                header("Location: administracija.php");
                exit;
            }
            else{
                echo "Neuspješna prijava.\n";
            }
        }
    }
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
                <li><a href="prijava.php">PRIJAVA</a></li>
                <li><a href="administracija.php">ADMINISTRACIJA</a></li>
            </ul>
        </nav>
    </header>
      
    
    <section>
        <article id="articleUnos">
        <form enctype="multipart/form-data" method="POST">
            <div class="form-item">
                <label for="content">Korisničko ime:</label>
                <div class="form-field">
                    <input type="text" name="username" id="username" class="formfield-textual">
                </div>
            </div>
            <div class="form-item">
                <label for="pphoto">Lozinka: </label>
                <div class="form-field">
                    <input type="password" name="pass" id="pass" class="formfield-textual">
                </div>
            </div>

            <div class="form-item">
                <button type="submit" name='prijava' value="Prijava" id="slanje">Prijava</button>
                <a href="registracija.php" >
                    <button type="button">Registriraj se</button>
                </a>
            </div>
        </form>
        </article>
    </section>       
    <footer>
        <p>Tin Milaković | tmilakovi@tvz.hr</p>
    </footer>
    </body>
</html>


