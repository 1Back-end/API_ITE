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
    <div class="container mt-4">
        <!-- page header -->
        <x-backend.page_header :user="'User'" title="Problems" :type="'create'"/>
        <!-- End page header -->
        <!-- Step Form -->
        <form class="js-step-form py-md-5" data-hs-step-form-options='{
                "progressSelector": "#addUserStepFormProgress",
                "stepsSelector": "#addUserStepFormContent",
                "endSelector": "#addUserFinishBtn",
                "isValidate": false
              }' enctype="multipart/form-data" method="POST" action="{{url('user/problems/store')}}">
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
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Type</label>

                      <div class="col-sm-9">
                        <!-- Select -->
                        <div class="tom-select-custom mb-4">
                          <select class="js-select form-select" name="type">
                              <option value="PROBLEM">PROBLEME</option>
                              <option value="SUGGESTION">SUGGESTION</option>
                              <option value="REQUEST">REQUETE</option>
                          </select>
                        </div>
                        <!-- End Select -->
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label"> Titre<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control" name="title" id="firstNameLabel" placeholder="Clarice" aria-label="Clarice" required>
                          {{-- <input type="text" class="form-control" name="lastName" id="lastNameLabel" placeholder="Boone" aria-label="Boone"> --}}
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Description<code>*</code></label>

                      <div class="col-sm-9">
                        <!-- Select -->
                          <div class="quill-custom">
                            <div class="js-quill" style="min-height: 15rem;"
                                data-hs-quill-options='{
                                "placeholder": "Describe Message...",
                                  "modules": {
                                    "toolbar": [
                                      ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                                    ]
                                  }
                                }'>
                            </div>
                          </div>
                        <!-- End Select -->
                      </div>
                    </div>
                    <!-- End Form -->
                    
                    <!-- Profile Cover -->
                      <div class="profile-cover">
                        <div class="profile-cover-img-wrapper">
                          <img id="profileCoverImg" class="profile-cover-img" src="{{asset('backend/img/1920x400/img2.jpg')}}" alt="Image Description">

                          <!-- Custom File Cover -->
                          <div class="profile-cover-content profile-cover-uploader p-3">
                            <input type="file" class="js-file-attach profile-cover-uploader-input" id="profileCoverUplaoder"
                                  data-hs-file-attach-options='{
                                        "textTarget": "#profileCoverImg",
                                        "mode": "image", "maxFileSize":10240,
                                        "targetAttr": "src",
                                        "allowTypes": [".png", ".jpeg", ".jpg",".jfif"]
                                    }' name="screenshot">
                            <label class="profile-cover-uploader-label btn btn-sm btn-white" for="profileCoverUplaoder">
                              <i class="bi-camera-fill"></i>
                              <span class="d-none d-sm-inline-block ms-1">Charger Screenshot</span>
                            </label>
                          </div>
                          <!-- End Custom File Cover -->
                        </div>
                      </div>
                      <!-- End Profile Cover -->

                  </div>
                  <!-- End Body -->

                  <!-- Footer -->
                  <input type="hidden" name="description" id="long-desc-hidden" required>
                  <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" id="submit" class="btn btn-primary">
                      Poster <i class="bi-chevron-right"></i>
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


        // INITIALIZATION OF INPUT MASK
        // =======================================================
        //HSCore.components.HSMask.init('.js-input-mask')

        // INITIALIZATION OF FILE ATTACH
        // =======================================================
        new HSFileAttach('.js-file-attach')
        // INITIALIZATION OF QUILLJS EDITOR
        // =======================================================
        HSCore.components.HSQuill.init('.js-quill')
        

      }
    })()
  </script>
  <script>
    document.getElementById('submit').addEventListener('click',()=>{
      document.getElementById('long-desc-hidden').value= document.getElementsByClassName('ql-editor')[0].innerHTML;
    }) 
  </script>

  <x-backend.initialize_toast />

</body>
</html>