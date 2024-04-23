<?php 
    include 'config.php';
    $id = $_GET['Id'];

    if(isset($id)){
        $stmt = $con ->prepare("DELETE FROM studio WHERE Id=$id");
        $stmt -> execute();

    }
    header('location:students_list.php');
?>