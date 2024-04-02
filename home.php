 <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row">
                
                        <div class="col-md-6 align-self-center d-flex justify-content-center mt-5"> 
                         
                           <h1 class="display-4 justify-content-start text-danger" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"; >Please Login or Signup 
                           <br>
                           and start your <a href="index.php?#menu" class="btn btn-outline-primary btn-lg"> Order Here </a>
                                             
                        </div> 

                        <div class="col-md-6 align-self-start"> 
                            <img src="img.model/happylady1.png" style="height:600px;" alt="">    
                    	</div>  
                </div>
                    
            </div>
        </header>

        <section id="About_us" class="caixa">

            <div class="container">
              <div class="row">
                <div class="col-md-6 d-flex pt-2 justify-content-center">
                  <div class="align-self-center">
                    <h2 class="About_us">Idealized by a local family of food lovers... </h2>
                    <p>
                    That is why our goal is to provide fresh and delicious dishes to our community.
                    We were created and survived 2020 with your support, we strive to be and to offer the best to our clients.         
                    </p>
                                  
                  </div><!-- fim div align -->

                </div><!-- fim div texto -->

                <div class="col-md-6">

                  <img src="img.model/family.jpg" class="img-fluid pt-5">
                  

                </div><!-- fim div imagem -->

              </div><!-- fim div row -->
              
            </div><!--fim div container -->

        </section><!--fim secao about-us-->


        <hr>


    <section id="specials" class="caixa"> 


    <div class="row">
            
      <div class="col-md-8 justiy-content-center pl-5 pt-5">
       
        <div class="owl-carousel owl-theme pl-5 ml-5">


          <?php 

          /*send array to database*/

          
          $server = 'host.docker.internal';
          $user = 'root';
          $password = 'root';
          $db_name = 'yummy-bar'; /*name of the table created*/
          $port = '3306'; /*MySQL port in Xampp*/
        

          /*$server = 'mna97msstjnkkp7h.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
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
              $sql = "SELECT * FROM dishes WHERE specials='1'";
              $result = $db_connect->query($sql);

              if ($result->num_rows > 0){

                  while ($row = $result->fetch_assoc()){ ?>

                  <div class="item"> 
                      <div class="card" style="width: 300px; height: 370px;">

                          <img src="img.model/<?php echo $row["Code"];?>.jpg" class="card-img-top"/>                
                          
                          <div class="card-body">
                          <h5 class="card-title"><?php echo $row["Name"]; ?></h5>
                          <p class="card-text"><?php echo $row["Description"]; ?></p>
                          <h5 class="card-text">$ <?php echo $row["Price"]; ?></h5>
                          <p class="card-text"><b>Calories: </b><?php echo $row["Calories"]; ?></p>
                                                       
                          
                          </div>
                      </div><!-- end do card -->  
                  </div><!-- end of item --> 
                  
                  
                  <?php
                      

                  }
              } else {
                  'No Specials';
              }
              
                }
                  ?>   
              
              
        </div><!-- end div owl-carousel -->       

      
    </div><!-- fim div col-md-8.2 -->

            <div class="col-md-4 d-flex align-self-center" style="height:200px">
                <img src="img.model/specials.png" alt="">
              </div>

    </section>  <!-- fim specials -->


    <hr>
    
           

	<section class="page-section" id="menu">
        <div id="menu-field" class="card-deck -webkit-center" >
              
           
                   <div class="col-lg-12 justify-content-center ">
                       <h2 class="text-center pb-3">Check Our <img src="img.model/yummy.name.png" alt=""> Options</h2>
                       

                            <ul class="nav nav-tabs nav-justified pl-5 responsive" id="myTab" role="tablist">
                                
                                <li class="nav-item pl-5" role="presentation">
                                <button class="nav-link text-primary active" id="appetizers-tab" data-toggle="tab" data-target="#appetizers" type="button" role="tab" aria-controls="appetizers" aria-selected="true">Appetizers</button>
                                </li>
                                <li class="nav-item pl-5" role="presentation">
                                <button class="nav-link text-primary" id="entrees-tab" data-toggle="tab" data-target="#entrees" type="button" role="tab" aria-controls="entrees" aria-selected="true">Entrees</button>
                                </li>
                                <li class="nav-item pl-5" role="presentation">
                                <button class="nav-link text-primary" id="desserts-tab" data-toggle="tab" data-target="#desserts" type="button" role="tab" aria-controls="desserts" aria-selected="true">Desserts</button>
                                </li>
                                <li class="nav-item pl-5" role="presentation">
                                <button class="nav-link text-primary" id="beverages-tab" data-toggle="tab" data-target="#beverages" type="button" role="tab" aria-controls="beverages" aria-selected="true">Beverages</button>
                                </li>
                            </ul>

            <div class="tab-content ml-5 pl-5 responsive" id="myTabContent">

                <div class="tab-pane fade show active responsive" id="appetizers" role="tabpanel" aria-labelledby="appetizers-tab">

                    <?php 
                    include 'admin/db_connect.php';
                    $qry = $conn->query("SELECT * FROM product_list WHERE Category = 'appetizers'");

                    if(!$qry) {
                        die("Query Failed: " . $conn->error);
                    }

                    while($row = $qry->fetch_assoc()):
                    ?> 


                            <div class="col-lg-10 pl-5 ml-5 responsive" >
                                <div class="column card-deck mr-2" style="width: 300px; height: 500px;" >
                                    <img src="img.model/<?php echo $row["code"];?>.jpg" class="card-img-top" alt="..." style="width: 280px; height: 200px;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                                            <p class="card-text"><?php echo $row["description"]; ?></p>
                                            <p class="card-text"><b>Calories: </b><?php echo $row["calories"]; ?></p>
                                            <h5 class="card-text"><b>$ </b><?php echo $row["price"]; ?></h5>   
                                            
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                                                
                                            </div>
                                        </div>
                                
                                </div>
                            </div>

                            <?php endwhile; ?>

                </div><!-- end of tab appetizers -->


                <div class="tab-pane fade" id="entrees" role="tabpanel" aria-labelledby="entrees-tab">

                <?php 
                    include 'admin/db_connect.php';
                    $qry = $conn->query("SELECT * FROM product_list WHERE Category = 'entrees'");
                    while($row = $qry->fetch_assoc()):
                    ?> 


                            <div class="col-lg-10 pl-5 ml-5">
                                <div class="column card-deck mr-2" style="width: 300px; height: 500px;">
                                    <img src="img.model/<?php echo $row["code"];?>.jpg" class="card-img-top" alt="..." style="width: 280px; height: 200px;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                                            <p class="card-text"><?php echo $row["description"]; ?></p>
                                            <p class="card-text"><b>Calories: </b><?php echo $row["calories"]; ?></p>
                                            <h5 class="card-text"><b>$ </b><?php echo $row["price"]; ?></h5>   
                                            
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                                                
                                            </div>
                                        </div>
                                
                                </div>
                            </div>

                            <?php endwhile; ?>

                </div><!-- end of tab entrees -->

                <div class="tab-pane fade" id="desserts" role="tabpanel" aria-labelledby="desserts-tab">

                <?php 
                    include 'admin/db_connect.php';
                    $qry = $conn->query("SELECT * FROM product_list WHERE Category = 'desserts'");
                    while($row = $qry->fetch_assoc()):
                    ?> 


                            <div class="col-lg-10 pl-5 ml-5">
                                <div class="column card-deck mr-2" style="width: 300px; height: 500px;">
                                    <img src="img.model/<?php echo $row["code"];?>.jpg" class="card-img-top" alt="..." style="width: 280px; height: 200px;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                                            <p class="card-text"><?php echo $row["description"]; ?></p>
                                            <p class="card-text"><b>Calories: </b><?php echo $row["calories"]; ?></p>
                                            <h5 class="card-text"><b>$ </b><?php echo $row["price"]; ?></h5>   
                                            
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                                                
                                            </div>
                                        </div>
                                
                                </div>
                            </div>

                            <?php endwhile; ?>

                </div><!-- end of tab desserts -->

                    

                <div class="tab-pane fade" id="beverages" role="tabpanel" aria-labelledby="beverages-tab">
                 
                <?php 
                    include 'admin/db_connect.php';
                    $qry = $conn->query("SELECT * FROM product_list WHERE Category = 'beverages'");
                    while($row = $qry->fetch_assoc()):
                    ?> 


                            <div class="col-lg-10 pl-5 ml-5">
                                <div class="column card-deck mr-2" style="width: 300px; height: 500px;">
                                    <img src="img.model/<?php echo $row["code"];?>.jpg" class="card-img-top" alt="..." style="width: 280px; height: 200px;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                                            <p class="card-text"><?php echo $row["description"]; ?></p>
                                            <p class="card-text"><b>Calories: </b><?php echo $row["calories"]; ?></p>
                                            <h5 class="card-text"><b>$ </b><?php echo $row["price"]; ?></h5>   
                                            
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                                                
                                            </div>
                                        </div>
                                
                                </div>
                            </div>

                            <?php endwhile; ?>

                </div><!-- end of tab beverages -->


            
            </div> <!-- end of tab-content -->   

                               

        </div>
    </section>
    <script>
        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })

        (function($) {
            fakewaffle.responsiveTabs(['xs', 'sm']);
         })(jQuery);

         $('.column').column({
            
            responsive:{
                0:{
                    items:1,
                    nav:true
                    },
                600:{
                    items:1,
                    nav:false
                },
                1000:{
                    items:3,
                    nav:true,
                    loop:false
                }

            }
        });

    </script>
	
