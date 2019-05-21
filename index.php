<?php
session_start();
$conn=mysqli_connect("localhost", "root", "", "mywebsite")or die(mysqli_error($conn));


   if(isset($_POST['submit'])){
       $user=$_POST['username'];
       $pass=$_POST['password'];
      
       //query statement
       $query=mysqli_query($conn,"select * from login where username='$user' and password='$pass'")or 
       die(mysqli_error($conn));
       $row=mysqli_num_rows($query);
       if($row==1){
           while($rows=mysqli_fetch_array($query)){
               $_SESSION['loginid']=$rows['id'];
               
           }
           echo"<script>window.alert('login successfull')</script>";
           header('refresh:0;url=store.php');

       }else{
           echo"<script>window.alert('failed')</script>";
           header('refresh:0;url=index.html');
       }

   }





?>