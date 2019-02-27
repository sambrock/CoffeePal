<?php
session_start();

if(isset($_SESSION["name"])){
    header("Location: order.php");

}else{
    require_once("models/model.php");
    $title = "Login";
    include("views/header-view.php");

    if(isset($_POST['login'])){
        $id = $_POST['id'];
        $name = getLogin($id)['first_name']." ".getLogin($id)['last_name'];
        $password = trim($_POST['password']);
        $hashed_password = getLogin($id);

        if(password_verify($password, $hashed_password['password'])){
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $name;
            header("Location: order.php");
        } else {
            $error="Password incorrect";
        }
    }

    include("views/login-view.php");
}

?>
