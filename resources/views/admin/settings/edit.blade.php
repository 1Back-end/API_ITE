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
     <x-backend.alert />

    <!-- Content -->
    <div class="content container">
      <!-- Page Header -->
        <div class="page-header">
        <x-backend.page_header :user="'Admin'" title="Settings" type="Edit"/>
        <!-- End Page Header -->
      <div class="row justify-content-lg-center">
        <div class="col-lg-11">
         <form method="POST" action="{{url('/admin/settings/update')}}" enctype="multipart/form-data">
         @csrf
          <!-- Title -->
          <div>

            <!-- Input Group -->
            <div class="row mb-3 mt-5">
              <div class="col-sm-3 d-flex align-items-center">
              <label for="inputGroupMergeFullName" class="form-label">Logo de l'entreprise <code>*</code></label>
              </div>
              <div class="col-sm-9 d-flex">
                <!-- Avatar -->
                <label class="avatar avatar-xxl avatar-circle avatar-uploader" for="editAvatarUploaderModal">
                  <img id="editAvatarImgModal" class="avatar-img" onerror="src='{{asset('backend/img/160x160/img1.jpg')}}'" src="{{asset('config/logos/'.$setting->logo)}}" alt="Image Description">

                  <input type="file" class="js-file-attach avatar-uploader-input" id="editAvatarUploaderModal"
                        data-hs-file-attach-options='{
                              "textTarget": "#editAvatarImgModal",
                              "mode": "image",
                              "targetAttr": "src",
                              "allowTypes": [".png", ".jpeg", ".jpg",".jfif",".svg"]
                          }' name="logo">

                  <span class="avatar-uploader-trigger">
                    <i class="bi-pencil-fill avatar-uploader-icon shadow-sm"></i>
                  </span>
                </label>
                <!-- End Avatar -->
              </div>
            </div>
            <!-- End Input Group -->

             <!-- Input Group -->
            <div class="mb-3">
              <label for="inputGroupMergeFullName" class="form-label">Nom de l'entreprise <code>*</code></label>

              <div class="">
                <input type="text" name="company_name" class="form-control" value="{{$setting->company_name}}" required>
              </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
              <label for="inputGroupMergeFullName" class="form-label">Email de l'entreprise <code>*</code></label>

              <div class="">
                <input type="email" name="company_email" class="form-control" value="{{$setting->company_email}}" required>
              </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
              <label for="inputGroupMergeFullName" class="form-label">Slogan <code>*</code></label>

              <div class="">
                <input type="text" name="company_slogan" class="form-control" value="{{$setting->company_slogan}}" required>
              </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
              <label for="inputGroupMergeFullName" class="form-label">City <code>*</code></label>
                <div class="tom-select-custom">
                  <select class="js-select form-select" autocomplete="off"
                        data-hs-tom-select-options='{
                          "placeholder": "Select a city...",
                        }' name="city_id">
                        @foreach (cities() as $city )
                         <option value="{{$city->id}}" {{$city->id == $setting->city_id?'selected':''}}>{{$city->name}}</option>
                        @endforeach
                  </select>
                </div>
            </div>
            <!-- End Input Group -->
            <!-- Input Group -->
            <div class="mb-3">
              <label for="inputGroupMergeFullName" class="form-label">Addresse <code>*</code></label>

              <div class="">
                <input type="text" name="location" class="form-control" value="{{$setting->location}}" required>
              </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
                <label for="inputGroupMergeFullName" class="form-label">Annee de creation de l'entreprise </label>

                <div class="">
                  <input type="number" name="company_creation_date" value="{{ $setting->company_creation_date }}" class="form-control">
                </div>
              </div>
              <!-- End Input Group -->
              <span class="divider-center mt-3 mb-3">Statistiques</span>
              <!-- Input Group -->
              <div class="mb-3">
                <div class="row">
                  <div class="col-md-4">
                      <div class=" input-group ">
                          <span class="input-group-text" id="basic-addon3"># Projets</span>
                          <input type="number" class="form-control" name="projects" value="{{ $setting->statistics->projects }}">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class=" input-group ">
                          <span class="input-group-text" id="basic-addon3"># Partenaires</span>
                          <input type="number" class="form-control" name="partners" value="{{ $setting->statistics->partners }}">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class=" input-group ">
                          <span class="input-group-text" id="basic-addon3"># Clients Satisfaits</span>
                          <input type="number" class="form-control" name="clients" value="{{ $setting->statistics->clients }}">
                      </div>
                  </div>
                </div>
              </div>
              <!-- End Input Group -->

            <!-- Input Group -->
            {{-- <div class="mb-3">
            <label for="inputGroupMergeFullName" class="form-label">Heurs D'ouverture <code>*</code></label>

            <div class="tom-select-custom">
                  <select class="js-select form-select" autocomplete="off"
                        data-hs-tom-select-options='{
                          "placeholder": "Select a Day...",
                        }' name="city_id">
                         <option value="lundi" {{$city->id == $setting->city_id?'selected':''}}>{{$city->name}}</option>
                         <option value="mardi" {{$city->id == $setting->city_id?'selected':''}}>{{$city->name}}</option>
                         <option value="mercredi" {{$city->id == $setting->city_id?'selected':''}}>{{$city->name}}</option>
                         <option value="jeudi" {{$city->id == $setting->city_id?'selected':''}}>{{$city->name}}</option>
                         <option value="vendredi" {{$city->id == $setting->city_id?'selected':''}}>{{$city->name}}</option>
                         <option value="samedi" {{$city->id == $setting->city_id?'selected':''}}>{{$city->name}}</option>
                         <option value="dimanche" {{$city->id == $setting->city_id?'selected':''}}>{{$city->name}}</option>
                  </select>
                </div>
            </div> --}}
            <!-- End Input Group -->

            <!-- End Input Group -->
            <span class="divider-center mt-3 mb-3">Contact</span>
            <!-- Input Group -->
            <div class="row mb-3">
              <div class="col-md-6">
                <div class=" input-group ">
                  <span class="input-group-text" id="basic-addon3">+237</span>
                  <input type="tel" class="form-control" name="phone" value="{{$setting->contact->phone}}" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class=" input-group ">
                  <span class="input-group-text" id="basic-addon3">https://www.facebook.com/</span>
                  <input type="text" class="form-control" name="facebook" value="{{$setting->contact->facebook}}">
                </div>
              </div>

              <div class="col-md-6 mt-3">
                <div class=" input-group ">
                  <span class="input-group-text" id="basic-addon3">https://instagram.com/</span>
                  <input type="text" class="form-control" name="instagram" value="{{$setting->contact->instagram}}">
                </div>
              </div>

              <div class="col-md-6 mt-3">
                <div class=" input-group ">
                  <span class="input-group-text" id="basic-addon3">https://twitter.com/</span>
                  <input type="text" class="form-control" name="twitter" value="{{$setting->contact->twitter}}">
                </div>
              </div>

              <div class="col-md-6 mt-3">
                <div class=" input-group ">
                  <span class="input-group-text" id="basic-addon3">https://pinterest.com/</span>
                  <input type="text" class="form-control" name="pinterest" value="{{$setting->contact->pinterest}}">
                </div>
              </div>

              <div class="col-md-6 mt-3">
                <div class=" input-group ">
                  <span class="input-group-text" id="basic-addon3">https://youtube.com/</span>
                  <input type="text" class="form-control" name="youtube" value="{{$setting->contact->youtube}}">
                </div>
              </div>

               <div class="col-md-6 mt-3">
                <div class=" input-group ">
                  <span class="input-group-text" id="basic-addon3">https://wa.me/237</span>
                  <input type="text" class="form-control" name="whatsapp" value="{{$setting->contact->whatsapp}}">
                </div>
              </div>

            <div class="col-md-6 mt-3">
                <div class=" input-group ">
                  <span class="input-group-text" id="basic-addon3">https://linkedin.com/</span>
                  <input type="text" class="form-control" name="linkedin" value="{{$setting->contact->linkedin}}">
                </div>
              </div>


            </div>
            <!-- End Input Group -->


            <!-- End activities banner-->

            <input name="id" value="{{$setting->id}}" type="hidden">
           <!-- Input Group -->
            <div class="mb-3">
               <button class="btn btn-success" type="submit">Edit</button>
            </div>
            <!-- End Input Group -->

          </div>
          <!-- End Title -->
         </form>
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
  {{-- <script>
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
    })()
  </script> --}}

 <script>
     $(document).on('ready', function () {
      // INITIALIZATION OF FILE ATTACH
    // =======================================================
    new HSFileAttach('.js-file-attach')

  });
  </script>
  <x-backend.initialize_toast />

  <script>
    (function() {
      // INITIALIZATION OF SELECT
      // =======================================================
      HSCore.components.HSTomSelect.init('.js-select')
    });
  </script>

</body>
</html>
