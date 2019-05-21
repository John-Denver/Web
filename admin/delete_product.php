<?php
  $conn=mysqli_connect("localhost","root","","mywebsite")or die(mysqli_error($conn));
  $id=$_GET['id'];
 //delete query

  $delete=mysqli_query($conn,"delete from product where '$id'")or die(mysqli_error($conn));
  if($delete){
      echo"Successfully Deleted";
  }else{
      echo"Unable to Delete";
  }
  
  
?>