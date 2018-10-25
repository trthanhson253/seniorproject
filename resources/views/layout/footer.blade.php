 <footer class="mt-4" style="background: #232F3E;">
      <div class="container" style="margin-top: 60px;">
        <div class="row">
          <h5 class="text-uppercase" style="color: #febc11;">university contact info</h5>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs text-white p-3">
              <li><h5>Kennesaw Campus</h5></li>
              <li>1000 Chastain Road</li>
              <li>Kennesaw, GA 30144</li>
              <li>Phone: 470-578-6000</li>
            </div>
            <div class="col-xs-4 text-white p-3">
              <li><h5>Marietta Campus</h5></li>
              <li>1100 South Marietta Pkwy</li>
              <li>Marietta, GA 30060</li>
              <li>Phone: 470-578-6000</li>
            </div>
            
           
          
          </div>
        </div>

    
    
  
        <hr style="background: #febc11;">
        <center class="text-white">© 2018 Kennesaw State University. All Rights Reserved.</center>
      </div>
    </footer>

        <script src="frontpage/js/jquery.min.js"></script>
        <script src="frontpage/js/jquery.js"></script>
        <script src="frontpage/js/popper.min.js"></script>
        <script src="frontpage/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="frontpage/js/slick.min.js"></script>
        <script>
          $(document).ready(function(){
            $(".slider").slick({
              // normal options...
              infinite: false,
              autoplaySpeed: 500,

              // the magic
              responsive: [{

              breakpoint: 549,
              settings: {
                slidesToShow: 1,
                dots: true
              }

            }, {
                breakpoint: 1490,
                settings: {
                  slidesToShow: 5,
                  dots: true
                }
              },
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 4,
                    dots: true
                  }

                }, {
                  breakpoint: 790,
                  settings: {
                    slidesToShow: 3,
                    dots: true
                  }

                },{

                breakpoint: 675,
                settings: {
                  slidesToShow: 2,
                  dots: true
                }

              }]
            });
          },
        );

        </script>
        <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",76067]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>
    </body>
</html>
