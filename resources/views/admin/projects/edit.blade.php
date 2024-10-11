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
        <x-backend.page_header :user="'Admin'" title="Projects" :type="'Edit'"/>
        <!-- End page header -->
        <!-- Step Form -->
        <form class="js-step-form py-md-5" data-hs-step-form-options='{
                "progressSelector": "#addUserStepFormProgress",
                "stepsSelector": "#addUserStepFormContent",
                "endSelector": "#addUserFinishBtn",
                "isValidate": false
              }' enctype="multipart/form-data" method="POST" action="{{url('admin/projects/update')}}">
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
                            <img id="profileCoverImg" class="profile-cover-img" src="{{$project->img!=null?asset('project-images/'.$project->img):""}}" onerror="src='{{asset('backend/img/1920x400/img2.jpg')}}'" alt="Image Description">

                            <!-- Custom File Cover -->
                            <div class="profile-cover-content profile-cover-uploader p-3">
                                <input type="file" class="js-file-attach profile-cover-uploader-input" id="profileCoverUplaoder"
                                    data-hs-file-attach-options='{
                                            "textTarget": "#profileCoverImg",
                                            "mode": "image",
                                            "targetAttr": "src",
                                            "allowTypes": [".png", ".jpeg", ".jpg",".jfif",".svg"]
                                        }' name="image">
                                <label class="profile-cover-uploader-label btn btn-sm btn-white" for="profileCoverUplaoder">
                                <i class="bi-camera-fill"></i>
                                <span class="d-none d-sm-inline-block ms-1">Télécharger bannière</span>
                                </label>
                            </div>
                            <!-- End Custom File Cover -->
                            </div>
                        </div>
                        <!-- End Profile Cover -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Titre<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control" name="title" value="{{$project->title}}" aria-label="Clarice" required>
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Lien vers projet<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control"  name="url" value="{{$project->url}}"  aria-label="Clarice" required>
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->


                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Courte Description (FR)<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control"  name="short_description_fr" value="{{$project->short_description->fr}}" aria-label="Clarice" required>
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Courte Description (EN)<code>*</code></label>

                      <div class="col-sm-9">
                        <div class="input-group input-group-sm-vertical">
                          <input type="text" class="form-control"  name="short_description_en" value="{{$project->short_description->en}}" aria-label="Clarice" required>
                        </div>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Longue Description(FR)</label>

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
                              {!!$project->description->fr!!}
                          </div>
                        </div>
                        <!-- End Quill -->
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Longue Description(EN)</label>

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
                              {!!$project->description->en!!}
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
                             @foreach (categories(false) as $category )
                              <option
                                value="{{$category->id}}"
                                @foreach ($project->categories as $c)
                                  @if ($c->id == $category->id)
                                      selected
                                  @endif
                                @endforeach
                                >{{$category->name->fr}}
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
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Date</label>

                      <div class="col-sm-9">
                        <!-- Select -->
                          <div class=" mb-4">
                            <input type="date" class="form-control" name="performed_on" value="{{$project->performed_on}}" id="formSwitch1">
                          </div>
                        <!-- End Select -->
                      </div>
                    </div>
                    <!-- End Form -->
                    <!-- Form -->
                    <div class="row mb-4">
                        <label for="locationLabel" class="col-sm-3 col-form-label form-label">Client</label>

                        <div class="col-sm-9">
                          <!-- Select -->
                            <div class=" mb-4">
                              <input type="text" class="form-control" name="client" value="{{ $project->client }}" id="">
                            </div>
                          <!-- End Select -->
                        </div>
                      </div>
                      <!-- End Form -->
                    <!-- Form -->
                    <div class="row mb-4">
                        <label for="locationLabel" class="col-sm-3 col-form-label form-label">Notation (etoiles)</label>

                        <div class="col-sm-9">
                          <!-- Select -->
                            <!-- Select -->
                          <div class="tom-select-custom mb-4">
                              <select class="js-select form-select" name="rating">
                                 @for ($i=0; $i<=5; $i++ )
                                  <option
                                    value="{{$i}}" @if($i == $project->rating)selected @endif>
                                    {{$i}}
                                    </option>
                                  @endfor
                              </select>
                            </div>
                            <!-- End Select -->
                          <!-- End Select -->
                        </div>
                      </div>
                      <!-- End Form -->
                    <!-- Form -->
                    <div class="js-add-field row mb-4"
                        data-hs-add-field-options='{
                            "template": "#addEmailFieldTemplate",
                            "container": "#addEmailFieldContainer",
                            "defaultCreated": 0,
                            "limit": "{{5-sizeof($project->images)}}"
                          }'>
                      <label for="phoneLabelEg1" class="col-sm-3 col-form-label form-label">Autre Images</label>

                      <div class="col-sm-9">
                      @if(sizeof($project->images)>0)
                      {{-- @php
                      $index = 1;
                      @endphp --}}
                      @foreach ($project->images as $b)
                        {{-- @if ($index != 1) --}}
                        <!-- Profile Cover -->
                        <div class="profile-cover mb-4">
                          <div class="profile-cover-img-wrapper">
                            <img id="bn0000{{$b->id}}" class="profile-cover-img" src='{{asset('project-images/'.$b->img)}}' alt="Image Description">

                            <!-- Custom File Cover -->
                            <div class="profile-cover-content profile-cover-uploader p-3">
                              <input type="file" class="js-file-attach profile-cover-uploader-input" id="banner0000{{$b->id}}"
                                    data-hs-file-attach-options='{
                                          "textTarget": "#bn0000{{$b->id}}",
                                          "mode": "image",
                                          "targetAttr": "src",
                                          "allowTypes": [".png", ".jpeg", ".jpg",".jfif"]
                                      }' name="0img{{$b->id}}">

                              <label class="profile-cover-uploader-label btn btn-sm btn-white" for="banner0000{{$b->id}}">
                                <i class="bi-camera-fill"></i>
                                <span class="d-none d-sm-inline-block ms-1">Charger Image</span>
                              </label>
                            </div>
                            <!-- End Custom File Cover -->
                          </div>
                        </div>
                        <!-- End Profile Cover -->
                        {{-- @endif --}}
                        {{-- @php
                        $index += 1;
                        @endphp --}}

                      @endforeach
                      @endif

                        <!-- Container For Input Field -->
                        <div id="addEmailFieldContainer"></div>

                        <a href="javascript:;" class="js-create-field form-link">
                          <i class="bi-plus-circle me-1"></i> Ajouter Image
                        </a>
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Add Phone Input Field -->
                    <div id="addEmailFieldTemplate" style="display: none;">
                      <div class="input-group-add-field">
                        <input type="file" class="js-input-mask form-control" data-name="img"  placeholder="" aria-label="Enter email">
                        <a class="js-delete-field input-group-add-field-delete" href="javascript:;">
                        <i class="bi-x-lg"></i>
                      </a>
                      </div>
                    </div>
                    <!-- End Add Phone Input Field -->
                  </div>
                  <!-- End Body -->

                  <!-- Footer -->
                  <input type="hidden" name="description_fr" id="long-desc-hidden" value="{{$project->description->fr}}">
                  <input type="hidden" name="description_en" id="long-desc-hidden-2" value="{{$project->description->en}}">
                  <input type="hidden" name="id" value="{{$project->id}}" required>
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
