<?php

    $id=$_GET['id'];
    $conn=mysqli_connect("localhost", "root", "", "mywebsite")or die(mysqli_error($conn));
    $query=mysqli_query($conn, "select * from product where id='$id'")or die(mysqli_error($conn));

?>

<html><head>
<title>Product</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body>
<div class="container">
  <div class="row">
      <?php foreach($query as $record){?>
    <div class="col-sm-3">
      <div class="card">
        <img class="card-img-top" src="/mywebsite/admin/uploads/" alt="product-img" style="width:250px;height:250px;" class="img img-circle">
        <div class="card-body">
            <h4 class="card-title"><?php echo$record['name']?></h4>
            <p class="card-text"><?php echo$record['description']?></p>
            <p class="card-text">cost:ksh<?php echo$record['cost']?></p>
            QTY<input type="number" name="number">
        </div>
        <div class="card-footer">
            <input type="submit" name="submit" class="btn btn-info" value="add to cart" style="width:100px; height:50px;"></div> 
      </div>
    </div>
   <div>
      <?php }?>
</div>

</body>


</html>