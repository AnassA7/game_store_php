<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>game list</title>
    <link rel="stylesheet" href="css2/bootstrap.css">
    <link rel="stylesheet" href="css2/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->
       
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px-4">
        <?php 
            include "component/header.php";
        ?>

          
        
            <!-- start student list table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Games list</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        <i class="far fa-sort"></i>
                    </div>
                    
                </div>
            </div>
            <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <tr class="align-middle">
                            <th class="opacity-0">vide</th>
                            <th>Name</th>
                            <th>category</th>
                            <th>descrption</th>
                            <th>price</th>
                            <th>Date </th>
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                          include 'config.php';
                          session_start();
                          $id = $_SESSION['studio'];
                          $result = $con -> query("SELECT * FROM game WHERE studio_id=$id");
                          foreach($result as $value):
                        ?>
                      <tr class="bg-white align-middle">
                        <td><img src="data:image/jpeg;base64,<?php echo base64_encode($value['image']); ?>" alt="img" height="50" with="50"></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['category'] ?></td>
                                <td><?php echo $value['description'] ?></td>
                                <td>$<?php echo $value['price'] ?></td>
                                <td><?php echo $value['publish_date'] ?></td>
                                <td class="d-md-flex gap-3 mt-3">
                                  <a href="mod_game.php?Id=<?php echo $value['id']?>"><i class="far fa-pen"></i></a>
                                  <a 
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?')" 
                                    href="remove_game.php?Id=<?php echo $value['id']?>" 
                                    class='far fa-trashr'><i class="far fa-trash"></i>
                                  </a>

                                </td>
                        </tr> 

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- end student list table -->
        </div>
        <!-- end content page -->
    </main>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>