<?php 
    include 'conixion.php';
    if(isset($_POST['submit'])){
        
        $image = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];  
        $folder = "../assets/img/".$image;
        
        if(move_uploaded_file($tempname,$folder)){
            echo 'images est uplade';
        }

        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Phone = $_POST['Phone'];
        $EnrollNumber = $_POST['EnrollNumber'];
        $DateOfAdmission = $_POST['DateOfAdmission'];

        $requete = $con->prepare("INSERT INTO studio(name,description,email,password,date,image) VALUES('$Name','$Phone','$Email', '$EnrollNumber', '$DateOfAdmission','$image')");
        //$requete->execute(array($image,$Name,$Email,$Phone,$EnrollNumber,$DateOfAdmission));
        $requete->execute();
    }
    header('location:students_list.php')
    ?>