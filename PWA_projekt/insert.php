<?php
include 'connect.php';

$picture = $_FILES['pphoto']['name'];
$title=$_POST['title'];
$about=$_POST['about'];
$content=$_POST['content'];
$category=$_POST['category'];
$date=date('d.m.Y.');
if(isset($_POST['archive'])){
 $archive=1;
}else{
 $archive=0;
}

$target_dir = 'slike/'.$picture;
move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

$query = "INSERT INTO artikli (datum, naslov, sazetak, tekst, slika, kategorija, 
arhiva ) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($dbc);
if(mysqli_stmt_prepare($stmt, $query)){
    mysqli_stmt_bind_param($stmt, 'ssssssi', $date, $title, $about, $content, $picture, $category, $archive);
    mysqli_stmt_execute($stmt);
}

mysqli_close($dbc);
?>