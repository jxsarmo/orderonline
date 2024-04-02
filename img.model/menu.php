<?php 




include 'header.php'; 
include 'connection-dishes.php';
session_start();




if (isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"],"id");
        if (!in_array($_GET["Code"],$item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'id' => $_GET["Code"],
                'Name' => $_POST["hidden_name"],
                'Price' => $_POST["hidden_price"],
                'quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="menu1.php"</script>';
        }else{
            echo '<script>alert("Dish is already Added to Cart")</script>';
            echo '<script>window.location="menu1.php"</script>';
        }
    }else{
        $item_array = array(
            'id' => $_GET["Code"],
            'Name' => $_POST["hidden_name"],
            'Price' => $_POST["hidden_price"],
            'quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])){
    if ($_GET["action"] == "delete"){
        foreach ($_SESSION["cart"] as $keys => $value){
            if ($value["id"] == $_GET["Code"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Dish has been Removed!")</script>';
                echo '<script>window.location="menu1.php"</script>';
            }
        }
    }
}
?>





?>




    
<div class="container"> 
               
    <div class="row pt-5 mt-5">
     <div class="col-md-12 d-flex justify-content-center">

            
    


        <div class="mb-5 pb-5 pt-5 mt-5 col-md-12 justify-content-center">
            <h2 class="text-center pb-3">Check Our Delicious Options</h2>
            
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                
                <li class="nav-item" role="presentation">
                <button class="nav-link text-primary active" id="appetizers-tab" data-toggle="tab" data-target="#appetizers" type="button" role="tab" aria-controls="appetizers" aria-selected="true">Appetizers</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-primary" id="entrees-tab" data-toggle="tab" data-target="#entrees" type="button" role="tab" aria-controls="entrees" aria-selected="true">Entrees</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-primary" id="desserts-tab" data-toggle="tab" data-target="#desserts" type="button" role="tab" aria-controls="desserts" aria-selected="true">Desserts</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link text-primary" id="beverages-tab" data-toggle="tab" data-target="#beverages" type="button" role="tab" aria-controls="beverages" aria-selected="true">Beverages</button>
                </li>
            </ul>

            <div class="tab-content ml-4" id="myTabContent">

                <div class="tab-pane fade show active" id="appetizers" role="tabpanel" aria-labelledby="appetizers-tab">
                    
                    <?php 
        
    
                            $server = 'host.docker.internal';
                            $user = 'root';
                            $password = 'root';
                            $db_name = 'yummy-bar'; /*name of the table created*/
                            $port = '3306'; /*MySQL port in Xampp*/

                          /*  $server = 'mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
                            $user = 'silulw6q1bquo1gc';
                            $password = 'qcdzu4wvonapunu4';
                            $db_name = 'c7w3q9s4d50778ny'; 
                            $port = '3306'; */
    
                            $db_connect = new mysqli($server,$user,$password,$db_name,$port);
                            mysqli_set_charset($db_connect,"utf8");
    
                            if ($db_connect->connect_error) {
                                echo 'Fail: ' . $db_connect->connect_error;
                            } else {
                                /*echo 'The connection was completed successfully.' . '<br><br>';*/
                                $sql = "SELECT * FROM dishes WHERE Category = 'appetizers' ";
                                $result = $db_connect->query($sql);
    
                            
                                    while ($row = $result->fetch_assoc()){ ?>
    
                            
                                    <div class="item mt-5">
                                        <div class="column card-deck mr-2">
                                        <form class="card d-none d-md-block" method="post" action="menu1.php?action=add&Code=<?php echo $row["Code"];?> style="width: 500;">
                                            <img src="<?php echo $row["Code"];?>.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $row["Name"]; ?></h5>
                                                <p class="card-text"><?php echo $row["Description"]; ?></p>
                                                <p class="card-text"><b>Calories: </b><?php echo $row["Calories"]; ?></p>
                                                <h5 class="card-text"><b>$ </b><?php echo $row["Price"]; ?></h5>   
                                                <input type="text" name="quantity" class="form-control" placeholder="Please add quantity" required> 
                                                <input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
                                                <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
                                                <input type="submit" name="add" class="btn btn-primary btn-block mt-3" value="Add to Cart">                                             
                                                
                                            </div><!-- end div card-body -->
                                    </form><!-- end do card -->
                                        </div>
                                    </div><!-- end of div ol-md-3 -->                                            
 
                                
                    <?php } ?>
                        
                    <?php  } ?>                     
    
                
                
                
                
                
                
                    </div><!-- end of tab appetizers -->

                <div class="tab-pane fade" id="entrees" role="tabpanel" aria-labelledby="entrees-tab">
                    
                <?php 



                        $server = 'host.docker.internal';
                        $user = 'root';
                        $password = 'root';
                        $db_name = 'yummy-bar'; /*name of the table created*/
                        $port = '3306'; /*MySQL port in Xampp*/


                      /*  $server = 'mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
                        $user = 'silulw6q1bquo1gc';
                        $password = 'qcdzu4wvonapunu4';
                        $db_name = 'c7w3q9s4d50778ny'; 
                        $port = '3306'; */


                        $db_connect = new mysqli($server,$user,$password,$db_name,$port);
                        mysqli_set_charset($db_connect,"utf8");

                        if ($db_connect->connect_error) {
                            echo 'Fail: ' . $db_connect->connect_error;
                        } else {
                            /*echo 'The connection was completed successfully.' . '<br><br>';*/
                            $sql = "SELECT * FROM dishes WHERE Category='entrees'";
                            $result = $db_connect->query($sql);

                        
                                while ($row = $result->fetch_assoc()){ ?>

                        
                            
                                    <div class="item mt-5">
                                        <div class="column card-deck mr-2">
                                        <form class="card d-none d-md-block" method="post" action="menu1.php?action=add&Code=<?php echo $row["Code"];?> style="width: 500;">
                                            <img src="<?php echo $row["Code"];?>.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $row["Name"]; ?></h5>
                                                <p class="card-text"><?php echo $row["Description"]; ?></p>
                                                <p class="card-text"><b>Calories: </b><?php echo $row["Calories"]; ?></p>
                                                <h5 class="card-text"><b>$ </b><?php echo $row["Price"]; ?></h5>   
                                                <input type="text" name="quantity" class="form-control" placeholder="Please add quantity" required> 
                                                <input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
                                                <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
                                                <input type="submit" name="add" class="btn btn-primary btn-block mt-3" value="Add to Cart">                                             
                                                
                                            </div><!-- end div card-body -->
                                    </form><!-- end do card -->
                                        </div>
                                    </div><!-- end of div ol-md-3 -->                                            
 
                                
                    <?php } ?>
                        
                    <?php  } ?>                     
                                                                         

                            
                        

            
            
            
            
            
            
                </div><!-- end of tab entrees -->
        
                <div class="tab-pane fade" id="desserts" role="tabpanel" aria-labelledby="desserts-tab">
                    
                <?php 



                                $server = 'host.docker.internal';
                                $user = 'root';
                                $password = 'root';
                                $db_name = 'yummy-bar'; /*name of the table created*/
                                $port = '3306'; /*MySQL port in Xampp*/

                               /*  $server = 'mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
                                $user = 'silulw6q1bquo1gc';
                                $password = 'qcdzu4wvonapunu4';
                                $db_name = 'c7w3q9s4d50778ny'; 
                                $port = '3306'; */

                                $db_connect = new mysqli($server,$user,$password,$db_name,$port);
                                mysqli_set_charset($db_connect,"utf8");

                                if ($db_connect->connect_error) {
                                    echo 'Fail: ' . $db_connect->connect_error;
                                } else {
                                    /*echo 'The connection was completed successfully.' . '<br><br>';*/
                                    $sql = "SELECT * FROM dishes WHERE Category='desserts'";
                                    $result = $db_connect->query($sql);


                                        while ($row = $result->fetch_assoc()){ ?>


                                    
                                <div class="item mt-5">
                                        <div class="column card-deck mr-2">
                                        <form class="card d-none d-md-block" method="post" action="menu1.php?action=add&Code=<?php echo $row["Code"];?> style="width: 500;">
                                            <img src="<?php echo $row["Code"];?>.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $row["Name"]; ?></h5>
                                                <p class="card-text"><?php echo $row["Description"]; ?></p>
                                                <p class="card-text"><b>Calories: </b><?php echo $row["Calories"]; ?></p>
                                                <h5 class="card-text"><b>$ </b><?php echo $row["Price"]; ?></h5>   
                                                <input type="text" name="quantity" class="form-control" placeholder="Please add quantity" required> 
                                                <input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
                                                <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
                                                <input type="submit" name="add" class="btn btn-primary btn-block mt-3" value="Add to Cart">                                             
                                                
                                            </div><!-- end div card-body -->
                                    </form><!-- end do card -->
                                        </div>
                                </div><!-- end of div ol-md-3 -->                                            
 
                                
                    <?php } ?>
                        
                    <?php  } ?>                     
                           

                
                
                
                </div><!-- end of tab desserts -->

                <div class="tab-pane fade" id="beverages" role="tabpanel" aria-labelledby="beverages-tab">
                    
                <?php 



                                $server = 'host.docker.internal';
                                $user = 'root';
                                $password = 'root';
                                $db_name = 'yummy-bar'; /*name of the table created*/
                                $port = '3306'; /*MySQL port in Xampp*/

                                /*  $server = 'mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
                                $user = 'silulw6q1bquo1gc';
                                $password = 'qcdzu4wvonapunu4';
                                $db_name = 'c7w3q9s4d50778ny'; 
                                $port = '3306'; */ 

                                $db_connect = new mysqli($server,$user,$password,$db_name,$port);
                                mysqli_set_charset($db_connect,"utf8");

                                if ($db_connect->connect_error) {
                                    echo 'Fail: ' . $db_connect->connect_error;
                                } else {
                                    /*echo 'The connection was completed successfully.' . '<br><br>';*/
                                    $sql = "SELECT * FROM dishes WHERE Category='beverages'";
                                    $result = $db_connect->query($sql);


                                        while ($row = $result->fetch_assoc()){ ?>



                                    <div class="item mt-5">
                                        <div class="column card-deck mr-2">
                                        <form class="card d-none d-md-block" method="post" action="menu1.php?action=add&Code=<?php echo $row["Code"];?>">
                                            <img src="<?php echo $row["Code"];?>.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $row["Name"]; ?></h5>
                                                <p class="card-text"><?php echo $row["Description"]; ?></p>
                                                <p class="card-text"><b>Calories: </b><?php echo $row["Calories"]; ?></p>
                                                <h5 class="card-text"><b>$ </b><?php echo $row["Price"]; ?></h5>   
                                                <input type="text" name="quantity" class="form-control" placeholder="Please add quantity" required> 
                                                <input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>">
                                                <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
                                                <input type="submit" name="add" class="btn btn-primary btn-block mt-3" value="Add to Cart">                                             
                                                
                                            </div><!-- end div card-body -->
                                    </form><!-- end do card -->
                                        </div>
                                    </div><!-- end of div ol-md-3 -->                                            
 
                                
                    <?php } ?>
                        
                    <?php  } ?>                     
                         

            
            
                </div><!-- end of tab beverages -->
            </div><!-- end of tab-content -->
        </div><!-- end of mb-5 pb-5 -->


                           

                        
        
    </div><!-- end div row -->


                        <div id="cart" class="row col-md-12 justify-content-center"></div>
                                <h3>Cart Details</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Dish</th>
                                        <th width="10%">Quantity</th>
                                        <th width="13%">Price</th>
                                        <th width="10%">Total Price</th>                                        
                                        <th width="17%">Remove Dish</th>
                                    </tr>

                                    <?php
                                                    if(!empty($_SESSION["cart"])){
                                                        $total = 0;
                                                        foreach ($_SESSION["cart"] as $key => $value) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $value["Name"]; ?></td>
                                                                <td><?php echo $value["quantity"]; ?></td>
                                                                <td>$ <?php echo $value["Price"]; ?></td>                                                                 
                                                                <td>
                                                                    $ <?php echo number_format($value["quantity"] * $value["Price"], 2); ?></td>
                                                                <td><a href="menu1.php?action=delete&Code=<?php echo $value["id"]; ?>"><span
                                                                            class="text-danger">Remove Dish</span></a></td>

                                                            </tr>
                                                            <?php
                                                            $total = $total + ($value["quantity"] * $value["Price"]);
                                                        }
                                                            ?>
                                                            <tr>
                                                                <td colspan="3" align="right">Total</td>
                                                                <th align="right">$ <?php echo number_format($total, 2); ?></th>
                                                                <td></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    ?>

                                                

                                                    
                                    </table>
                                </div>
                                <input type="text" name="details" class="form-control" placeholder="Please Add Flavors for Beverages or Any Additional Details">                           
                                <a href="checkout.php" class="btn btn-primary btn-block mb-4 mt-3">Check Out Here</a>

                            </div>
        
 
    
</div><!-- end div container -->


</div>          



<?php include 'footer.php'; ?>           
