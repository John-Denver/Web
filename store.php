<?php
$conn=mysqli_connect("localhost", "root", "", "mywebsite")or die(mysqli_error($conn));
$query=mysqli_query($conn, "select * from product")or die(mysqli_error($conn));
?>

<?php
  $conn=mysqli_connect("localhost", "root", "", "mywebsite")or die("could not connect".mysqli_error($conn));
  if(isset($_POST['search'])){
    $pname=$_POST['product'];
    $query=mysqli_query($conn, "select * from product where name='$pname'")or die("could not fetch".mysqli_error($conn));
  }
?>

<html><head>
<title>Product</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body>
<div class="container">
<div class="row">
  <div class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
   <a class="navbar-brand" href="#">Stored</a>
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link">Home</a></li>
      <li class="nav-item"><a class="nav-link">About us</a></li>
      <li class="nav-item"><a class="nav-link">Contact</a></li>
    </ul>
    </div>
    <form class="form-inline" action="" method="POST">
      <div class="input-group-prepend">
        <span class="input-group-text">@</span>
      </div>
      <input type="text" name="product" class="form-control mr-sm-2" placeholder=Search>
      <input type="submit" name="search" value="search" class="btn btn-success"> 
    </form>

</div>
  <div class="row">
      <?php foreach($query as $record){?>
    <div class="col-sm-3">
      <div class="card">
        <img class="card-img-top" src="/mywebsite/admin/uploads/" alt="product-img" style="width:250px;height:250px;" class="img img-circle">
        <div class="card-body">
            <h4 class="card-title"><?php echo$record['name']?></h4>
            <p class="card-text"><?php echo$record['description']?></p>
            <p class="card-text">cost:ksh<?php echo$record['cost']?></p>
        </div>
        <div class="card-footer">
            <a href="view_product.php?id=<?php echo$record['id']?>" class="btn btn-info" style="width:20px; height:10px;"></div> 
      </div>
    </div>
   <div>
      <?php }?>
</div>

</body>


</html>