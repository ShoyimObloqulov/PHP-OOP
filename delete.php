<?php
    $id = $_GET['id'];
    $table = "users";
    include_once 'crud.php';
    $d = new Crud();
    $bu = $d->delete($id,$table);
    header("Location: index.php" );
?>