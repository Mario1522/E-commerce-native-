<?php

include '../dashnoard/functions/connection.php';

extract($_POST);

    $query = "select * from products where name LIKE '%$value%'";
    
    
    $run = mysqli_query($connection,$query);
    
    
    $num = mysqli_num_rows($run);
    
    if($num == 0){
        echo "<div style='padding : 20px 150px; font-size: 25px;' class='text-danger'>Not Found</div>";
    }else{
        $result = mysqli_fetch_all($run,MYSQLI_ASSOC); ?>
        <div class='container'>

        <div class='row g-2'>
        
        <?php
        foreach ($result as $key => $value) { ?>
            <div class='col-xl-3 col-lg-6 col-sm-12'>
            <div class='bg-light' style='padding : 20px; box-sizing: border-box;'>
              <a href='product-details.php?id=<?php echo $value['id'] ?>'><?php echo $value["name"] ?></a>
             </div>
            </div>
       <?php }
        ?>
          
    
               </div>
             </div>
 <?php   }

?>
    <!-- <div class='container'>

    <div class='row g-2'>
      <div class='col-xl-3 col-lg-6 col-sm-12'>
        <div class='bg-light' style='padding : 20px; box-sizing: border-box;'>
          <a href=''>Pro Name</a>
         </div>
        </div>
      

           </div>
         </div> -->