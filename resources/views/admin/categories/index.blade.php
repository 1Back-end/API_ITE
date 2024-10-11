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
        <div class="page-header">
          <div class="row align-items-center">
              <div class="col-md-9 mb-2 mb-sm-0">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-no-gutter">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Admin</a></li>
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Aperçu</li>
                  </ol>
                </nav>

                <h2 class="page-header-title">Categories  <span class="badge bg-primary text-light ms-1">{{sizeof($categories)}}</span></h2>
              </div>
              <div class="col-md-3 mb-2 mb-sm-0">
                <a class="btn btn-success btn-md " href="{{url('/admin/categories/create')}}" >
                  <i class="bi-bank2 me-1"></i>
                  Creer Categorie
                </a>
              </div>

          </div>
        </div>
    <!-- End Page Header -->
      <div class="row justify-content-lg-center">
        <div class="col-lg-11">
          <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-12 col-md">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="card-header-title">Categories</h5>
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
                            <input id="datatableWithFilterSearch" type="search" class="form-control" placeholder="Search categories" aria-label="Search users">
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
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{$category->name->fr}}
                                <br>
                                {{$category->name->en}}
                            </td>
                            <td>
                               {{$category->type=='SERVICE'?'SERVICE':''}}
                               {{$category->type=='PRODUCT'?'PRODUIT':''}}
                               {{$category->type=='PROJECT'?'PROJET':''}}
                            </td>
                            <td>
                              <a href="{{url('/admin/categories/edit/'.$category->id)}}">
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
