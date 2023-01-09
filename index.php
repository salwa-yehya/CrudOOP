<?php 
include 'model.php';

$obj = new Model();
// echo '<pre>';
// print_r($obj);

/* Insert Record*/
if(isset($_POST['submit'])){
$obj->insertRecord($_POST);
}//if isset close

$data =$obj->displayRecord();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD IN PHP OOP</title>
    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
</head>
<body>
   <h2 Class="text-center text-info">CRUD OPARATION IN PHP OOPS</h2> <br>
   <div class="container">
    <!--Success message -->
    <?php 
    if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
        echo '<div class="alert alert-primary" role="alert">
       Record Inserted Successfully !
      </div>';
    }
    
    
    ?>
    <form action="index.php" method="post">
        <div class="from-group">
        <label >Name</label>
        <input type="text" name="name" class="form-control" 
        placeholder="Enter Your Name ">
        </div>

        <div class="from-group">
        <label >Email</label>
        <input type="text" name="email" class="form-control" 
         placeholder="Enter Your Email ">
        </div>

        <div class="form-group">
        <input type="submit" name="submit" value="Submit" 
         class="btn btn-info" >
        </div>
    </form><br>
    <h4 Class="text-center text-danger">Display Records </h4>
    <table class="table table-bordered">
        <tr class="bg-primary text-center">
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php 
        /*display record*/
        $data =$obj->displayRecord();
        $id =0;
        foreach($data as $value){
        ?>
         <tr class="text-center">
            <td> <?php echo $id++ ;?></td>
            <td>  <?php echo $value['name']; ?></td>
            <td>  <?php echo $value['email']; ?></td>
            <td> 
                <a href="index.php" class="btn btn-info">Edit</a>
                <a href="index.php" class="btn btn-danger">Delete</a>
            </td>
         </tr>
        <?php
        }//for each close
        ?>
    </table>
   </div>
</body>
</html>