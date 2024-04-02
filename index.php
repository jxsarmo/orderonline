<?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>


<!DOCTYPE html>
<html lang="en">

    <style>
    	header.masthead {
		  background: #ffc107;
		  background-repeat: no-repeat;
		  background-size: cover;
		}
    </style>
    
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger text-primary" href="index.php" >Welcome to <img src="img.model/logomenor.transp.png" alt="" style="width:250px"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-primary" style="font-size:20px" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-primary" style="font-size:20px" href="index.php?page=contactus">Talk to Us</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-primary" style="font-size:20px" href="index.php?page=cart_list"><span> <span class="badge badge-danger item_count">0</span> <i class="fa fa-shopping-cart"></i>  </span>Cart</a></li>
                        
                        <?php if(isset($_SESSION['login_user_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-danger" style="font-size:20px" href="admin/ajax.php?action=logout2"><?php echo "Hello,   ". $_SESSION['login_first_name'].' '.$_SESSION['login_last_name'] ?> <i class="fa fa-power-off ml-2"></i></a></li>
                      <?php else: ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-danger" style="font-size:20px" href="javascript:void(0)" id="login_now">Login</a></li>
                      <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
       
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa-solid fa-circle-xmark"></i>></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>


  <footer class="bg-warning">

<div class="container mb-4">
    <div class="row">

      <div class="col-md-4 d-flex pt-4">

            <div>

            <h4 style="text-align:center" >Work hours</h4>
            
                
            <?php 
            
                /*
                    * I setup the hours for each day if they carry-over)
                    * Sun from 11:00 AM - 06:00 PM
                    * mon-fri is open from 11:00 AM - 12:00 AM
                    * Sat from 11:00 AM - 02:00 AM
                */

                    
                    /*$storeSchedule = [
                        'Sun' => ['11:00 AM' => '06:00 PM'],
                        'Mon' => ['11:00 AM' => '12:00 AM'],
                        'Tue' => ['11:00 AM' => '12:00 AM'],
                        'Wed' => ['11:00 AM' => '12:00 AM'],
                        'Thu' => ['11:00 AM' => '12:00 AM'],
                        'Fri' => ['11:00 AM' => '12:00 AM'],
                        'Sat' => ['11:00 AM' => '02:00 AM']
                    ];*/
                    
                    date_default_timezone_set("America/Denver");
                    $day_week = date("w");
                    $current_time = date("H");
                    
                    
                                                 

                    if ($day_week == 0 and $current_time < 2) /*Sunday*/ { 
                        
                        $status = 'Open';
                        }
                    elseif($day_week == 0 and $current_time >= 11 and $current_time < 18){
                        $status = 'Open';

                    }
                    elseif ($day_week >=1 and $day_week <=5 and $current_time >= 11) /*Mon to Fri*/ {
                            
                               $status = 'Open';
                            }
                    elseif ($day_week == 6 and $current_time >= 11) /*Sat*/ {
                            
                              $status = 'Open';
                          }                               
                    else {
                             $status = 'Closed';
                        }                          
                                                                
            ?>             
                         
                              
                                
            <p style="text-align:center"><span style="font-weight:bold;color:green;"><?php echo "We Are $status Now";?></span><br>
                
                Mon-Fri: 11 am - 12 am<br>
                Saturday 11 am - 2 am<br>
                Sunday 11 am - 6pm 
            
            </p>

                </div><!--end div work hours -->
            
            </div><!--end col-md-4 work hours -->

            <div class="col-md-4 d-flex justify-content-center pt-4">

                <div>

                        <h4 style="text-align:center">We are here</h4>
                            <address style="text-align:center">               
                                     
                            500 16th St Mall<br>
                            Denver, CO 80202<br>
                            T. 303 000 0122 <br>
                            <a href="mailto:webmaster@example.com">contact_us@yummybar.com</a>
                
                </address>
                
                </div><!--end div We are here -->

            </div><!--end col-md-4 we are here-->

            <div class="col-md-4 d-flex justify-content-end">
             
               <div class="pl-5 pt-4">  

               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.8270172568605!2d-104.99355748462442!3d39.74353637944906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c78d6b0540bbf%3A0xa1ddc775bb47908c!2s500%2016th%20St%20Mall%2C%20Denver%2C%20CO%2080202!5e0!3m2!1spt-BR!2sus!4v1665491388596!5m2!1spt-BR!2sus" 
                width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               
               </div><!--end div map -->

            </div><!--end col-md-4  div map -->
      
                         

       </div><!--fim col-md-12 -->    
   
    </div><!--fim div row -->
    
    

    <div class="row">

       <div class="col-md-12 d-flex justify-content-center">

        <a href="" class="btn btn-outline-dark">
        <i class="fa fa-facebook-square"></i>
        </a> 

        <a href="" class="btn btn-outline-dark ml-2">
        <i class="fa fa-twitter"></i>
        </a> 

        <a href="" class="btn btn-outline-dark ml-2">
        <i class="fa fa-instagram"></i>
        </a> 

        <a href="" class="btn btn-outline-dark ml-2">
        <i class="fa fa-youtube"></i>
        </a> 

       </div>
    
    </div><!--fim div row -->

    <div class="row">

        <div class="copyright col-md-12 d-flex justify-content-center">

            <?php $current_year = date("Y"); ?>
            
            <?php echo $current_year; ?> &copy; All Rights Reserved
            
        </div>

    </div>
    

  </div><!--fim div row -->
  
</div><!--fim div container -->




</footer>
        
       <?php include('footer.php') ?>
    </body>

    <?php $conn->close() ?>

</html>
