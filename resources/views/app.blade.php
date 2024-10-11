<!doctype html>
<html lang="fr">
  <x-frontend.head />
  
<body>
        <script id="__bs_script__">
          //<![CDATA[
          document.write("<script async src='/browser-sync/browser-sync-client.js?v=2.27.7'><\/script>".replace("HOST",
            location.hostname));
          //]]>
        </script>

       <style type="text/css">
         @media (min-width: 1400px) {
           .container-lg {
             max-width: 1140px;
           }
         }
       </style>
       <script src="{{asset('frontend/assets/js/hs.theme-appearance.js')}}"></script>


        <!-- ========== HEADER ========== -->  

        <header id="header" class="navbar navbar-expand-lg navbar-floating navbar-end navbar-light ">
            <div class="container-lg">
                
                <!-- ========== NAVIGATION ========== -->  
      
                <x-frontend.nav />
            
                <!-- ========== END NAVIGATION ========== -->
            
            </div>
        </header>  
        
        <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
 <main id="content" role="main">
    <!-- Hero -->
    <div class="position-relative bg-img-start" style="background-image: url(frontend/assets/img/app.jpg); background-size: cover;  background-attachment:scroll;  ">
      <div class="container content-space-t-3 content-space-t-lg-4 content-space-b-2 position-relative zi-2">
        <div class="w-md-75 w-lg-50 text-center   mx-md-auto mb-5 mb-md-4">
          <h1 class="text-white">App</h1>
          <p class="text-white">We are constantly improve our apps by using all the capabilities of modern mobile devices.</p>
        </div>
      </div>
    </div>

   
      <section class="container-lg pt-5 pb-5 mt-lg-3 mt-xl-4 mt-xxl-5 my-4">
        <div class="row align-items-center pt-3 pt-sm-4 pt-lg-5 mt-md-3 mt-lg-0" data-aos="zoom-in" data-aos-duration="600" data-aos-offset="100" data-disable-parallax-down="lg">
          <div class="col-md-6 pb-2 pb-sm-0 mb-4 mb-sm-5 mb-md-0">
            <!-- Binded images-->
            <div class="binded-content">
              <!-- Item-->
              <div class="binded-item active" id="image1">
                <img class="d-block position-relative zindex-2" src="{{asset('frontend/assets/svg/illustrations/services/directory.svg')}}" alt="App screen">
              </div>

            </div>
          </div><div class="col-xl-1"></div>
          <div class="col-md-6 col-xl-5">
            <div class="ps-md-4 ps-xl-0">
              <!-- Swiper slider-->
              <div class="">
                <div aria-live="polite">
                  <!-- Item-->
                  <div style="margin-right: 30px;">
                    <h2 class="h2 mb-lg-4">Annuaire digital</h2>
                    <p class="mb-4">Allo Vaho est un annuaire Internet gratuit qui permet aux internautes de trouver les références d'une entreprise ou d'un particulier. Les annonces sont classées par catégories et localisés sur une carte..</p>
                       <!-- List Checked -->
                        <ul class="list-checked list-checked-soft-bg-primary list-checked-lg">
                          <li class="list-checked-item">Facile à utiliser</li>
                          <li class="list-checked-item">Rapide</li>
                          <li class="list-checked-item">Adaptatif</li>
                        </ul>
                        <!-- End List Checked -->
                  </div>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
              </div>
              
            </div>
          </div>
        </div>
      </section>
    <!-- End Features -->

    <!-- Features -->
    
  <section class=" bg-soft-info">
    <div class="container-lg content-space-lg-2">
      <div class="row align-items-centent justify-content-center">
        <div class="col-md-6 order-md-2 mb-7 mb-md-0">
         
          <div class="binded-content">
            <!-- Item-->
            <div class="binded-item active" id="image1">
              <img class="d-block position-relative zindex-2" src="{{asset('frontend/assets/svg/illustrations/services/messagerie.svg')}}" alt="App screen">
            </div>

          </div>
        </div>
        <!-- End Col -->

        <div class="col-md-5">
          <!-- Heading -->
          <div class="mb-5">
            <h2 class="mb-3">Messagerie</h2>
            <p>Une messagerie professionnelle intégrée pour vos échanges.</p>
          </div>
          <!-- End Heading -->

          <!-- List Checked -->
          <ul class="list-checked list-checked-soft-bg-primary list-checked-lg">
            <li class="list-checked-item">Rapide</li>
            <li class="list-checked-item">Message groupé</li>
            <li class="list-checked-item">Bonne experience utilisatuer</li>
          </ul>
          <!-- End List Checked -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>

  </section>
     <!-- How it work -->
     <div class="bg-white">
      <section class="container-lg pt-5 pb-5 mt-lg-4 mt-xl-4 mt-xxl-5 ">
        <div class="row align-items-center pt-3 pt-sm-4 pt-lg-5 mt-md-3 mt-lg-0 " data-aos="zoom-in" data-aos-duration="600" data-aos-offset="100" data-disable-parallax-down="lg">
          <span class="divider-center text-dark mb-4">Telecharger notre application</span>
          <div class="col-md-6 pb-2 pb-sm-0 mb-4 mb-sm-5 mb-md-0">
            <!-- Binded images-->
            <div class="binded-content">
              <!-- Item-->
              <div class="binded-item active" id="image1">
               
                              <img class="img-fluid" src="{{asset('frontend/assets/img/app/app-showcase/screens/12-en.png')}}" alt="App screen">
            
              </div>

            </div>
          </div>
          <div class="col-xl-1"></div>
          <div class="col-md-6 col-xl-5">
            <div class="ps-md-4 ps-xl-0">
              <!-- Swiper slider-->
              <div class="">
                <div aria-live="polite">
                  <!-- Item-->
                  <div style="margin-right: 30px;">
                    <h1 class="h2 mb-lg-4">Une nouvelle façon de faire des affaires</h1>
                    <p class="mb-0">Nous vous offrons une nouvelle génération de services mobiles. Gérez répertoire dans votre poche. Utilisez le code QR pour télécharger facilement notre application mobile.
                    <div class="d-flex flex-column flex-sm-row justify-content-center text-center justify-content-md-start">
                      <div class=" my-4  py-2">
                        <div class="d-flex align-items-center mb-3">

                          <a href="https://apps.apple.com/ca/app/" class="btn btn-dark btn-lg px-3 py-2 me-sm-3 me-lg-4 mb-3" target="_blank">
                            <img src="{{asset('frontend/assets/img/store/appstore-light.svg')}}" data-hs-theme-appearance="default" class="img-fluid" width="124" alt="App Store">
                            <img src="{{asset('frontend/assets/img/store/appstore-dark.svg')}}" data-hs-theme-appearance="dark" class="img-fluid" width="124" alt="App Store">
                          </a>
                          <a href="https://play.google.com/store/apps/" class="btn btn-dark btn-lg px-3 py-2 mb-3 ms-1" target="_blank">
                            <img src="{{asset('frontend/assets/img/store/googleplay-light.svg')}}" data-hs-theme-appearance="default" class="img-fluid" width="124" alt="Google Play">
                            <img src="{{asset('frontend/assets/img/store/googleplay-dark.svg')}}" data-hs-theme-appearance="dark" class="img-fluid" width="124" alt="Google Play">
                          </a>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <!-- ========== FOOTER ========== -->

  <!-- ========== FOOTER ========== -->    
  
    <x-frontend.footer />
    
   <!-- ========== END FOOTER ========== -->  
   
   <!-- ========== SECONDARY CONTENTS ========== -->

  <!-- Go To -->
  <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
    <i class="bi-chevron-up"></i>
  </a>  <!-- End Go To -->
    <!-- ========== END SECONDARY CONTENTS ========== -->
    
    
    
    <!-- ==========  SCRIPTS ========== -->
    
    <x-frontend.scripts />
    
       <!-- ========== END SCRIPTS ========== -->
   

  </body>
</html>
</body>

</html>