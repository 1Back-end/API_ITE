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
    @hasanyrole('ADMIN|SUPERADMIN')
     <x-backend.aside_admin />
    @else
     <x-backend.aside_user />
    @endhasanyrole
    <x-backend.alert />
    <!-- End Navbar Vertical -->

    <!-- Content -->
    <div class="content container">
    <!-- Page Header -->
        <x-backend.index_page_header :user="'Admin'" title="Packages" :size="sizeof($packages)" />
      <!-- End Page Header -->
      <div class="row justify-content-lg-center">
        <div class="col-lg-11">
          <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-12 col-md">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="card-header-title">Packages</h5>
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
                            <input id="datatableWithFilterSearch" type="search" class="form-control" placeholder="Search packages" aria-label="Search package">
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
                        <th>Nom (en)</th>
                        <th>Nom (fr)</th>
                        <th>Montant (XAF)</th>
                        <th>Type</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($packages as $package)
                        <tr>
                            <td> {{$package->name->en}}</td>
                            <td> {{$package->name->fr}}</td>
                            <td> {{$package->amount}}</td>
                            <td> {{$package->type}}</td>
                            <td>
                              <a href="{{url('/admin/packages/edit/'.$package->id)}}">
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

  <script>
  (function () {
     // INITIALIZATION OF SELECT
    // =======================================================
    HSCore.components.HSTomSelect.init('.js-select')
  })()
</script>
  <x-backend.initialize_toast />


</body>
</html>
