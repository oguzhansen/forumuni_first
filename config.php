<?php

$user = "root";
$pass = "";

$conn = new PDO('mysql:host=localhost;dbname=forumuni', $user, $pass);

if(isset($_SESSION["username"]))
{
    $uname = $_SESSION["username"];
            
    $user = $conn->query("SELECT * FROM users WHERE username = '$uname'");
    $user = $user->fetch(PDO::FETCH_ASSOC);

    $userid = $user["id"];

}

//QUERY'S

$yonetim = $conn->query("SELECT * FROM yonetimpost ORDER BY id DESC"); //ANA SAYFA NOT LOGİN

$sorular = $conn->query("SELECT * FROM sorular ORDER BY soru_id DESC"); //ANA SAYFA LOGİN




?>