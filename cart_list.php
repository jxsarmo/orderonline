 
 
 <?php

include 'admin/db_connect.php';

?>


 
 
 <!-- Masthead-->


 <header class="masthead">
            <div class="container h-100">
                <div class="row">
                
                        <div class="col-md-6 align-self-center d-flex justify-content-center mt-5"> 
                         
                           <h1 class="display-4 justify-content-start text-danger text-center" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"; >Please Check your <img src="img.model/yummy.name.png" alt=""> Cart</a>
                                             
                        </div> 

                        <div class="col-md-6 align-self-start"> 
                            <img src="img.model/happylady1.png" style="height:600px;" alt="">    
                    	</div>  
                </div>
                    
            </div>
</header>
        
            
        
	<section class="page-section" id="menu">
        <div class="container">
        	<div class="row">
        	<div class="col-lg-8">
        		<div class="sticky">
	        		<div class="card">
	        			<div class="card-body">
	        				<div class="row">
		        				<div class="col-md-8"><b>Dish</b></div>
		        				<div class="col-md-4 text-right"><b>Total</b></div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
        		<?php 
        		if(isset($_SESSION['login_user_id'])){
					$data = "where c.user_id = '".$_SESSION['login_user_id']."' ";	
				}else{
					$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
					$data = "where c.client_ip = '".$ip."' ";	
				}
				$total = 0;

			
				
				$get = $conn->query("SELECT *,c.id as cid FROM cart c inner join product_list p on p.id = c.product_id ".$data);
				while($row= $get->fetch_assoc()):
					$total += ($row['qty'] * $row['price']);
        		?>

				

        		<div class="card">
	        		<div class="card-body">
		        		<div class="row">
			        		<div class="col-md-4" style="text-align: -webkit-center">

							<a href="delcart.php?remove=<?= $row['cid'] ?>" class="text-danger lead rem_cart btn btn-sm btn-outline-danger " onclick="return confirm('Dish has been removed!');"><i class="fas fa-trash-alt"></i></a>
							
			        			<img class="pl-4" src="img.model/<?php echo $row['code'] ?>.jpg" alt="">
			        		</div>
			        		<div class="col-md-4">
			        			<p><b><large><?php echo $row['name'] ?></large></b></p>
			        			<p class='truncate'> <b><small>Desc :<?php echo $row['description'] ?></small></b></p>
			        			<p> <b><small>Unit Price :<?php echo number_format($row['price'],2) ?></small></b></p>
			        			<p><small>QTY :</small></p>

			        			<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <button class="btn btn-outline-secondary qty-minus" type="button" data-id="<?php echo $row['cid'] ?>"><span class="fa fa-minus"></button>
								  </div>
								  <input type="number" readonly value="<?php echo $row['qty'] ?>" min = 1 class="form-control text-center" name="qty" >
								  <div class="input-group-prepend">
								    <button class="btn btn-outline-secondary qty-plus" type="button" data-id="<?php echo $row['cid'] ?>"><span class="fa fa-plus"></span></button>
								  </div>
								  <div class="mr-3">
								  <a href="javascript:window.location.reload(true)">Update Quantity</a>
								  <hr>								  

								  </div>

								  							                                              
                                                
								</div>
			        		</div>

			        		<div class="col-md-4 text-right qty-price">

							<b><large><?php echo number_format($row['qty'] * $row['price'],2) ?></large></b>
			        		</div>

		        		</div>

							<div >
								<label for="details" class="text-primary">Please Add Flavors for Beverages or Any Additional Details</label>	
								<input style="height:50px" type="text" name="details" class="form-control">                           
							</div>
	        		</div>
	        	</div>

	        <?php endwhile; ?>
        	</div>
        	<div class="col-md-4">
        		<div class="sticky">
        			<div class="card">
        				<div class="card-body">
        					<p><large style="font-weight:bold";>Total Amount</large></p>
        					<hr>
							

        					<p class="text-right"><b><?php echo number_format($total,2) ?></b></p>
        					<hr>
        					<div class="text-center">
        						<button class="btn btn-block btn-outline-primary" type="button" id="checkout">Proceed to Checkout</button>
								<a href="index.php?#menu" class="btn btn-block btn-outline-primary" type="button" id="checkout">I Want to Add More Dishes</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	</div>
        </div>
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
	
