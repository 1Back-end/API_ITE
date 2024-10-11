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
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Packages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                  </ol>
                </nav>

                <h2 class="page-header-title">Modifier Package</h2>
              </div>

          </div>
        </div>
        <!-- End Page Header -->
      <div class="row justify-content-lg-center">
        <div class="col-lg-11">
         <form method="POST" action="{{url('/admin/packages/update')}}">
         @csrf
          <!-- Title -->
          <div>
            <!-- Input Group -->
            <div class="mb-3">
            <label for="inputGroupMergeFullName" class="form-label">Nom (EN) <code>*</code></label>

            <div class="">
              <input type="text" name="name_en" class="form-control" value='{{$package->name->en}}' required>
            </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
            <label for="inputGroupMergeFullName" class="form-label">Nom (FR) <code>*</code></label>

            <div class="">
              <input type="text" name="name_fr" class="form-control" value='{{$package->name->fr}}' required>
            </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
            <label for="inputGroupMergeFullName" class="form-label">Montant <code>*</code></label>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">XAF</span>
              <input type="number" class="form-control" name="amount" value='{{$package->amount}}' required>
            </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
            <label for="inputGroupMergeFullName" class="form-label">Type <code>*</code></label>

            <div class="input-group mb-3">
              <select name="type" class="form-control">
                <option value="PRODUCT" @if($package->type == 'PRODUCT')selected @endif>PRODUIT</option>
                <option value="SERVICE" @if($package->type == 'SERVICE')selected @endif>SERVICE</option>
              </select>
            </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
                <label for="inputGroupMergeFullName" class="form-label">Courte Description (FR)</label>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="short_description_fr" value='{{$package->short_description->fr}}'>
                </div>
            </div>
            <!-- End Input Group -->

            <!-- Input Group -->
            <div class="mb-3">
                <label for="inputGroupMergeFullName" class="form-label">Courte Description (EN)</label>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="short_description_en" value='{{$package->short_description->en}}'>
                </div>
            </div>
            <!-- End Input Group -->


            <span class="divider-center mt-3 mb-3">Avantages</span>
            <div id="addEmailFieldContainer">
              <div id='advantage_container'>
               @foreach ($package->advantages as $ad)
                   <span class='divider-center my-3'>avantage</span>
                   <input type='text' name='0advantage_en_{{$ad->id}}' value='{{$ad->advantage->en}}' placeholder='avantage_en' class='form-control mt-3'>
                   <input type='text' name='0advantage_fr_{{$ad->id}}' value='{{$ad->advantage->fr}}' placeholder='avantage_fr' class='form-control mt-3'>
               @endforeach
              </div>
              <a href='javascript:;' class='js-create-field form-link' id='add-time1' onclick='adv()'>
                <i class='bi-plus-circle me-1'></i> Ajouter Avantage
              </a>
            </div>


           <!-- Input Group -->
            <div class="mb-3">
              <input type="hidden" name="id" value="{{$package->id}}">
               <button class="btn btn-success" type="submit" id="submit">Modifier</button>
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
    document.getElementById('submit').addEventListener('click',()=>{
      document.getElementById('desc').value= document.getElementsByClassName('ql-editor')[0].innerHTML;
    })

  <script>
    (function() {
      // INITIALIZATION OF SELECT
      // =======================================================
      HSCore.components.HSTomSelect.init('.js-select')
    });
  </script>
  <script>
  var max = 0;
   function adv() {
    $('#advantage_container').append("<span class='divider-center my-3'>avantage</span>");
    $('#advantage_container').append("<input type='text' name='advantage_en_"+max+"' placeholder='avantage_en' class='form-control mt-3'>");
    $('#advantage_container').append("<input type='text' name='advantage_fr_"+max+"' placeholder='avantage_fr' class='form-control mt-3'>");
    max += 1;
    //timers[
  }
  </script>
  <x-backend.initialize_toast />

</body>
</html>
