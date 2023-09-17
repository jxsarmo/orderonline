 <script>
 	$('.datepicker').datepicker({
 		format:"yyyy-mm-dd"
 	})
 	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

 	window.uni_modal = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    })
}
  window.uni_modal_right = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal_right .modal-title').html($title)
                $('#uni_modal_right .modal-body').html(resp)
                $('#uni_modal_right').modal('show')
                end_load()
            }
        }
    })
}
window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  window.load_cart = function(){
    $.ajax({
      url:'admin/ajax.php?action=get_cart_count',
      success:function(resp){
        if(resp > -1){
          resp = resp > 0 ? resp : 0;
          $('.item_count').html(resp)
        }
      }
    })
  }
  $('#login_now').click(function(){
    uni_modal("LOGIN",'login.php')
  })
  $(document).ready(function(){
    load_cart()
  })
 </script>
 <!-- Bootstrap core JS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script src="owl.carousel.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

    <!-- download at github.com/jquery/jquery-mousewheel 
    <script src="jquery.mousewheel.min.js"></script> -->

    
    <script>
        $('.owl-carousel').owlCarousel({
            items: 3,
            loop: true, 
            margin: 5,
            autoplay: true,  
            autoplayTimeout:3000, 
            autoplayHoverPause: true,          
            dots: true,            
                    
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

        

        $(document).ready(function(){
           $(".owl-carousel").owlCarousel();
        })

        $('.play').on('click',function(){

                owl.trigger('play.owl.autoplay',[3000])
            })
            $('.stop').on('click',function(){
                owl.trigger('stop.owl.autoplay')
        })

       ('.owl-carousel').on('mousewheel', 'owl-stage', function (e) {
            if (e.deltaY>0) {
                $('.owl-carousel').trigger('next.owl');
            } else {
                $$('.owl-carousel').trigger('prev.owl');
            }
            e.preventDefault();
        });
    
        $('.tab-content').tab-content({
            
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
              
  </body>
</html>
