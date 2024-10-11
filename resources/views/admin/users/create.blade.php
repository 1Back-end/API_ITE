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
    <div class="container mt-4">
        <!-- page header -->
        <x-backend.page_header :user="'Admin'" title="Users" :type="'create'"/>
        <!-- End page header -->
        <!-- Step Form -->
        <form class="js-step-form py-md-5" data-hs-step-form-options='{
                "progressSelector": "#addUserStepFormProgress",
                "stepsSelector": "#addUserStepFormContent",
                "endSelector": "#addUserFinishBtn",
                "isValidate": false
              }' action="{{url('/admin/users/store')}}" method="POST" enctype="multipart/form-data">
              @csrf
          <div class="row justify-content-lg-center">
            <div class="col-lg-8">
              <!-- Content Step Form -->
              <div id="addUserStepFormContent">
                <!-- Card -->
                <div id="addUserStepProfile" class="card card-lg active">
                  <!-- Body -->
                  <div class="card-body">
                    <!-- Form -->
                    <div class="row mb-4">
                      <label class="col-sm-3 col-form-label form-label">Photo</label>

                      <div class="col-sm-9">
                        <div class="d-flex align-items-center">
                          <!-- Avatar -->
                          <label class="avatar avatar-xl avatar-circle avatar-uploader me-5" for="avatarUploader">
                            <img id="avatarImg" class="avatar-img" src="{{asset('backend/img/160x160/img1.jpg')}}" alt="Image Description">

                            <input type="file" class="js-file-attach avatar-uploader-input" id="avatarUploader" data-hs-file-attach-options='{
                                      "textTarget": "#avatarImg",
                                      "mode": "image", "maxFileSize":10240,
                                      "targetAttr": "src",
                                      "resetTarget": ".js-file-attach-reset-img",
                                      "resetImg": "{{asset('backend/img/160x160/img1.jpg')}}",
                                      "allowTypes": [".png", ".jpeg", ".jpg"]
                                  }' name="image">

                            <span class="avatar-uploader-trigger">
                              <i class="bi-pencil avatar-uploader-icon shadow-sm"></i>
                            </span>
                          </label>
                          <!-- End Avatar -->

                          <button type="button" class="js-file-attach-reset-img btn btn-white">Suprimer</button>
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Nom Complet  <code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control" name="name" id="firstNameLabel" placeholder="Clarice" aria-label="Clarice" required>
                          {{-- <input type="text" class="form-control" name="lastName" id="lastNameLabel" placeholder="Boone" aria-label="Boone"> --}}
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email <code>*</code></label>

                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="emailLabel" placeholder="clarice@site.com" aria-label="clarice@site.com" required>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    
                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Role</label>

                      <div class="col-sm-9">
                        <!-- Select -->
                        <div class="tom-select-custom mb-4">
                          <select class="js-select form-select" name="role" required>
                            <option value="EDITOR">EDITEUR</option>
                            <option value="ADMIN">ADMIN</option>
                          </select>
                        </div>
                        <!-- End Select -->
                      </div>
                    </div>
                    <!-- End Form -->
                    
                    <!-- End Form -->
                  </div>
                  <!-- End Body -->

                  <!-- Footer -->
                  <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary">
                      Creer <i class="bi-chevron-right"></i>
                    </button>
                  </div>
                  <!-- End Footer -->
                </div>
                <!-- End Card -->
              </div>
              <!-- End Content Step Form -->

            </div>
          </div>
          <!-- End Row -->
        </form>
        <!-- End Step Form -->
    </div>
    
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


        // INITIALIZATION OF FILE ATTACH
        // =======================================================
        new HSFileAttach('.js-file-attach')

      }
    })()
  </script>
  <x-backend.initialize_toast />

</body>
</html>