<?php

$username = $_POST['username'];
$password = $_POST['password'];

$idGet = "";

$bdd = new PDO('mysql:host=localhost;dbname=security', 'root', '');

$req = $bdd->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
$req->bindParam(':username', $username);
$req->bindParam(':password', $password);
$req->execute();
$idGet = $req->fetchAll();
if(isset($idGet) && sizeof($idGet) > 0 && $idGet[0]["username"] != ""){
    echo 'ok';
}else{
    echo 'nope';
}
