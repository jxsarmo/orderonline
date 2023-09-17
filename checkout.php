
    
  
  
  <header class="masthead" >
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="row">
                
                <div class="col-md-6 align-self-center d-flex justify-content-center mt-5"> 
                 
                   <h1 class="display-4 justify-content-start text-danger text-center" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"; >Please Confirm Your Address and Check Out</a>
                                     
                </div> 

                <div class="col-md-6 align-self-start"> 
                    <img src="img.model/happylady1.png" style="height:600px;" alt="">    
                </div>  
        </div>
            
                
            </div>
        </div>
    </header>
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <form action="" id="checkout-frm">
                    <h4>Confirm Delivery Information</h4>
                    <div class="form-group">
                        <label for="" class="control-label">Firstname</label>
                        <input type="text" name="first_name" required="" class="form-control" value="<?php echo $_SESSION['login_first_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="text" name="last_name" required="" class="form-control" value="<?php echo $_SESSION['login_last_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Contact</label>
                        <input type="text" name="mobile" required="" class="form-control" value="<?php echo $_SESSION['login_mobile'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo $_SESSION['login_address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['login_email'] ?>">
                    </div> 
                    
                            <h3 >Payment Information</h3>
                                    <div class="row">
                                        <h5 for="fname" class="mt-3 ml-3 mr-3">Accepted Cards</h5>
                                            <div class="mt-3 mb-3">
                                            <i class="fab fa-cc-visa fa-2x" style="color:navy;"></i>
                                            <i class="fab fa-cc-amex fa-2x" style="color:blue;"></i>
                                            <i class="fab fa-cc-mastercard fa-2x" style="color:red;"></i>
                                            <i class="fab fa-cc-discover fa-2x" style="color:orange;"></i>
                                            <i class="fab fa-cc-apple-pay fa-2x"></i>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group d-flex flex-row align-items-center mb-2">
                                        
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="Name on Card" name="Name" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback ml-2"> Please Enter a Valid Name</div>
                                        </div>

                                        <div class="form-group d-flex flex-row align-items-center mb-2">
                                                                                           
                                            <input type="text" class="form-control" id="ccnum" placeholder="Enter Credit Card number" name="cardnumber" required>
                                            <input type="text" class="form-control" id="expmonth" placeholder="Enter Exp Month" name="expmonth" required>
                                            <div class="valid-feedback"></div>
                                            <div class="invalid-feedback ml-2"> Please Enter valid info</div>
                                        </div>

                                        <div class="form-group d-flex flex-row align-items-center mb-2">
                                                                                            
                                            <input type="text" class="form-control" id="expyear" placeholder="Enter Exp Year" name="expyear" required>
                                            <input type="text" class="form-control" id="cvv" placeholder="Enter CVV" name="ccv" required>
                                            <div class="valid-feedback"></div>
                                            <div class="invalid-feedback ml-2"> Please Enter valid info</div>
                                        </div>
                                    

                            <h3>Billing Address</h3>
                                
                                                                                
                                    <div class="form-group d-flex flex-row align-items-center mb-2">
                                        
                                        <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Your Name" name="Name" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback ml-2"> Please Enter a Valid Name</div>
                                    </div>

                                    <div class="form-group d-flex flex-row align-items-center mb-2">
                                        
                                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="Email" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback ml-2"> Please Enter a Valid Email</div>
                                    </div>

                                    <div class="form-group d-flex flex-row align-items-center mb-2">
                                        
                                        <input type="text" class="form-control" id="address" placeholder="Enter Your Address" name="Address" required>                         
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback ml-2"> Please Enter a Valid Address</div>
                                    </div>

                                    <div class="form-group d-flex flex-row align-items-center mb-2">
                                                                                          
                                        <input type="text" class="form-control" id="city" placeholder="City" name="City" required>
                                        <input type="text" class="form-control" id="estate" placeholder=" State" name="State" required>
                                        <input type="text" class="form-control" id="zipcode" placeholder="Your 5-digit Zipcode" name="Zip_Code" pattern="[0-9]{5}" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback ml-2"> Please Enter a Valid City, State and Zipcode</div>
                                    </div> 

                                        <label>
                                                <input type="checkbox" checked="checked" name="sameadr" required> Shipping address same as delivery
                                        </label>


                    <div class="text-center">
                        <button class="btn btn-block btn-outline-primary mb-3">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
          $('#checkout-frm').submit(function(e){
            e.preventDefault()
          
            start_load()
            $.ajax({
                url:"admin/ajax.php?action=save_order",
                method:'POST',
                data:$(this).serialize(),
                success:function(resp){
                    if(resp==1){
                        alert_toast("Order successfully Placed. Thanks for Being a Yummy Bar Customer!")
                        setTimeout(function(){
                            location.replace('index.php?page=home')
                        },1500)
                    }
                }
            })
        })
        })
    </script>