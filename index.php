/**
 * Created by PhpStorm.
 * User: Marine
 * Date: 12/11/2018
 * Time: 19:41
 */

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Friend book</title>
   <style>
       body{
           background-color: slategrey;
       }
       /* Style the header */
       header{
           background-color: rgba(8,55,167,0.71);
           color: white;
           font-size: 20mm;
           font-weight: bolder;
           text-align: center;
           padding: 20px;

       }

       /* Style the footer */
       footer{
           background-color: rgba(8,55,167,0.71);
           color: white;
           text-align: center;
       }

       /* Style the form */
       form{
           padding: 20px;
       }

       li{
           font-family:"Comic Sans MS", cursive, sans-serif;
           font-size:large;
           color: pink;
       }

       h1{
           font-family: "Times New Roman", Times, serif;
           font-size: xx-large;
           text-align: center;
           color: rgba(8,55,167,0.71);
       }
   </style>
</head>
<body>
<header> Friend book </header>
<form action="index.php" method="post">
    Name: <input type="text" name="name">
    <input type="submit" value="Adding a friend">
</form>

<form action="index.php" method="post">
    Filter:<input type="text" name="nameFilter" value="<?=$nameFilter?>">
    <input type="submit" value="Filter the list"> </form>
<h1>My best friend(s) is/are : </h1>

<?php

$filename = 'myfriends.txt';

$nameFilter = NULL;
$name =$_POST['name'];
$file = fopen( $filename, "a" );
if ("$name"!=NULL){
    fwrite( $file,"$name\n"  );
}
fclose($file);
?>

<p>
    <?php
    $file = fopen( $filename,"r" );
    $line = fgets($file);
    echo "<ul>";
    while (!feof($file)){
        if ($_POST['nameFilter'] and $_POST['nameFilter'] != NULL){
            $line = strstr($line, $_POST['nameFilter']);
        }
        if ($line != NULL)
        {
            echo "<li>$line</li>";
        }
        $line = fgets($file);
    }
    echo "</ul>";
    fclose($file);
    ?>
</p>

</body>
<footer> Footer </footer>
</html>
