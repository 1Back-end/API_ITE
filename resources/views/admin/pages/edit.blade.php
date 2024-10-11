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
    <div class="container mt-4">
        <!-- page header -->
        <x-backend.page_header :user="'Admin'" title="{{$page_name}}" :type="'Edit'"/>
        <!-- End page header -->
        <!-- Step Form -->
        <form class="js-step-form py-md-5" data-hs-step-form-options='{
                "progressSelector": "#addUserStepFormProgress",
                "stepsSelector": "#addUserStepFormContent",
                "endSelector": "#addUserFinishBtn",
                "isValidate": false
              }' enctype="multipart/form-data" method="POST" action="{{url('admin/pages/update')}}">
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
                    {{-- @if ($page_name != 'home')
                    <div class="profile-cover mb-4">
                      <div class="profile-cover-img-wrapper">
                        <img id="profileCoverImg" class="profile-cover-img" @if(sizeof($page->banners)>0) src='{{asset('pages/images/'.$page->banners[0]->banner)}}' @else src='{{asset('backend/img/1920x400/img2.jpg')}}'  @endif  alt="Image Description">

                        <!-- Custom File Cover -->
                        <div class="profile-cover-content profile-cover-uploader p-3">
                          <input type="file" class="js-file-attach profile-cover-uploader-input" id="profileCoverUplaoder"
                                data-hs-file-attach-options='{
                                      "textTarget": "#profileCoverImg",
                                      "mode": "image",
                                      "targetAttr": "src",
                                      "allowTypes": [".png", ".jpeg", ".jpg",".jfif"]
                                  }' name="banner">
                          <label class="profile-cover-uploader-label btn btn-sm btn-white" for="profileCoverUplaoder">
                            <i class="bi-camera-fill"></i>
                            <span class="d-none d-sm-inline-block ms-1">Charger Banniere</span>
                          </label>
                        </div>
                        <!-- End Custom File Cover -->
                      </div>
                    </div>
                    <!-- End Profile Cover -->
                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Courte Description<code>*</code></label>

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
                                {!!$page->short_description!!}
                            </div>
                          </div>
                        <!-- End Select -->
                      </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Longue Description<code>*</code></label>

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
                                {!!$page->description!!}
                            </div>
                          </div>
                        <!-- End Select -->
                      </div>
                    </div>
                    <!-- End Form -->
                    @endif --}}
                    {{-- home only --}}
                    {{-- @if ($page_name == 'home')  --}}
                      <!-- Profile Cover -->
                      <div class="profile-cover mb-4">
                        <div class="profile-cover-img-wrapper">
                          <img id="main{{$page->id}}" class="profile-cover-img" src='{{asset('pages/banners/'.$page->banner)}}' onerror="src='{{asset('backend/img/1920x400/img2.jpg')}}' "alt="Image Description">

                          <!-- Custom File Cover -->
                          <div class="profile-cover-content profile-cover-uploader p-3">
                            <input type="file" class="js-file-attach profile-cover-uploader-input" id="maiin{{$page->id}}"
                                  data-hs-file-attach-options='{
                                        "textTarget": "#main{{$page->id}}",
                                        "mode": "image",
                                        "targetAttr": "src",
                                        "allowTypes": [".png", ".jpeg", ".jpg",".jfif"]
                                    }' name="banner">

                            <label class="profile-cover-uploader-label btn btn-sm btn-white" for="maiin{{$page->id}}">
                              <i class="bi-camera-fill"></i>
                              <span class="d-none d-sm-inline-block ms-1">Charger Banniere</span>
                            </label>
                          </div>
                          <!-- End Custom File Cover -->
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="locationLabel" class="col-sm-3 col-form-label form-label">Titre (FR)<code>*</code></label>

                        <div class="col-sm-9 ">
                          <input type="text" class="form-control" value="{{$page->title == null?'':$page->title->fr}}" name="title_fr" placeholder="Titre" aria-label="First name">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="locationLabel" class="col-sm-3 col-form-label form-label">Titre (EN)<code>*</code></label>

                        <div class="col-sm-9 ">
                          <input type="text" class="form-control" value="{{$page->title == null?'':$page->title->en}}" name="title_en" placeholder="Titre" aria-label="First name">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="locationLabel" class="col-sm-3 col-form-label form-label">Sous Titre (FR)</label>

                        <div class="col-sm-9 ">
                          <input type="text" class="form-control" value="{{$page->sub_title==null?'':$page->sub_title->fr}}" name="sub_title_fr" placeholder="sous titre" aria-label="First name">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="locationLabel" class="col-sm-3 col-form-label form-label">Sous Titre (EN)</label>

                        <div class="col-sm-9 ">
                          <input type="text" class="form-control" value="{{$page->sub_title==null?'':$page->sub_title->en}}" name="sub_title_en" placeholder="sous titre" aria-label="First name">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="locationLabel" class="col-sm-3 col-form-label form-label">Courte Description (FR)</label>

                        <div class="col-sm-9 ">
                          <input type="text" class="form-control" value="{{$page->short_description==null?'':$page->short_description->fr}}" name="short_description_fr" placeholder="courte description" aria-label="First name">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="locationLabel" class="col-sm-3 col-form-label form-label">Courte Description (EN)</label>

                        <div class="col-sm-9 ">
                          <input type="text" class="form-control" value="{{$page->short_description==null?'':$page->short_description->en}}" name="short_description_en" placeholder="courte description" aria-label="First name">
                        </div>
                      </div>

                      <!-- Form -->
                    <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Description (FR)</label>

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
                                @if($page->description!= null)
                                {!!$page->description->fr!!}
                                @endif
                            </div>
                          </div>
                        <!-- End Select -->
                      </div>
                    </div>
                    <!-- End Form -->

                      <!-- Form -->
                    <div class="row mb-4">
                      <label for="locationLabel" class="col-sm-3 col-form-label form-label">Description (EN)</label>

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
                                @if($page->description!= null)
                                {!!$page->description->en!!}
                                @endif
                            </div>
                          </div>
                        <!-- End Select -->
                      </div>
                    </div>
                    <!-- End Form -->
                    @if ($page_name == 'home')
                    @if(sizeof($page->banners)>0)
                    @foreach ($page->banners as $b)
                      <!-- Profile Cover -->
                      <div class="profile-cover mb-4">
                        <div class="profile-cover-img-wrapper">
                          <img id="bn0000{{$b->id}}" class="profile-cover-img" src='{{asset('pages/images/'.$b->banner)}}' alt="Image Description">

                          <!-- Custom File Cover -->
                          <div class="profile-cover-content profile-cover-uploader p-3">
                            <input type="file" class="js-file-attach profile-cover-uploader-input" id="banner0000{{$b->id}}"
                                  data-hs-file-attach-options='{
                                        "textTarget": "#bn0000{{$b->id}}",
                                        "mode": "image", "maxFileSize":10240,
                                        "targetAttr": "src",
                                        "allowTypes": [".png", ".jpeg", ".jpg",".jfif"]
                                    }' name="0banner{{$b->id}}">

                            <label class="profile-cover-uploader-label btn btn-sm btn-white" for="banner0000{{$b->id}}">
                              <i class="bi-camera-fill"></i>
                              <span class="d-none d-sm-inline-block ms-1">Charger Banniere</span>
                            </label>
                          </div>
                          <!-- End Custom File Cover -->
                        </div>
                      </div>
                      <!-- End Profile Cover -->
                      <div class="mb-3">
                        <div class="input-group input-group-md-vertical">
                          <input type="text" class="form-control" value="{{$b->title}}" name="banner_home_title_{{$b->id}}" placeholder="Titre" aria-label="First name">
                          <input type="text" class="form-control" value="{{$b->tag}}" name="banner_home_tag_{{$b->id}}" placeholder="Libelle">
                        </div>
                      </div>

                    @endforeach
                    @endif
                    @for ($i = 1; $i < (10-sizeof($page->banners)); $i++)
                      <!-- Profile Cover -->
                      <div class="profile-cover mb-4">
                        <div class="profile-cover-img-wrapper">
                          <img id="bn{{$i}}" class="profile-cover-img"  src='{{asset('backend/img/1920x400/img2.jpg')}}' alt="Image Description">

                          <!-- Custom File Cover -->
                          <div class="profile-cover-content profile-cover-uploader p-3">
                            <input type="file" class="js-file-attach profile-cover-uploader-input" id="banner{{$i}}"
                                  data-hs-file-attach-options='{
                                        "textTarget": "#bn{{$i}}",
                                        "mode": "image", "maxFileSize":10240,
                                        "targetAttr": "src",
                                        "allowTypes": [".png", ".jpeg", ".jpg",".jfif"]
                                    }' name="banner{{$i}}">

                            <label class="profile-cover-uploader-label btn btn-sm btn-white" for="banner{{$i}}">
                              <i class="bi-camera-fill"></i>
                              <span class="d-none d-sm-inline-block ms-1">Charger Banniere</span>
                            </label>
                          </div>
                          <!-- End Custom File Cover -->
                        </div>
                      </div>
                      <!-- End Profile Cover -->
                      <div class="mb-3">
                        <div class="input-group input-group-md-vertical">
                          <input type="text" class="form-control" name="home_title_{{$i}}" placeholder="Titre" aria-label="First name">
                          <input type="text" class="form-control" name="home_tag_{{$i}}" placeholder="Libelle">
                        </div>
                      </div>

                    @endfor
                    @endif

                  </div>
                  <!-- End Body -->

                  <!-- Footer -->
                  <input type="hidden" name="description_fr" id="desc-fr">
                  <input type="hidden" name="description_en" id="desc-en">
                  {{-- <input type="hidden" name="description" id="desc-fr"> --}}
                  <input type="hidden" name="page" value="{{$page_name}}">
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

        //INITIALIZATION OF DATEPICKER
        HSCore.components.HSDaterangepicker.init('.js-daterangepicker-times', {
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour')
        })


        // INITIALIZATION OF FLATPICKR
      // =======================================================
      HSCore.components.HSFlatpickr.init('.js-flatpickr')



      }
    })()
  </script>
  <script>
    document.getElementById('submit').addEventListener('click',()=>{
      document.getElementById('desc-fr').value= document.getElementsByClassName('ql-editor')[0].innerHTML;
      document.getElementById('desc-en').value= document.getElementsByClassName('ql-editor')[1].innerHTML;
    })
  </script>
  <x-backend.initialize_toast />

</body>
</html>
