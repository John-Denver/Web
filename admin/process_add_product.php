<?php
$conn = mysqli_connect("localhost","root","","mywebsite") or die(mysqli_error($conn));
if(isset($_POST['submit'])){
    $name = $_POST['product'];
    $cost = $_POST['cost'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if($_FILES['image']['name']!=''){
        $path='uploads/';
        $location = $path.$image;
        if(move_uploaded_file($_FILES['image']['tmp_name'],$location)){
          //insert into database
          $query = mysqli_query($conn,"insert into product(id, name, image, description, cost) 
          values(null,'$name','$image','$description','$cost')")or die(mysqli_error($conn));
          if($query){
              ?>
              <script>
                  window.alert("success");
                  window.location.href="product.php";
              </script>
              <?php

          }else{
              ?>
              <script>
                 window.alert("failed");
                 window.location.href="add_product.php";
              
              </script>
              
              <?php
          }

        }


    }
    
}
?>