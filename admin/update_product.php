<?php
    $id=$_GET['id'];
    $conn=mysqli_connect("localhost","root","","mywebsite")or die(mysqli_error($conn));
    $query=mysqli_query($conn,"select * from product where id='$id'")or die(mysqli_error($conn));
    foreach($query as $record){
        $pname=$record['name'];
        $pimage=$record['image'];
        $pcost=$record['cost'];
        $pdescription=$record['description'];

    }

?>




<?php include('sidebar.php')?>
<?php include('navbar.php')?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form name="product-form" action="" method="POST">
                                    <div class="row">

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Product Id</label>
                                                <input type="text"  name="pid" value="<?php echo$id?>" readonly=true>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Product name</label>
                                                <input type="text" class="form-control" value="<?php echo$pname?>" name="product"> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cost</label>
                                                <input type="text" class="form-control"  value="<?php echo$pcost?>" name="cost"> 
                                            </div>
                                        </div>     
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" class="form-control" name="description"><?php echo$pdescription?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" value="update"class="btn btn-info btn-fill pull-right" >
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                                <img src="upload/<?php echo$pimage;?>" style="width:200px;height:200px;">
                            </div>
                </div>
            </div>
        </div>

        </div>


<?php include('footer.php')?>

<?php 
    if(isset($_POST['submit'])){
        $upname=$_POST['product'];
        $upcost=$_POST['cost'];
        $update=mysqli_connect($conn, "update product set name='$upname', cost='$upcost' where id='$id'")or die(mysqli_error($conn));
        if($update){
            ?>
                <script>
                  window.alert("success");
                  window.location.href="product.php";
                </script>
            <?php
        }else{
            ?>
                <script>
                  window.alert("Failed to update");
                  window.location.href="product.php";
                </script>
            <?php
        }
    }


?>
