<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<nav class="navbar navbar-dark bg-warning fixed-top " style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="">
        <a href="index.php?page=home"><img src="../img.model/logomenor.transp.png" alt="" height="100px" width="250px";></a>
  			</div>
  		</div>
      
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-primary"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>