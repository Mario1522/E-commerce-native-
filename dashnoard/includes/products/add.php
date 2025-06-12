<form action="functions/products/insert.php" method="post" enctype="multipart/form-data" class="row g-2 m-auto">
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
                <input type="text" id="name" name="name" class="w-100">
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
                <input type="text" id="price" name="price" class="w-100">
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
                <input type="text" id="sale" name="sale" class="w-100">
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
                <input type="text" id="count" name="count" class="w-100">
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
                    <select class="form-select" id="cat" name="cat">
                    <?php
                    include 'functions/connection.php';
                    $query = "select * from category";
                    $run = mysqli_query($connection,$query);
                    $num = mysqli_num_rows($run);
                    if($num > 0){
                        $cats = mysqli_fetch_all($run,MYSQLI_ASSOC);
                        foreach ($cats as $key => $value) { ?>
                            <option selected value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
                      <?php  }
                    }
                    ?>
                
                    </select>

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
                <input type="file" id="img" multiple name="img[]"  style="display: none;">
            </div>
        </div>
        <button type="submit" name="submit" class="w-25 btn btn-primary">Add Product</button>
    </form>