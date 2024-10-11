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
      <x-backend.index_page_header title="Faqs" :user="'Admin'" :size="sizeof($faqs)"/>
      <!-- End Page Header -->

      

      <div class="card">
        <div class="card-header">
          <div class="row justify-content-between align-items-center flex-grow-1">
            <div class="col-12 col-md">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header-title">Faqs</h5>
              </div>
            </div>
            
            {{--  --}}
            <div class="col-md-auto">
              <!-- Filter -->
              <div class="row align-items-center">
                <div class="col-auto">
                  <!-- Select -->
                  <div class="tom-select-custom">
                    <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" autocomplete="off"
                            data-target-column-index="1"
                            data-target-table="exportDatatable"
                            data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true,
                            "dropdownWidth": "10rem"
                          }'>
                      <option value="null" selected>Any</option>
                    </select>
                  </div>
                  <!-- End Select -->
                </div>

                <div class="col">
                  <form>
                    <!-- Search -->
                    <div class="input-group input-group-merge input-group-flush">
                      <div class="input-group-prepend input-group-text">
                        <i class="bi-search"></i>
                      </div>
                      <input id="datatableWithFilterSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                    </div>
                    <!-- End Search -->
                  </form>
                </div>
                  {{--  --}}
                  <div class="col-auto">
                    <!-- Dropdown -->
                    <div class="dropdown me-2">
                      <button type="button" class="btn btn-white btn-sm dropdown-toggle" id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-download me-2"></i> Export
                      </button>

                      <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                        <span class="dropdown-header">Options</span>
                        <a id="export-copy" class="dropdown-item" href="javascript:;">
                          <img class="avatar avatar-xss avatar-4x3 me-2" src="{{asset('backend/svg/illustrations/copy-icon.svg')}}" alt="Image Description">
                          Copy
                        </a>
                        <a id="export-print" class="dropdown-item" href="javascript:;">
                          <img class="avatar avatar-xss avatar-4x3 me-2" src="{{asset('backend/svg/illustrations/print-icon.svg')}}" alt="Image Description">
                          Print
                        </a>
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-header">Download options</span>
                        <a id="export-excel" class="dropdown-item" href="javascript:;">
                          <img class="avatar avatar-xss avatar-4x3 me-2" src="{{asset('backend/svg/brands/excel-icon.svg')}}" alt="Image Description">
                          Excel
                        </a>
                        <a id="export-csv" class="dropdown-item" href="javascript:;">
                          <img class="avatar avatar-xss avatar-4x3 me-2" src="{{asset('backend/svg/components/placeholder-csv-format.svg')}}" alt="Image Description">
                          .CSV
                        </a>
                        <a id="export-pdf" class="dropdown-item" href="javascript:;">
                          <img class="avatar avatar-xss avatar-4x3 me-2" src="{{asset('backend/svg/brands/pdf-icon.svg')}}" alt="Image Description">
                          PDF
                        </a>
                      </div>
                    </div>
                    <!-- End Dropdown -->
                  </div>
                </div>
              </div>
            </div>
        <!-- Table -->
        <div class="table-responsive datatable-custom">
          <table id="exportDatatable" class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                data-hs-datatables-options='{
                          "dom": "Bfrtip",
                          "buttons": [
                            {
                              "extend": "copy",
                              "className": "d-none"
                            },
                            {
                              "extend": "excel",
                              "className": "d-none"
                            },
                            {
                              "extend": "csv",
                              "className": "d-none"
                            },
                            {
                              "extend": "pdf",
                              "className": "d-none"
                            },
                            {
                              "extend": "print",
                              "className": "d-none"
                            }
                        ],
                        "order": [],
                        "search": "#datatableWithFilterSearch",
                        "pagination": "datatableWithFilterPagination"
                      }'>
            <thead class="thead-light">
            <tr>
              <th>Question</th>
              {{-- <th>Reponse</th> --}}
              <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($faqs as $faq)
            <tr>
              <td>
                <a class="d-flex align-items-center" href="#">
                  <div class="ms-3">
                    <span class="d-block h5 text-inherit mb-0">{{$faq->question->fr}}<i class="bi-patch-check-fill text-primary" data-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                    {{-- <span class="d-block fs-5 text-body">{{$user->email}}</span> --}}
                  </div>
                </a>
              </td>
              {{-- <td>
                <a class="d-flex align-items-center" href="#">
                  <div class="ms-3">
                    <span class="d-block h5 text-inherit mb-0">{{$faq->answer->fr}}<i class="bi-patch-check-fill text-primary" data-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                    {{-- <span class="d-block fs-5 text-body">{{$user->email}}</span> 
                  </div>
                </a>
              </td> --}}
              
              <td>
                <a role="button" class="btn btn-white btn-sm" href="{{url('/admin/faqs/edit/'.$faq->id)}}" >
                  <i class="bi-pencil-fill me-1"></i> Modifier
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
    $(document).on('ready', function () {
      
      // INITIALIZATION OF DATATABLES
    // =======================================================
    HSCore.components.HSDatatables.init('.js-datatable')
    const exportDatatable = HSCore.components.HSDatatables.getItem('exportDatatable')

    document.getElementById('export-copy').addEventListener('click', function () {
      exportDatatable.button('.buttons-copy').trigger()
    })

    document.getElementById('export-excel').addEventListener('click', function () {
      exportDatatable.button('.buttons-excel').trigger()
    })

    document.getElementById('export-csv').addEventListener('click', function () {
      exportDatatable.button('.buttons-csv').trigger()
    })

    document.getElementById('export-pdf').addEventListener('click', function () {
      exportDatatable.button('.buttons-pdf').trigger()
    })

    document.getElementById('export-print').addEventListener('click', function () {
      exportDatatable.button('.buttons-print').trigger()
    })
    });
  </script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      window.onload = function () {
        

        // INITIALIZATION OF NAVBAR VERTICAL ASIDE
        // =======================================================
        new HSSideNav('.js-navbar-vertical-aside').init()


        // INITIALIZATION OF FORM SEARCH
        // =======================================================
        new HSFormSearch('.js-form-search')


        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()


        // INITIALIZATION OF SELECT
        // =======================================================
        HSCore.components.HSTomSelect.init('.js-select')


        // INITIALIZATION OF INPUT MASK
        // =======================================================
        HSCore.components.HSMask.init('.js-input-mask')


        // INITIALIZATION OF NAV SCROLLER
        // =======================================================
        new HsNavScroller('.js-nav-scroller')


        // INITIALIZATION OF COUNTER
        // =======================================================
        new HSCounter('.js-counter')
        

      }
    })()
  </script>

  <x-backend.initialize_toast />

  <script>
  function getReply(id){
      //document.getElementById('long-desc-hidden-'+ id).value= document.getElementById('js-quill-' + id).innerHTML;
      console.log(id)
  }
    
  </script>
</body>
</html>