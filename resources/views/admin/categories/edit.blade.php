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
        <div class="page-header">
          <div class="row align-items-center">
              <div class="col-md-9 mb-2 mb-sm-0">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-no-gutter">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Admin</a></li>
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                  </ol>
                </nav>

                <h2 class="page-header-title">Modifier Categorie</h2>
              </div>

          </div>
        </div>
        <!-- End Page Header -->
      <div class="row justify-content-lg-center">
        <div class="col-lg-9">
          <!-- Title -->
          <form action="{{url('/admin/categories/update')}}" method="POST">
          @csrf
            <div class="">
                <!-- Input Group -->
                <div class="mb-3">
                <label for="inputGroupMergeFullName" class="form-label">Nom (FR)</label>

                <div class="input-group input-group-merge">
                    <input type="text" class="form-control" id="inputGroupMergeFullName" name="name_fr" value="{{$category->name->fr}}">
                </div>
                </div>
                <!-- End Input Group -->
                <!-- Input Group -->
                <div class="mb-3">
                <label for="inputGroupMergeFullName" class="form-label">Nom (EN)</label>

                <div class="input-group input-group-merge">
                    <input type="text" class="form-control" id="inputGroupMergeFullName" name="name_en" value="{{$category->name->en}}">
                </div>
                </div>
                <!-- End Input Group -->

                <!-- Input Group -->
            <div class="mb-3">
            <label for="inputGroupMergeFullName" class="form-label">Type </label>

            <div class="input-group input-group-merge">
                <select name='type' class="form-control">
                <option value="SERVICE" @if ($category->type=='SERVICE')
                    selected
                @endif>SERVICE</option>
                <option value="PRODUCT" @if ($category->type=='PRODUCT')
                    selected
                @endif>PRODUIT</option>
                <option value="PROJECT" @if ($category->type=='PROJECT')
                    selected
                @endif>PROJET</option>
                </select>
            </div>
            </div>
            <!-- End Input Group -->
                <input type="hidden" value="{{$category->id}}" name="id">
               <!-- Input Group -->
                <div class="mb-3">
                <button class="btn btn-success" type="submit">Modifier</button>
                </div>
                <!-- End Input Group -->

            </div>

          </form>
          <!-- End Title -->
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
  <script>
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
  </script>
  <x-backend.initialize_toast />


</body>
</html>
