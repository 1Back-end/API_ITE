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

    <!-- Content -->
    <div class="content container">
      <!-- Page Header -->
      <x-backend.page_header :user="'Admin'" title="reviews" type="Edit"/>
      <!-- End Page Header -->
      <div class="row justify-content-lg-center">
        <div class="col-lg-11">
         <form method="POST" action="{{url('/admin/reviews/store')}}" enctype="multipart/form-data">
         @csrf
          <!-- Title -->
          <div>
            <!-- Input Group -->
            {{-- <div class="mb-3">
              <label for="inputGroupMergeFullName" class="form-label">Service<code>*</code></label>

              <div class="">
                <select name="product_id" class="form-control">
                  @foreach (services() as $service)
                  <option value="{{$service->id}}">{{$service->img_tag}}</option>
                  @endforeach
                </select>
              </div>
            </div> --}}
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
              <label for="inputGroupMergeFullName" class="form-label">Type<code>*</code></label>

              <div class="">
                <select name="type" class="form-control">
                    <option value="GENERAL">GENERALE</option>
                    <option value="PRODUCT">PRODUIT</option>
                    <option value="SERVICE">SERVICE</option>
                </select>
              </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
              <label for="inputGroupMergeFullName" class="form-label">Nom du Critique<code>*</code></label>

              <div class="">
                <input type="text" name="reviewer_name" class="form-control" required>
              </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
              <label for="inputGroupMergeFullName" class="form-label">Commentaire<code>*</code></label>

              <div class="">
                <input type="text" name="review" class="form-control" required>
              </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
              <label for="inputGroupMergeFullName"  class="form-label">Logo</label>

              <div class="row">
                <div class="col">
                  <input type="file" class="form-control" placeholder="First name" name="logo">
                </div>

              </div>
            </div>
            <!-- End Input Group -->
            {{-- <!-- Input Group -->
            <div class="mb-3">
              <label for="inputGroupMergeFullName"  class="form-label">Image de Couverture</label>

              <div class="">
                <div class="profile-cover mb-4">
                    <div class="profile-cover-img-wrapper">
                      <img id="img" class="profile-cover-img" src='{{asset('backend/img/1920x400/img2.jpg')}}' alt="Image Description">

                      <!-- Custom File Cover -->
                      <div class="profile-cover-content profile-cover-uploader p-3">
                        <input type="file" class="js-file-attach profile-cover-uploader-input" id="imgoo"
                              data-hs-file-attach-options='{
                                    "textTarget": "#img",
                                    "mode": "image",
                                    "targetAttr": "src",
                                    "allowTypes": [".png", ".jpeg", ".jpg",".jfif"]
                                }' name="img">

                        <label class="profile-cover-uploader-label btn btn-sm btn-white" for="imgoo">
                          <i class="bi-camera-fill"></i>
                          <span class="d-none d-sm-inline-block ms-1">Charger Banniere</span>
                        </label>
                      </div>
                      <!-- End Custom File Cover -->
                    </div>
                  </div>
              </div>
            </div>
            <!-- End Input Group --> --}}
           <!-- Input Group -->
            <div class="mb-5">
               <button class="btn btn-success" type="submit">Enregistrer</button>
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

</body>
</html>
