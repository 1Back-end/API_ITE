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
        <x-backend.page_header :user="'Admin'" title="Products" :type="'Edit'"/>
        <!-- End page header -->
        <!-- Step Form -->
        <form class="js-step-form py-md-5" data-hs-step-form-options='{
                "progressSelector": "#addUserStepFormProgress",
                "stepsSelector": "#addUserStepFormContent",
                "endSelector": "#addUserFinishBtn",
                "isValidate": false
              }' enctype="multipart/form-data" method="POST" action="{{url('admin/products/update')}}">
              @csrf
          <div class="row justify-content-lg-center">
            <div class="col-lg-8">
              <!-- Content Step Form -->
              <div id="addUserStepFormContent">
                <!-- Card -->
                <div id="addUserStepProfile" class="card card-lg active">
                  <!-- Body -->
                  <div class="card-body">
                     <!-- Profile Cover -->
                        <div class="profile-cover mb-4">
                            <div class="profile-cover-img-wrapper">
                            <img id="profileCoverImg" class="profile-cover-img" src="{{asset('company-products/'.$product->img)}}" onerror="src='{{asset('backend/img/1920x400/img2.jpg')}}'" alt="Image Description">

                            <!-- Custom File Cover -->
                            <div class="profile-cover-content profile-cover-uploader p-3">
                                <input type="file" class="js-file-attach profile-cover-uploader-input" id="profileCoverUplaoder"
                                    data-hs-file-attach-options='{
                                            "textTarget": "#profileCoverImg",
                                            "mode": "image",
                                            "targetAttr": "src",
                                            "allowTypes": [".png", ".jpeg", ".jpg",".jfif"]
                                        }' name="image">
                                <label class="profile-cover-uploader-label btn btn-sm btn-white" for="profileCoverUplaoder">
                                <i class="bi-camera-fill"></i>
                                <span class="d-none d-sm-inline-block ms-1">Télécharger Produit</span>
                                </label>
                            </div>
                            <!-- End Custom File Cover -->
                            </div>
                        </div>
                        <!-- End Profile Cover -->
                    {{-- <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Type</label>

                      <div class="col-sm-9">
                        <!-- Select -->
                        <div class="tom-select-custom mb-4">
                          <select class="js-select form-select" name="type" required>
                              <option value="PRODUCT" {{$product->type=='PRODUCT'?'selected':''}}>
                                Produit
                              </option>
                              <option value="SERVICE" {{$product->type=='SERVICE'?'selected':''}}>
                                Service
                              </option>

                          </select>
                        </div>
                        <!-- End Select -->
                      </div>
                    </div> --}}
                    <!-- End Form -->
                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Libelle/Titre (FR)<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control" name="name_fr" value='{{$product->name->fr}}'  aria-label="Clarice" required>
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->
                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Libelle/Titre (EN)<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control" name="name_en" value='{{$product->name->en}}'  aria-label="Clarice" required>
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->
                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Prix Unitaire</label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="number" class="form-control"  name="price" value="{{$product->price}}"  aria-label="Clarice">
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->


                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Courte Description (FR)<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control"  name="short_description_fr" value="{{$product->short_description->fr}}" aria-label="Clarice" required>
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Courte Description (EN)<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control"  name="short_description_en" value="{{$product->short_description->en}}" aria-label="Clarice" required>
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->


                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Longue Description (FR)</label>

                      <div class="col-sm-9">
                        <!-- Quill -->
                        <div class="quill-custom">
                          <div class="js-quill" style="min-height: 15rem;"
                              data-hs-quill-options='{
                              "placeholder": "Type your message...",
                                  "modules": {
                                  "toolbar": [
                                      ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                                  ]
                                  }
                              }'>
                              {!!$product->description->fr!!}
                          </div>
                        </div>
                        <!-- End Quill -->
                      </div>
                    </div>
                    <!-- End Form -->
                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Longue Description (EN)</label>

                      <div class="col-sm-9">
                        <!-- Quill -->
                        <div class="quill-custom">
                          <div class="js-quill" style="min-height: 15rem;"
                              data-hs-quill-options='{
                              "placeholder": "Type your message...",
                                  "modules": {
                                  "toolbar": [
                                      ["bold", "italic", "underline", "strike", "link", "image", "blockquote", "code", {"list": "bullet"}]
                                  ]
                                  }
                              }'>
                              {!!$product->description->en!!}
                          </div>
                        </div>
                        <!-- End Quill -->
                      </div>
                    </div>
                    <!-- End Form -->
                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Categories</label>

                      <div class="col-sm-9">
                        <!-- Select -->
                        <div class="tom-select-custom mb-4">
                          <select class="js-select form-select" name="categories[]" multiple>
                             @foreach (categories(false,'PRODUCT') as $category )
                              <option value="{{$category->id}}"
                                @foreach ($product->categories as $p_category)
                                @if ($p_category->id == $category->id)
                                selected
                                @endif
                                @endforeach
                               >
                                {{$category->name->fr}}
                                </option>
                              @endforeach
                          </select>
                        </div>
                        <!-- End Select -->
                      </div>
                    </div>
                    <!-- End Form -->
                    <!-- Form -->
                    <div class="row mb-4">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">URL</label>

                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-vertical">
                            <input type="text" class="form-control"  name="url" value="{{ $product->url }}"  aria-label="Clarice">
                            </div>
                        </div>
                    </div>
                    <!-- End Form -->

                  </div>
                  <!-- End Body -->

                  <!-- Footer -->
                  <input type="hidden" name="description_fr" id="long-desc-hidden" value="{{$product->description->fr}}" >
                  <input type="hidden" name="description_en" id="long-desc-hidden-2" value="{{$product->description->en}}" >
                  <input type="hidden" name="id" value="{{$product->id}}" required>
                  {{-- <input type="hidden" name="type" value="PRODUCT" required> --}}
                  <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" id="submit" class="btn btn-primary">
                      Modifier <i class="bi-chevron-right"></i>
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


        new HSAddField('.js-add-field')

      }
    })()
  </script>
    <script>
    document.getElementById('submit').addEventListener('click',()=>{
      document.getElementById('long-desc-hidden').value= document.getElementsByClassName('ql-editor')[0].innerHTML;
      document.getElementById('long-desc-hidden-2').value= document.getElementsByClassName('ql-editor')[1].innerHTML;
    })
  </script>
  <x-backend.initialize_toast />

</body>
</html>
