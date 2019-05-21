<?php
$conn=mysqli_connect("localhost","root","","mywebsite")or die(mysqli_error($conn));

if(isset($_POST['submit'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    //inserting to the database
    $query = mysqli_query($conn,"INSERT INTO signup(id , firstname, lastname, gender, age)
    VALUES(null,'$firstname', '$lastname', '$gender','$age')") or die(mysqli_error($conn));
    if($query){
        echo "success";
        header('refresh:2;url=index.html');
    }else{
        echo "failed";
    }

}

?>