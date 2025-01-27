<!DOCTYPE html>
<html lang="en">
<x-backend.head/>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl">

  <script src="{{asset('backend/js/hs.theme-appearance.js')}}"></script>

  <!-- ========== HEADER ========== -->
  <x-backend.header/>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="main">
    <!-- Navbar Vertical -->
     <x-backend.aside_admin />
    
    <!-- End Navbar Vertical -->

    <!-- Content -->
    <div class="content container">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-center">
            <div class="col-md-9 mb-2 mb-sm-0">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-no-gutter">
                  <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Admin</a></li>
                  <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Tableau de Bord</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Aperçu</li>
                </ol>
              </nav>

               <h2 class="page-header-title">Tableau de Bord</h2>
            </div>
            
        </div>
      </div>
      <!-- End Page Header -->

      <!-- Stats -->
      <div class="row">
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Forfaits</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">{{dashboard()['packages']}}</span>
                  <span class="text-body fs-5 ms-1"></span>
                </div>

                
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">FAQs</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">{{dashboard()['faqs']}}</span>
                  <span class="text-body fs-5 ms-1"></span>
                </div>

                
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>
        @hasanyrole('SUPERADMIN| ADMIN')
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Utilisateurs</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">{{dashboard()['users']}}</span>
                  <span class="display-4 text-dark"></span>
                  <span class="text-body fs-5 ms-1"></span>
                </div>

                
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>
        @endhasanyrole
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Revus</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">{{dashboard()['reviews']}}</span>
                  <span class="display-4 text-dark"></span>
                  <span class="text-body fs-5 ms-1"></span>
                </div>

                
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Categories</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">{{dashboard()['categories']}}</span>
                  <span class="text-body fs-5 ms-1"></span>
                </div>

                
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Sponsors</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">{{dashboard()['sponsors']}}</span>
                  <span class="display-4 text-dark"></span>
                  <span class="text-body fs-5 ms-1"></span>
                </div>

                
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        {{--  --}}
        
      </div>
      <!-- End Stats -->

    </div>
    <!-- End Content -->

    <!-- Footer -->
    <x-backend.footer />
    <!-- End Footer -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->


  <!-- JS Global Compulsory  -->
  <x-backend.scripts />

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      // INITIALIZATION OF NAVBAR VERTICAL ASIDE
      // =======================================================
      new HSSideNav('.js-navbar-vertical-aside').init()


      // INITIALIZATION OF BOOTSTRAP DROPDOWN
      // =======================================================
      HSBsDropdown.init()


      // INITIALIZATION OF FORM SEARCH
      // =======================================================
      new HSFormSearch('.js-form-search')
    })()
  </script>


</body>
</html>