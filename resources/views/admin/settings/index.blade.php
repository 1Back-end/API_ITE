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
    <x-backend.alert />
    <!-- End Navbar Vertical -->

    <!-- Content -->
    <div class="content container">
      <!-- Page Header -->
      <x-backend.index_page_header :user="'Admin'" title="Settings" :size="sizeof($settings)" />
      <!-- End Page Header -->
      <div class="row justify-content-lg-center">
        <div class="col-lg-11">
          <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-12 col-md">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="card-header-title">Settings</h5>
                    </div>
                </div>

                <div class="col-md-auto">
                    <!-- Filter -->
                    <div class="row align-items-center">
                    
                    <div class="col">
                        <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                            <i class="bi-search"></i>
                            </div>
                            <input id="datatableWithFilterSearch" type="search" class="form-control" placeholder="Search settings" aria-label="Search users">
                        </div>
                        <!-- End Search -->
                        </form>
                    </div>
                    </div>
                    <!-- End Filter -->
                </div>
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatbleWithFilter" class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                    data-hs-datatables-options='{
                            "columnDefs": [{
                                "targets": [1],
                                "orderable": false
                            }],
                            "order": [],
                            "search": "#datatableWithFilterSearch",
                            "isResponsive": false,
                            "isShowPaging": false,
                            "pagination": "datatableWithFilterPagination"
                            }'>
                    <thead class="thead-light">
                    <tr>
                        <th>Nom du site</th>
                        <th>Email du site</th>
                        <th>Slogan</th>
                        <th>Ville</th>
                        <th>Addresse</th>
                        <th>telephone</th>
                        {{-- <th>Heurs d'ouverture</th> --}}
                        <th>Actions</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($settings as $setting)  
                        <tr>
                            <td>
                              <a class="d-flex align-items-center" href="#">
                                <div class="avatar avatar-circle">
                                  <img class="avatar-img" src="{{asset('config/logos/'.$setting->logo)}}" onerror="src='{{asset('backend/img/160x160/img1.jpg')}}'" alt="Image Description">
                                </div>
                                <div class="ms-3">
                                  <span class="d-block h5 text-inherit mb-0">{{$setting->company_name}}</span>
                                </div>
                              </a>
                            </td>
                            <td> {{$setting->company_email}}</td>
                            <td> {{$setting->company_slogan}}</td>
                            <td> {{$setting->city->name}}</td>
                            <td> {{$setting->location}}</td>
                            <td> {{$setting->contact->phone}}</td>
                            {{-- <td> {{$setting->open_hours}}</td> --}}
                            <td>
                              <a href="{{url('/admin/settings/edit/'.$setting->id)}}">
                                <i class="bi bi-pen"></i>
                              </a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="d-flex justify-content-center justify-content-sm-end">
                <nav id="datatableWithFilterPagination" aria-label="Activity pagination"></nav>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->
            </div>
        </div>
      </div>
      <!-- End Row -->
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

      
      // INITIALIZATION OF DATATABLES
      // =======================================================
      HSCore.components.HSDatatables.init('.js-datatable')
    })()
  </script>
  <x-backend.initialize_toast />

  <script>
  (function () {
     // INITIALIZATION OF SELECT
    // =======================================================
    HSCore.components.HSTomSelect.init('.js-select')
  })()
</script>


</body>
</html>