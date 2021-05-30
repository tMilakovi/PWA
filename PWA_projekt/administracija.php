<?php
    session_start();
    include "connect.php";
    define('PATH', 'slike/');
    $uspjesnaPrijava = '';

    if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $query = "DELETE FROM artikli WHERE id=$id ";
        $result = mysqli_query($dbc, $query);
    }

    if(isset($_POST['update'])){
        $picture = $_FILES['photo']['name'];
        $title=$_POST['title'];
        $about=$_POST['about'];
        $content=$_POST['content'];
        $category=$_POST['category'];
        
        if(isset($_POST['archive'])){
         $archive=1;
        }
        else{
         $archive=0;
        }
        
        $target_dir = 'slike/'.$picture;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);
        $id=$_POST['id'];
        
        if($picture != ''){
            $query = "UPDATE artikli SET naslov = ?, sazetak = ?, tekst = ?, slika = ?, kategorija = ?, arhiva = ? WHERE id = ? ";
            $stmt=mysqli_stmt_init($dbc);
            
            if (mysqli_stmt_prepare($stmt, $query)){
            mysqli_stmt_bind_param($stmt,'sssssii',$title,$about,$content,$picture,$category, $archive, $id);
            mysqli_stmt_execute($stmt);
            }
        }
        else{
            $query = "UPDATE artikli SET naslov = ?, sazetak = ?, tekst = ?, kategorija = ?, arhiva = ? WHERE id = ? ";
            $stmt=mysqli_stmt_init($dbc);
            
            if (mysqli_stmt_prepare($stmt, $query)){
            mysqli_stmt_bind_param($stmt,'ssssii',$title,$about,$content,$category, $archive, $id);
            mysqli_stmt_execute($stmt);
            }
        }
    }

    if(isset($_POST['prijava'])){
        $uspjesnaPrijava = false;
        // Provjera da li korisnik postoji u bazi uz zaštitu od SQL injectiona
        $prijavaImeKorisnika = $_POST['username'];
        $prijavaLozinkaKorisnika = $_POST['pass'];
        $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik
        WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        
        mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
        mysqli_stmt_fetch($stmt);
        
        //Provjera lozinke
        if (password_verify($_POST['pass'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
            $uspjesnaPrijava = true;
            // Provjera da li je admin
            if($levelKorisnika == 1) {
                $admin = true;
            }
            else {
                $admin = false;
            }
            $_SESSION['login'] = true;
            $_SESSION['level'] = $levelKorisnika;
            $_SESSION['username'] = $imeKorisnika;
        } else {
            $uspjesnaPrijava = false;
        }
 
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

        <article id="articleAdmin">
        <?php 
            if (($uspjesnaPrijava == true && $admin == true) || ($_SESSION['level'] == 1)) {
                
            $query = "SELECT * FROM artikli";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result)){
                $id = $row['id'];
                $naslov = $row['naslov'];
                $opis = $row['sazetak'];
                $tekst = $row['tekst'];
                $slika_naziv = $row['slika'];
                $slika = PATH.$row['slika'];
                $kategorija = $row['kategorija'];
                $arhiva = $row['arhiva'];
                echo 
                    "
            <form enctype='multipart/form-data' action='' method='POST'>
                 <div class='form-item'>
                    <label for='title'>Naslov vijesti</label>
                     <div class='form-field'>
                        <input type='text' name='title' class='form-field-textual' value='$naslov'>
                     </div>
                 </div>
                 <div class='form-item'>
                    <label for='about'>Kratki sadržaj vijesti (do 50 znakova)</label>
                     <div class='form-field'>
                        <textarea name='about' id='' cols='30' rows='10' class='form-field-textual'>$opis</textarea>
                    </div>
                 </div>
                 <div class='form-item'>
                     <label for='content'>Sadržaj vijesti</label>
                     <div class='form-field'>
                        <textarea name='content' id='' cols='30' rows='10' class='form-field-textual'>$tekst</textarea>
                     </div>
                 </div>
                 <div class='form-item'>
                     <label for='pphoto'>Slika: </label>
                     <div class='form-field'>
                        <input type='file' accept='image/*' class='input-text' name='photo' value='$slika_naziv'/>
                        <br>
                        <img src = '$slika' width = 100px id = 'imgAdmin'>
                    </div>
                 </div>
                 <div class='form-item'>
                     <label for='category'>Kategorija vijesti</label>
                     <div class='form-field'>
                         <select name='category' id='' class='form-field-textual' value = '$kategorija'>";
                            if($kategorija == 'sport'){
                                echo "
                                 <option value='sport' selected>Sport</option>
                                 <option value='kultura'>Kultura</option>";
                            }
                            else{
                                echo "
                                 <option value='sport'>Sport</option>
                                 <option value='kultura' selected>Kultura</option>";
                            }
                        echo "
                         </select>
                     </div>
                 </div>
                 <div class='form-item'>
                     <label>Spremiti u arhivu: 
                     <div class='form-field'>";
                    if($arhiva == 0){
                        echo "<input type='checkbox' name='archive'>";
                    }else{
                        echo "<input type='checkbox' name='archive' checked>";
                    }
                echo"
                     </div>
                     </label>
                 </div>
                 <div class='form-item'>
                    <input type='hidden' name='id' class='form-field-textual' value='$id'>
                     <button type='reset' value='Poništi'>Poništi</button>
                     <button type='submit' value='Prihvati' name='update'>Prihvati</button>
                     <button type='submit' value='Izbriši' name='delete'>Izbriši</button>
                 </div>
            </form>
                    ";
            echo "<hr id = 'hrAdmin'>";
            }
                
            } else if($uspjesnaPrijava == true && $admin == false){
                echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
            } else if(isset($_SESSION['username']) && $_SESSION['level'] == 0){
                echo '<p>Bok ' . $_SESSION['username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
            } else if($uspjesnaPrijava == false){
                echo "<p>Vrati se na prijavu!</p>";
                echo '
                <a href="prijava.php" >
                    <button type="button">Prijavi se!</button>
                </a>
                ';
            }

        ?>
        </article>
        
    </section>
    
    <footer>
        <p>Tin Milaković | tmilakovi@tvz.hr</p>
    </footer>
</body>
</html>