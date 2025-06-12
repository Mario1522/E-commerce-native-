<?php
$id = $_GET['id'];
include 'functions/connection.php';
$query = "select * from products where id = $id";
$run = mysqli_query($connection,$query);
$num = mysqli_num_rows($run);
if($num == 1){
    $product = mysqli_fetch_assoc($run);
}else{
    header("location:404.php");
}
?>
<form action="functions/products/update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" class="row g-2 m-auto">
        <div class="col-lg-6 col-sm-12">
            <div>
            <?php
                    if(isset($_SESSION['errors']['name'])){?>
                        <div class="alert alert-danger">
                        <?php echo $_SESSION['errors']['name'] ?>
                        </div>
                    <?php } 
                    unset($_SESSION['errors']['name']);
                    ?>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="w-100" value="<?php echo $product['name'] ?>">
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div>
            <?php
                    if(isset($_SESSION['errors']['price'])){?>
                        <div class="alert alert-danger">
                        <?php echo $_SESSION['errors']['price'] ?>
                        </div>
                    <?php } 
                    unset($_SESSION['errors']['price']);
                    ?>
                <label for="price">price</label>
                <input type="text" id="price" name="price" class="w-100" value="<?php echo $product['price'] ?>">
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div>
            <?php
                    if(isset($_SESSION['errors']['sale'])){?>
                        <div class="alert alert-danger">
                        <?php echo $_SESSION['errors']['sale'] ?>
                        </div>
                    <?php } 
                    unset($_SESSION['errors']['sale']);
                    ?>
                <label for="sale">sale</label>
                <input type="text" id="sale" name="sale" class="w-100" value="<?php echo $product['sale'] ?>">
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div>
            <?php
                    if(isset($_SESSION['errors']['count'])){?>
                        <div class="alert alert-danger">
                        <?php echo $_SESSION['errors']['count'] ?>
                        </div>
                    <?php } 
                    unset($_SESSION['errors']['count']);
                    ?>
                <label for="count">count</label>
                <input type="text" id="count" name="count" class="w-100" value="<?php echo $product['count'] ?>">
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div>
            <?php
                    if(isset($_SESSION['errors']['cat'])){?>
                        <div class="alert alert-danger">
                        <?php echo $_SESSION['errors']['cat'] ?>
                        </div>
                    <?php } 
                    unset($_SESSION['errors']['cat']);
                    ?>
                <label for="cat">category</label>
                <input type="text" id="cat" name="cat" class="w-100" value="<?php echo $product['category'] ?>">
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div>
            <?php
                    if(isset($_SESSION['errors']['img'])){?>
                        <div class="alert alert-danger">
                        <?php echo $_SESSION['errors']['img'] ?>
                        </div>
                    <?php } 
                    unset($_SESSION['errors']['img']);
                    ?>
                <label for="img" class="my-3 btn btn-outline-success">Choose image</label>
                <input type="file" id="img" multiple name="img[]" class="w-100" style="display: none;">
            </div>
        </div>
        <button type="submit" name="submit" class="w-25 btn btn-primary">Finish Edit</button>
    </form>