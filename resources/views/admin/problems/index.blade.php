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
     <x-backend.aside_user />
     <x-backend.alert />

    <!-- End Navbar Vertical -->

    <!-- Content -->
    <div class="content container">
    <!-- Page Header -->
      <x-backend.page_header title="Problems" :user="'User'" :type="'Overview'"/>
      <!-- End Page Header -->

      <!-- Stats -->
      <div class="row">
        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Problemes</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">{{$problems}}</span>
                  
                </div>
                <!-- End Col -->

                <div class="col-auto">
                  <span class="badge bg-soft-success text-success p-1">
                    <i class="bi-graph-up"></i> 5.0%
                  </span>
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Suggestions</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">{{$suggestions}}</span>
                  
                </div>
                <!-- End Col -->

                <div class="col-auto">
                  <span class="badge bg-soft-success text-success p-1">
                    <i class="bi-graph-up"></i> 5.0%
                  </span>
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
          <!-- Card -->
          <div class="card h-100">
            <div class="card-body">
              <h6 class="card-subtitle mb-2">Requetes</h6>

              <div class="row align-items-center gx-2">
                <div class="col">
                  <span class="js-counter display-4 text-dark">{{$user_requests}}</span>
                  
                </div>

                <div class="col-auto">
                  <span class="badge bg-soft-success text-success p-1">
                    <i class="bi-graph-up"></i> 1.2%
                  </span>
                </div>
              </div>
              <!-- End Row -->
            </div>
          </div>
          <!-- End Card -->
        </div>

       

        
      </div>
      <!-- End Stats -->

      <div class="card">
        <div class="card-header">
          <div class="row justify-content-between align-items-center flex-grow-1">
            <div class="col-12 col-md">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header-title">Problemes</h5>
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
              <th>Titre</th>
              <th>Type</th>
              {{-- <th>User</th> --}}
              <th>Reponse</th>
              <th>Statut</th>
              <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($my_problems as $problem)
            <tr>
              <td>
                <a class="d-flex align-items-center" href="#">
                  <div class="ms-3">
                    <span class="d-block h5 text-inherit mb-0">{{$problem->title}}<i class="bi-patch-check-fill text-primary" data-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></span>
                    {{-- <span class="d-block fs-5 text-body">{{$user->email}}</span> --}}
                  </div>
                </a>
              </td>
              <td>
                {{$problem->type}}
              </td>
              
              <td>
                {{$problem->reply==null?'No':'Yes'}}
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <span class="legend-indicator bg-{{$problem->status==0?'warning':''}}{{$problem->status==1?'success':''}}{{$problem->status==-1?'danger':''}}"></span>
                  {{$problem->status==0?'En Attente':''}}
                  {{$problem->status==1?'Resolu':''}}
                  {{$problem->status==-1?'Impossible a resourdre pour le moment':''}}
                </div>
              </td>
              
              <td>
                <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal_{{$problem->id}}" onclick="getId('hello')">
                  <i class="bi-pencil-fill me-1"></i> Details
                </button>
              </td>
            </tr>

            <!-- Details -->
            <div class="modal fade" id="editUserModal_{{$problem->id}}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Details Du Problem</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <!-- Body -->
                  <div class="modal-body">
                    <!-- Nav Scroller -->
                    <div class="js-nav-scroller hs-nav-scroller-horizontal">
                      <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                        <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                          <i class="bi-chevron-left"></i>
                        </a>
                      </span>

                      <span class="hs-nav-scroller-arrow-next" style="display: none;">
                        <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                          <i class="bi-chevron-right"></i>
                        </a>
                      </span>

                      <!-- Nav -->
                      <ul class="js-tabs-to-dropdown nav nav-segment nav-fill mb-5" id="editUserModalTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab" aria-selected="true">
                            <i class="bi-person me-1"></i> Info
                          </a>
                        </li>
                        
                      </ul>
                      <!-- End Nav -->
                    </div>
                    <!-- End Nav Scroller -->

                    <!-- Tab Content -->
                    <div class="tab-content" id="editUserModalTabContent">
                      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form>
                          
                          <!-- Profile Cover -->
                          <div class="profile-cover">
                            <div class="profile-cover-img-wrapper">
                              <img id="editProfileCoverImgModal" class="profile-cover-img" src='{{asset('screenshots/'.$problem->screenshot)}}' onerror="src='{{asset('backend/img/1920x400/img1.jpg')}}'" alt="Image Description">

                              <!-- Custom File Cover -->
                              <div class="profile-cover-content profile-cover-uploader p-3">
                                
                                {{-- <label class="profile-cover-uploader-label btn btn-sm btn-white" for="editProfileCoverUplaoderModal">
                                  <i class="bi-camera-fill"></i>
                                  <span class="d-none d-sm-inline-block ms-1">Upload header</span>
                                </label> --}}
                              </div>
                              <!-- End Custom File Cover -->
                            </div>
                          </div>
                          <!-- End Profile Cover -->
                          <!-- Form -->
                          <div class="row mb-4">
                            <label for="editFirstNameModalLabel" class="col-sm-3 col-form-label form-label">Titre</label>

                            <div class="col-sm-9">
                              <div class="input-group input-group-sm-vertical">
                                <input type="text" class="form-control" name="editFirstNameModal" id="editFirstNameModalLabel" placeholder="Your first name" aria-label="Your first name" value="{{$problem->title}}" disabled>
                              </div>
                            </div>
                          </div>
                          <!-- End Form -->
                          <!-- Form -->
                          <div class="row mb-4">
                            <label for="editPhoneLabel" class="col-sm-3 col-form-label form-label">Type </label>

                            <div class="col-sm-9">
                              <div class="input-group input-group-sm-vertical">
                                <input type="text" class="form-control" name="editEmailModal" id="editEmailModalLabel" value="{{$problem->type}}" disabled>
                              </div>
                            </div>
                          </div>
                          <!-- End Form -->

                          <!-- Form -->
                          <div class="row mb-4">
                            <label for="editOrganizationModalLabel" class="col-sm-3 col-form-label form-label">Description</label>

                            <div class="col-sm-9">
                              {!!$problem->description!!}
                            </div>
                          </div>
                          <!-- End Form -->

                          <!-- Form -->
                          <div class="row mb-4">
                            <label for="editOrganizationModalLabel" class="col-sm-3 col-form-label form-label">Reponse</label>

                            <div class="col-sm-9">
                            <div class="quill-custom">
                              <div class="js-quill" id="js-quill-{{$problem->id}}" style="min-height: 15rem;"
                                  data-hs-quill-options='{
                                  "placeholder": "Type your message...",
                                  "readOnly":true,
                                    "modules": {
                                      "toolbar": [
                                        ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                                      ]
                                    }
                                  }'>
                                  {{$problem->reply}}
                              </div>
                            </div>
                              
                            </div>
                          </div>
                          <!-- End Form -->

                          
                          
                        </form>
                      </div>
                      
                    </div>
                    <!-- End Tab Content -->
                  </div>
                  <!-- End Body -->
                </div>
              </div>
            </div>
            <!-- End Edit user -->
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