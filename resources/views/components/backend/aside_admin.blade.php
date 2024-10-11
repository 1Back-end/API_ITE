<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
      <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
          <!-- Logo -->
          <a class="navbar-brand" href="/admin" aria-label="Front">
            <img class="navbar-brand-logo" src="{{active_setting() != null?asset('config/logos/'.active_setting()->logo):''}}" onerror="src='{{asset('backend/svg/logos/logo.svg')}}'" alt="Logo" data-hs-theme-appearance="default" height="60" width="200">
            <img class="navbar-brand-logo" src="{{active_setting() != null?asset('config/logos/'.active_setting()->logo):''}}" onerror="src='{{asset('backend/svg/logos-light/logo.svg')}}'" alt="Logo" data-hs-theme-appearance="dark" height="60" width="200">
            <img class="navbar-brand-logo-mini" src="{{active_setting() != null?asset('config/logos/'.active_setting()->logo):''}}" onerror="src='{{asset('backend/svg/logos/logo-short.svg')}}'" alt="Logo" data-hs-theme-appearance="default" height="60" width="200">
            <img class="navbar-brand-logo-mini" src="{{active_setting() != null?asset('config/logos/'.active_setting()->logo):''}}" onerror="src='{{asset('backend/svg/logos-light/logo-short.svg')}}'" alt="Logo" data-hs-theme-appearance="dark" height="60" width="200">
          </a>

          <!-- End Logo -->

          <!-- Navbar Vertical Toggle -->
          <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
            <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
            <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
          </button>

          <!-- End Navbar Vertical Toggle -->

           @php
              $segment1 = request()->segment(2);
              $segment2 = request()->segment(3);
          @endphp

          <!-- Content -->
          <div class="navbar-vertical-content">
            <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link dropdown-toggle {{($segment2=='' && $segment1=='admin')?'active':''}}" href="#navbarVerticalMenuDashboards" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuDashboards" aria-expanded="true" aria-controls="navbarVerticalMenuDashboards">
                  <i class="bi-house-door nav-icon"></i>
                  <span class="nav-link-title">Tableaux de bord</span>
                </a>

                <div id="navbarVerticalMenuDashboards" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenu">
                  <a class="nav-link {{$segment2==''?'active':''}}" href="{{url('/admin')}}">Default</a>
                  {{-- <a class="nav-link " href="../dashboard-alternative.html">Alternative</a> --}}
                </div>
              </div>
              <!-- End Collapse -->

              <span class="dropdown-header mt-4">Application</span>
              <small class="bi-three-dots nav-subtitle-replacer"></small>

              <!-- Collapse -->
              <div class="navbar-nav nav-compact">

              </div>
              <div id="navbarVerticalMenuPagesMenu">

                <!-- Collapse -->
                <div class="nav-item">
                    <a class="nav-link dropdown-toggle {{$segment1=='projects'?'active':''}}" href="#navProdus" role="button" data-bs-toggle="collapse" data-bs-target="#navProjects" aria-expanded="false" aria-controls="navProjects">
                      <i class="bi-briefcase nav-icon"></i>
                      <span class="nav-link-title">Projets</span>
                    </a>

                    <div id="navProjects" class="nav-collapse collapse"  data-bs-parent="#navbarVerticalMenuPagesMenu">
                      <a class="nav-link {{$segment1=='projects' && $segment2==''?'active':''}}" href="{{url('/admin/projects')}}">Aperçu</a>
                      <a class="nav-link {{$segment1=='projects' && $segment2=='create'?'active':''}}" href="{{url('/admin/projects/create')}}">Nouveau Projet</a>
                    </div>
                  </div>
                  <!-- End Collapse -->

                <!-- Collapse -->
                <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='products'?'active':''}}" href="#navProdus" role="button" data-bs-toggle="collapse" data-bs-target="#navProdus" aria-expanded="false" aria-controls="navProdus">
                    <i class="bi-controller nav-icon"></i>
                    <span class="nav-link-title">Produits</span>
                  </a>

                  <div id="navProdus" class="nav-collapse collapse"  data-bs-parent="#navbarVerticalMenuPagesMenu">
                    <a class="nav-link {{$segment1=='products' && $segment2==''?'active':''}}" href="{{url('/admin/products')}}">Aperçu</a>
                    <a class="nav-link {{$segment1=='products' && $segment2=='create'?'active':''}}" href="{{url('/admin/products/create')}}">Nouveau Produit</a>
                  </div>
                </div>
                <!-- End Collapse -->

              <!-- Collapse -->
                <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='services'?'active':''}}" href="#navServ" role="button" data-bs-toggle="collapse" data-bs-target="#navServ" aria-expanded="false" aria-controls="navServ">
                    <i class="bi-cone-striped nav-icon"></i>
                    <span class="nav-link-title">Services</span>
                  </a>

                  <div id="navServ" class="nav-collapse collapse"  data-bs-parent="#navbarVerticalMenuPagesMenu">
                    <a class="nav-link {{$segment1=='services' && $segment2==''?'active':''}}" href="{{url('/admin/services')}}">Aperçu</a>
                    <a class="nav-link {{$segment1=='services' && $segment2=='create'?'active':''}}" href="{{url('/admin/services/create')}}">Nouveau Service</a>
                  </div>
                </div>
                <!-- End Collapse -->

              <!-- Collapse -->
                <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='pages'?'active':''}}" href="#navGalleries" role="button" data-bs-toggle="collapse" data-bs-target="#navGalleries" aria-expanded="false" aria-controls="navGalleries">
                    <i class="bi-card-image nav-icon"></i>
                    <span class="nav-link-title">CMS</span>
                  </a>

                  <div id="navGalleries" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                    <a class="nav-link {{$segment1=='pages' && $segment2=='home'?'active':''}}" href="{{url('/admin/pages/home')}}">Acceuil</a>
                    <a class="nav-link {{$segment1=='pages' && $segment2=='about'?'active':''}}" href="{{url('/admin/pages/about')}}">Apropos</a>
                    <a class="nav-link {{$segment1=='pages' && $segment2=='service'?'active':''}}" href="{{url('/admin/pages/services')}}">Services</a>
                    <a class="nav-link {{$segment1=='pages' && $segment2=='products'?'active':''}}" href="{{url('/admin/pages/products')}}">Produits</a>
                    <a class="nav-link {{$segment1=='pages' && $segment2=='projects'?'active':''}}" href="{{url('/admin/pages/projects')}}">Projets</a>
                    <a class="nav-link {{$segment1=='pages' && $segment2=='contact'?'active':''}}" href="{{url('/admin/pages/contact')}}">Contact</a>
                    <a class="nav-link {{$segment1=='pages' && $segment2=='pricing'?'active':''}}" href="{{url('/admin/pages/pricing')}}">Offres</a>
                    <a class="nav-link {{$segment1=='pages' && $segment2=='faq'?'active':''}}" href="{{url('/admin/pages/faq')}}">FAQ</a>
                    <a class="nav-link {{$segment1=='pages' && $segment2=='terms'?'active':''}}" href="{{url('/admin/pages/terms')}}">Termes & conditions</a>
                    <a class="nav-link {{$segment1=='pages' && $segment2=='privacy-policy'?'active':''}}" href="{{url('/admin/pages/privacy-policy')}}">Politique de Conf.</a>
                  </div>
                </div>
                <!-- End Collapse -->

              </div>
              <!-- End Collapse -->

              {{-- <span class="dropdown-header mt-4">Management</span>
              <small class="bi-three-dots nav-subtitle-replacer"></small> --}}
                <!-- Collapse -->
                 <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='profile'?'active':''}}" href="#navProfile" role="button" data-bs-toggle="collapse" data-bs-target="#navProfile" aria-expanded="false" aria-controls="navProfile">
                    <i class="bi-person nav-icon"></i>
                    <span class="nav-link-title"> Utilisateurs </span>
                  </a>

                  <div id="navProfile" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                    @hasanyrole('SUPERADMIN|ADMIN')
                    <a class="nav-link {{$segment1=='users'?'active':''}}" href="{{url('/admin/users')}}">Aperçu</a>
                    @endhasanyrole
                    <a class="nav-link {{$segment1=='profile'?'active':''}}" href="#">Mon Profile</a>
                  </div>
                </div>
                <!-- End Collapse -->

              <!-- Collapse -->
                 <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='reviews'?'active':''}}" href="#reviews" role="button" data-bs-toggle="collapse" data-bs-target="#reviews" aria-expanded="false" aria-controls="reviews">
                    <i class="bi-star nav-icon"></i>
                    <span class="nav-link-title"> Revus/Commentaires </span>
                  </a>

                  <div id="reviews" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                    <a class="nav-link {{$segment1=='reviews' && $segment2=='' ?'active':''}}" href="{{url('/admin/reviews')}}">Aperçu</a>
                    <a class="nav-link {{$segment1=='reviews' && $segment2=='create' ?'active':''}}" href="{{url('/admin/reviews/create')}}">Ajouter Commentaire</a>
                  </div>
                </div>
                <!-- End Collapse -->
                <!-- Collapse -->
                <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='packages'?'active':''}}" href="#navAds" role="button" data-bs-toggle="collapse" data-bs-target="#navAds" aria-expanded="false" aria-controls="navAds">
                    <i class="bi-currency-exchange nav-icon"></i>
                    <span class="nav-link-title">Forfaits</span>
                  </a>

                  <div id="navAds" class="nav-collapse collapse"  data-bs-parent="#navbarVerticalMenuPagesMenu">
                    <a class="nav-link {{$segment1=='packages' && $segment2==''?'active':''}}" href="{{url('/admin/packages')}}">Aperçu</a>
                    <a class="nav-link {{$segment1=='packages' && $segment2=='create'?'active':''}}" href="{{url('/admin/packages/create')}}">Nouveau Forfait</a>
                  </div>
                </div>
                <!-- End Collapse -->
                <!-- Collapse -->
                <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='jobs'?'active':''}}" href="#navJobs" role="button" data-bs-toggle="collapse" data-bs-target="#navJobs" aria-expanded="false" aria-controls="navJobs">
                    <i class="bi-currency-exchange nav-icon"></i>
                    <span class="nav-link-title">Job</span>
                  </a>

                  <div id="navJobs" class="nav-collapse collapse"  data-bs-parent="#navbarVerticalMenuPagesMenu">
                    <a class="nav-link {{$segment1=='jobs' && $segment2==''?'active':''}}" href="{{url('/admin/jobs')}}">Aperçu </a>
                    <a class="nav-link {{$segment1=='jobs' && $segment2=='create'?'active':''}}" href="{{url('/admin/jobs/create')}}">Nouveau Job</a>
                  </div>
                </div>
                <!-- End Collapse -->

              <span class="dropdown-header mt-4">Parametres</span>
              <small class="bi-three-dots nav-subtitle-replacer"></small>

                <!-- Collapse -->
                <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='categories'?'active':''}}" href="#navCategories" role="button" data-bs-toggle="collapse" data-bs-target="#navCategories" aria-expanded="false" aria-controls="navCategories">
                    <i class="bi-bookmark-check nav-icon"></i>
                    <span class="nav-link-title">Categories</span>
                  </a>

                  <div id="navCategories" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                    <a class="nav-link {{$segment1=='categories' && $segment2==''?'active':''}}" href="{{url('/admin/categories')}}">Aperçu</a>
                    <a class="nav-link {{$segment1=='categories' && $segment2=='create'?'active':''}}" href="{{url('/admin/categories/create')}}">Ajouter Categorie</a>
                  </div>
                </div>
                <!-- End Collapse -->
                @hasanyrole('SUPERADMIN|ADMIN')
                <!-- Collapse -->
                <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='settings'?'active':''}}" href="#navSessions" role="button" data-bs-toggle="collapse" data-bs-target="#navSessions" aria-expanded="false" aria-controls="navSessions">
                    <i class="bi-gear-wide-connected nav-icon"></i>
                    <span class="nav-link-title">Parametres</span>
                  </a>

                  <div id="navSessions" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                    <a class="nav-link {{$segment1=='settings' && $segment2==''?'active':''}}" href="{{url('/admin/settings')}}">Aperçu</a>
                    <a class="nav-link {{$segment1=='settings' && $segment2=='create'?'active':''}}" href="{{url('/admin/settings/create')}}">Ajouter Parametre</a>
                  </div>
                </div>
                <!-- End Collapse -->
                @endhasanyrole
              <span class="dropdown-header mt-4">Autres</span>
              <small class="bi-three-dots nav-subtitle-replacer"></small>

              <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='sponsors'?'active':''}}" href="#navSponsors" role="button" data-bs-toggle="collapse" data-bs-target="#navSponsors" aria-expanded="false" aria-controls="navSponsors">
                    <i class="bi-currency-exchange nav-icon"></i>
                    <span class="nav-link-title">Sponsors</span>
                  </a>

                  <div id="navSponsors" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                    <a class="nav-link {{$segment1=='sponsors' && $segment2==''?'active':''}}" href="{{url('/admin/sponsors')}}">Aperçu</a>
                    <a class="nav-link {{$segment1=='sponsors' && $segment2=='create'?'active':''}}" href="{{url('/admin/sponsors/create')}}">Ajouter Sponsor</a>
                  </div>
              </div>

              <div class="nav-item">
                  <a class="nav-link dropdown-toggle {{$segment1=='faqs'?'active':''}}" href="#navFaqs" role="button" data-bs-toggle="collapse" data-bs-target="#navFaqs" aria-expanded="false" aria-controls="navFaqs">
                    <i class="bi-question-circle nav-icon"></i>
                    <span class="nav-link-title">Faqs</span>
                  </a>

                  <div id="navFaqs" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                    <a class="nav-link {{$segment1=='faqs' && $segment2==''?'active':''}}" href="{{url('/admin/faqs')}}">Aperçu</a>
                    <a class="nav-link {{$segment1=='faqs' && $segment2=='create'?'active':''}}" href="{{url('/admin/faqs/create')}}">Ajouter Faq</a>
                  </div>
              </div>

              {{-- <div class="nav-item">
                  <a class="nav-link {{$segment1=='problems' && $segment2==''?'active':''}}" role="button" href="{{url('/admin/problems')}}">
                    <i class="bi-chat-square-fill nav-icon"></i>
                    <span class="nav-link-title">Problemes/Suggestions</span>
                  </a>
              </div>


              <div class="nav-item">
                  <a class="nav-link {{$segment1=='notifications' && $segment2==''?'active':''}}" role="button" href="{{url('/admin/notifications')}}">
                    <i class="bi-bell nav-icon"></i>
                    <span class="nav-link-title">Notifications</span>
                  </a>
              </div> --}}




               <span class="dropdown-header mt-4">Se déconnecter</span>
              <small class="bi-three-dots nav-subtitle-replacer"></small>

              <div class="nav-item">
                  <a class="nav-link" role="button" href="#" id="logout">
                    <i class="bi-box-arrow-left nav-icon"></i>
                    <span class="nav-link-title">Se déconnecter</span>
                  </a>
              </div>


            </div>

          </div>
          <!-- End Content -->

          <!-- Footer -->
          <div class="navbar-vertical-footer">
            <ul class="navbar-vertical-footer-list">

              <li class="navbar-vertical-footer-list-item">
                <!-- Language -->
                <div class="dropdown dropup">
                  <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                    <img class="avatar avatar-xss avatar-circle" src="{{asset('backend/vendor/flag-icon-css/flags/1x1/us.svg')}}" alt="United States Flag">
                  </button>

                  <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectLanguageDropdown">
                    <span class="dropdown-header">Choisir la langue</span>
                    <a class="dropdown-item" href="#">
                      <img class="avatar avatar-xss avatar-circle me-2" src="{{asset('backend/vendor/flag-icon-css/flags/1x1/us.svg')}}" alt="Flag">
                      <span class="text-truncate" title="English">En</span>
                    </a>
                    <a class="dropdown-item" href="#">
                      <img class="avatar avatar-xss avatar-circle me-2" src="{{asset('backend/vendor/flag-icon-css/flags/1x1/fr.svg')}}" alt="Flag">
                      <span class="text-truncate" title="English">Fr</span>
                    </a>
                  </div>
                </div>

                <!-- End Language -->
              </li>
            </ul>
          </div>
          <!-- End Footer -->
        </div>
      </div>
    </aside>
