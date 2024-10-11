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
        <x-backend.page_header :user="'Admin'" title="FAQ" :type="'Create'"/>
        <!-- End page header -->
        <!-- Step Form -->
        <form class="js-step-form py-md-5" data-hs-step-form-options='{
                "progressSelector": "#addUserStepFormProgress",
                "stepsSelector": "#addUserStepFormContent",
                "endSelector": "#addUserFinishBtn",
                "isValidate": false
              }' enctype="multipart/form-data" method="POST" action="{{url('admin/faqs/store')}}">
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
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label"> Question (FR)<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control" name="question_fr" id="firstNameLabel" placeholder="Clarice" aria-label="Clarice" required>
                          {{-- <input type="text" class="form-control" name="lastName" id="lastNameLabel" placeholder="Boone" aria-label="Boone"> --}}
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label"> Question (EN)<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control" name="question_en" id="firstNameLabel" placeholder="Clarice" aria-label="Clarice" required>
                          {{-- <input type="text" class="form-control" name="lastName" id="lastNameLabel" placeholder="Boone" aria-label="Boone"> --}}
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Reponse (FR)<code>*</code></label>

                      <div class="col-sm-9">
                        <!-- Select -->
                          <div class="quill-custom">
                            <div class="js-quill" style="min-height: 15rem;"
                                data-hs-quill-options='{
                                "placeholder": "Decrire Message...",
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
                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Reponse (EN)<code>*</code></label>

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
                    
                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Activer</label>

                      <div class="col-sm-9">
                        <!-- Checkbox Switch -->
                        <div class="form-check form-switch mb-4">
                          <input type="checkbox" class="form-check-input" id="formSwitch1" value="1" name="active">
                        </div>
                        <!-- End Checkbox Switch -->
                      </div>
                    </div>
                    <!-- End Form -->
                    
                  </div>
                  <!-- End Body -->

                  <!-- Footer -->
                  <input type="hidden" name="answer_fr" id="long-desc-hidden" required>
                  <input type="hidden" name="answer_en" id="long-desc-hidden-1" required>
                  <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" id="submit" class="btn btn-primary">
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
      document.getElementById('long-desc-hidden-1').value= document.getElementsByClassName('ql-editor')[1].innerHTML;
    }) 
  </script>

  <x-backend.initialize_toast />

</body>
</html>