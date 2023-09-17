<?php






?>


 
 
 <!-- Masthead-->


 <header class="masthead">
            <div class="container h-100">
                <div class="row">
                
                        <div class="col-md-6 align-self-center d-flex justify-content-center mt-5"> 
                         
                           <h1 class="display-4 justify-content-start text-danger text-center" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"; ><b>Having a party?</b> We cater!
                        
                        <br>
                    
                        <b>Suggestions?</b> We want to hear them!</h1>                        
                        
                           
                                 
                        </div> 

                       

                        <div class="col-md-6 align-self-start"> 
                            <img src="img.model/happylady1.png" style="height:600px;" alt="">    
                    	</div>  
                </div>
                    
            </div>
</header>
        
            
        
<section id="Contact_us" class="caixa "><!--comeco secao contact-us-->

        <div class="container mt-5">
        	<div class="row mt-5">
        	<div class="col-md-8">
        		
        		<?php 
        		if(isset($_SESSION['login_user_id'])){
					$data = "where c.user_id = '".$_SESSION['login_user_id']."' ";	
				}else{
					$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
					$data = "where c.client_ip = '".$ip."' ";	
				} ?>
				
    
      
                                  
                <h3>Having a party? We cater!</h3>
                <h3>Suggestions? We want to hear them!</h3>


                  <div>
                                
                    <form method="post" id="form1">

                        <div class="pt-2">
                    
                            <input style="width:400px;font-size:12pt;" type="text" name="name" class="field mb-2" placeholder="*Full name" required/>
                            <input style="width:202px;font-size:12pt;" type="text" name="phone" class="field" placeholder="*Phone #" required/>
                            <br>
                            <input style="width:605px;font-size:12pt;" type="email1" name="email1" class="field mb-2" placeholder="*Email" required/>    
                            <br>             
                               
                                                     
                            <input style="width:300px;font-size:12pt;" type="datetime-local" name="date" class="field" placeholder="Date and time"/>

                            <input style="width:300px;font-size:12pt;" type="text" name="number_people" class="field" placeholder="Number of People"/>
                            <br>

                            <textarea style="width:605px;height:100px;font-size:12pt;" type="text" name="message" class="field mt-2" placeholder="*Message" required></textarea>
                            <br>

                            <input type="submit" value="Contact Us" form="form1" class="btn btn-primary mt-2 mb-3" id="form1"></input>                            

                        </div>                       

                        

                    </form>


                          
                  <?php 

                          
                          function clean_input($input) {

                            $input = trim($input);
                            $input = stripcslashes($input);
                            $input = htmlspecialchars($input);

                            return $input;

                          }

                          // Inserir Arquivos do PHPMailer
                          require 'Exception.php';
                          require 'PHPMailer.php';
                          require 'SMTP.php';

                          // Usar as classes sem o namespace
                          use PHPMailer\PHPMailer\PHPMailer;
                          use PHPMailer\PHPMailer\Exception;

                         

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {                                      
                         
                          $name = $_POST['name'];
                          $phone = $_POST['phone'];
                          $email = $_POST['email1'];
                          $date = $_POST['date'];
                          $number_people = $_POST['number_people'];
                          $message = $_POST['message'];

                          $name = clean_input($name);
                          $phone = clean_input($phone);
                          $email = clean_input($email);
                          $date = clean_input($date);
                          $number_people = clean_input($number_people);
                          $message = clean_input($message);

                          //variable created to set the text that will be sent in the email 
                          $text_msg = 'Email sent from Contact Us website form' . '<br><br>' . 
                                      'Name: ' . $name . '<br>' .
                                      'Phone #: ' . $phone . '<br>' .
                                      'Email: ' . $email . '<br>' .
                                      'Date: ' . $date . '<br>' .
                                      'Number of People: ' . $number_people . '<br>' .
                                      'Message: ' . $message . '<br>';


                          $mail = new PHPMailer(true);
                          $mail -> CharSet = "UTF-8";
                          
                          //Enable SMTP debugging.
                          /*$mail->SMTPDebug = 3;*/                               
                          //Set PHPMailer to use SMTP.
                          $mail->isSMTP();            
                          //Set SMTP host name                          
                          $mail->Host = "smtp.gmail.com";
                          //Set this to true if SMTP host requires authentication to send email
                          $mail->SMTPAuth = true;                          
                          //Provide username and password     
                          $mail->Username = "regisuni.projects@gmail.com";                 
                          $mail->Password = "yrdyzudtihbxerea";                           
                          //If SMTP requires TLS encryption then set it
                          $mail->SMTPSecure = "tls";                           
                          //Set TCP port to connect to
                          $mail->Port = 587;                                    
                          
                          $mail->From = "$email";
                          $mail->FromName = "$name";
                          
                          $mail->addAddress("regisuni.projects@gmail.com", "");
                          
                          $mail->isHTML(true);
                          
                          $mail->Subject = "Contact Us Website";
                          $mail->Body = $text_msg;
                          $mail->AltBody = $text_msg;
                          
                          
                          try {
                              $mail->send();
                              echo '<script>alert("Message has been sent successfully")</script>';
                          } catch (Exception $e) {
                              echo '<script>alert("Message not sent")</script>';
                          }
                          
                                                 
                        } 

               
                        
                          

                   ?>  

                          
                          <script>
                              if ( window.history.replaceState ) {
                                  window.history.replaceState( null, null, window.location.href );
                              }
                          </script>
                  
                  </div> <!-- fim da DIV form -->                                  
                      
                      
                    
              </div><!--end div col-md-6 form -->

              <div class="col-md-4 d-flex align-content-end" >

              <img src="img.model/contact1.png" width="400px" height="300px" alt="Contact Us">

              </div>

               
      
          </div><!-- fim div row -->
        
      </div><!--fim div container -->
    
    </section><!--fim secao contact us-->
    </section>
    <style>
    	.card p {
    		margin: unset
    	}
    	.card img{
		    max-width: calc(100%);
		    max-height: calc(59%);
    	}
    	div.sticky {
		  position: -webkit-sticky; /* Safari */
		  position: sticky;
		  top: 4.7em;
		  z-index: 10;
		  background: white
		}
		.rem_cart{
		   position: absolute;
    	   left: 0;
		}
    </style>
    <script>
        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })
        $('.qty-minus').click(function(){
		var qty = $(this).parent().siblings('input[name="qty"]').val();
		update_qty(parseInt(qty) -1,$(this).attr('data-id'))
		if(qty == 1){
			return false;
		}else{
			 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) -1);
		}
		})
		$('.qty-plus').click(function(){
			var qty =  $(this).parent().siblings('input[name="qty"]').val();
				 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) +1);
		update_qty(parseInt(qty) +1,$(this).attr('data-id'))
		})
		function update_qty(qty,id){
			start_load()
			$.ajax({
				url:'admin/ajax.php?action=update_cart_qty',
				method:"POST",
				data:{id:id,qty},
				success:function(resp){
					if(resp == 1){
						load_cart()
						end_load()
					}
				}
			})

		}

		$('.qty-price').click(function(){
			var qty =  $(this).parent().siblings('input[name="price"]').val();
				 $(this).parent().siblings('input[name="price"]').val(parseInt(qty) +1);
		update_qty(parseInt(qty) +1,$(this).attr('data-id'))
		})
		function update_price(qty,price){
			start_load()
			$.ajax({
				url:'admin/ajax.php?action=update_cart_price',
				method:"POST",
				data:{id:price,qty},
				success:function(resp){
					if(resp == 1){
						load_cart()
						end_load()
					}
				}
			})

		}	
		
		$('.del-item').click(function(){

			var qty =  $(this).parent().siblings('input[name="cid"]').val();
				 $(this).parent().siblings('input[name="cid"]').val(parseInt(qty) +1);
		update_qty(parseInt(qty) +1,$(this).attr('data-id'))
		})

		
		
		

		$('#checkout').click(function(){
			if('<?php echo isset($_SESSION['login_user_id']) ?>' == 1){
				location.replace("index.php?page=checkout")
			}else{
				uni_modal("Checkout","login.php?page=checkout")
			}
		})
    </script>
	
