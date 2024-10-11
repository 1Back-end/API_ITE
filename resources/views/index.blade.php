
<!DOCTYPE html>
<html lang="en">
    <x-frontend.head />

<body>

    <!-- Pre loader -->
    <x-frontend.loader />

    <!-- Offcanvas end START -->
    {{-- <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEnd" style="background-image:url(assets/images/bg/pattern/03.png); background-position: center left; background-size: cover;">
        <div class="offcanvas-header">
        <a class="ms-auto btn btn-primary btn-round zoom-hover" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fas fa-times p-0"></i>
            </a>
        </div>
        <div class="offcanvas-body vh-lg-100 d-flex align-items-start flex-column px-5 px-md-6">
            <!-- Offcanvas inner START -->
            <ul class="nav dropdown-toggle-start-icon d-block flex-column mb-5">
                <li class="nav-item display-6 h5 position-relative">
                    <a href="index.html" class="nav-link text-white-stroke d-block">Home</a>
                    <!-- Offcanvas dropdown START -->
                    <a class="dropdown-toggle collapsed" data-bs-toggle="collapse" href="#home-dropdown-collapse" role="button" aria-expanded="false" aria-controls="home-dropdown-collapse"></a>
                    <li class="collapse" id="home-dropdown-collapse">
                    <ul class="nav flex-column w-100 pb-4 pe-0 pe-lg-5">
                            <li class="nav-item"> <a class="nav-link text-body" href="index.html">Classic Default</a> </li>
                            <li class="nav-item"> <a class="nav-link text-body" href="index-2.html">Agency classic</a> </li>
                            <li class="nav-item"> <a class="nav-link text-body" href="index-3.html">Agency Trendy<span class="badge bg-danger ms-2">Hot</span></a> </li>
                            <li class="nav-item"> <a class="nav-link text-body" href="index-4.html">Agency Modern</a> </li>
                            <li class="nav-item"> <a class="nav-link text-body" href="index-5.html">Studio showcase</a> </li>
                            <li class="nav-item"> <a class="nav-link text-body" href="index-6.html">Creative agency</a> </li>
                            <li class="nav-item"> <a class="nav-link text-body" href="index-7.html">Digital studio</a> </li>
                            <li class="nav-item"> <a class="nav-link text-body" href="index-8.html">Portfolio showcase</a> </li>
                            <li class="nav-item"> <a class="nav-link text-body" href="index-9.html">Corporate </a> </li>
                            <li class="nav-item"> <a class="nav-link text-body" href="index-10.html">Personal Portfolio</a> </li>
                        </ul>
                    </li>
                    <!-- Offcanvas dropdown END -->
                <li class="nav-item display-6 h5">
                    <a class="nav-link text-white-stroke" href="#">About</a>
                </li>
                <li class="nav-item display-6 h5">
                    <a class="nav-link text-white-stroke" href="#">Work</a>
                </li>
                <li class="nav-item display-6 h5">
                    <a class="nav-link text-white-stroke" href="#">Services</a>
                </li>
                <li class="nav-item display-6 h5">
                    <a class="nav-link text-white-stroke" href="#">Our Journal</a>
                </li>
                <li class="nav-item display-6 h5">
                    <a class="nav-link text-white-stroke" href="#">Contact Us</a>
                </li>
            </ul>
            <div class="mt-auto mb-5">
                <a href="#" class="font-heading text-white text-primary-hover d-block mb-3">hello@folio.com</a>
                <a href="#" class="font-heading text-white text-primary-hover">+(251) 854-6308</a>
            </div>
            <!-- Offcanvas inner END -->
        </div>
    </div> --}}
    <!-- Offcanvas end END -->

    <!-- =======================
    Header START -->
    <x-frontend.header />
    <!-- =======================
    Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

    <!-- =======================
    Main Banner START -->
    <section class="position-relative bg-dark p-0">
        <!-- Social sites link left -->
        <div class="position-absolute top-50 start-0 translate-middle z-index-9 ms-4 d-none d-xxl-block">
            <div class="list-group-inline list-unstyled rotate-270">
                <a href="https://www.facebook.com/{{ active_setting()->contact->facebook }}" target="_blank" class="list-group-item text-white bg-transparent mt-4">Facebook</a>
                <a href="https://www.twitter.com/{{ active_setting()->contact->twitter }}" target="_blank" class="list-group-item text-white bg-transparent mt-4">Twitter</a>
                <a href="https://wa.me/237{{ active_setting()->contact->whatsapp }}" target="_blank" class="list-group-item text-white bg-transparent mt-4">Whatsapp</a>
                <a href="https://www.linkedin.com/{{ active_setting()->contact->linkedin }}" target="_blank" class="list-group-item text-white bg-transparent mt-4">LinkedIn</a>
            </div>
        </div>

        <!-- Scoll Down -->
        <div class="scroll-down scroll-down-light m-5 d-none d-md-block">
            <div class="scroll-line"></div>
            <span class="scoll-text">{{ __('translate.scroll_down') }}</span>
        </div>

        <!-- Banner START -->
        <div class="tiny-slider dots-white dots-bordered dots-end arrow-bordered arrow-large arrow-round arrow-start-bottom arrow-md-none">
            <div class="tiny-slider-inner h-500 h-sm-700 h-xl-900" data-autoplay="true" data-autoplaytime="7000" data-gutter="0" data-arrow="true" data-dots="true" data-items="1">

                <!-- Slide 1 START -->
                <div class="h-100 bg-dark-overlay-4 bg-dark" style="background-image:url({{pages('HOME')->banner!=null?asset('pages/banners/'.pages('HOME')->banner): asset('assets/images/bg/02.jpg')}}); background-position: center center; background-size: cover;">
                    <div class="container h-100">
                        <div class="row d-flex h-100">
                            <div class="col-md-4"></div>
                            <div class="col-md-8 justify-content-center align-self-center align-items-start">
                                <div class="slider-content text-start">
                                    <h5 class="animate__animated animate__fadeInUp animate__delay-1s text-white mb-1 mb-md-4">{{ __('translate.welcome') }}</h5>
                                    <h2 class="display-1 text-white-stroke text-primary-shadow d-block animate__animated animate__fadeInUp animate__delay-2s">{{ active_setting()->company_name }}</h2>
                                    <p class="animate__animated animate__fadeInUp animate__delay-3s lead text-white">{{ active_setting()->company_slogan }}</p>
                                    <div class="animate__animated animate__fadeInUp mt-4 animate__delay-4s"><a href="https://wa.me/237{{ active_setting()->contact->whatsapp }}" target="_blank" class="btn btn-line text-white">{{ __('translate.discuss_project') }}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 1 END -->
                @foreach(pages('HOME')->banners as $banner)
                    <!-- Slide 1 START -->
                    <div class="h-100 bg-dark-overlay-4 bg-dark" style="background-image:url({{asset('pages/images/'.$banner->banner) }}); background-position: center center; background-size: cover;">
                        <div class="container h-100">
                            <div class="row d-flex h-100">
                                <div class="col-md-4"></div>
                                <div class="col-md-8 justify-content-center align-self-center align-items-start">
                                    <div class="slider-content text-start">
                                        <h5 class="animate__animated animate__fadeInUp animate__delay-1s text-white mb-1 mb-md-4">{{ __('translate.welcome') }}</h5>
                                        <h2 class="display-1 text-white-stroke text-primary-shadow d-block animate__animated animate__fadeInUp animate__delay-2s">{{ $banner->title }}</h2>
                                        <p class="animate__animated animate__fadeInUp animate__delay-3s lead text-white">{{ $banner->tag }}</p>
                                        <div class="animate__animated animate__fadeInUp mt-4 animate__delay-4s"><a href="https://wa.me/237{{ active_setting()->contact->whatsapp }}" target="_blank" class="btn btn-line text-white">{{ __('translate.discuss_project') }}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 1 END -->
                @endforeach

            </div>
        </div>
    </section>
    <!-- =======================
    Main Banner END -->

    <!-- =======================
    Service START -->
    <section class="position-relative">
        {{-- <!-- Shape Decoration START -->
        <!-- Shape 1 -->
        <figure class="position-absolute end-0 top-0 m-4 d-none d-lg-block">
            <svg width="148" height="140" viewBox="0 0 148 140" xmlns="http://www.w3.org/2000/svg">
                <path class="svg-custom-border-dark" d="m9.95 131.41c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <circle class="svg-custom-border-dark" cx="25.86" cy="131.41" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="44.71" cy="131.41" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="63.57" cy="131.41" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="82.43" cy="131.41" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="101.29" cy="131.41" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="120.14" cy="131.41" r="2.95"/>
                <path class="svg-custom-border-dark" d="m141.95 131.41c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m9.95 113.61c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <circle class="svg-custom-border-dark" cx="25.86" cy="113.61" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="44.71" cy="113.61" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="63.57" cy="113.61" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="82.43" cy="113.61" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="101.29" cy="113.61" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="120.14" cy="113.61" r="2.95"/>
                <path class="svg-custom-border-dark" d="m141.95 113.61c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m9.95 95.81c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <circle class="svg-custom-border-dark" cx="25.86" cy="95.81" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="44.71" cy="95.81" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="63.57" cy="95.81" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="82.43" cy="95.81" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="101.29" cy="95.81" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="120.14" cy="95.81" r="2.95"/>
                <path class="svg-custom-border-dark" d="m141.95 95.81c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m9.95 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m28.8 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m47.66 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m66.52 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m85.37 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.64 0.01 2.95 1.33 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m104.23 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m123.09 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m141.95 78.01c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m9.95 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m28.8 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m47.66 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m66.52 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m85.37 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.64 0 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m104.23 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m123.09 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m141.95 60.22c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m9.95 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m28.8 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m47.66 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m66.52 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m85.37 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.64 0 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m104.23 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m123.09 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m141.95 42.42c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m9.95 24.62c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <circle class="svg-custom-border-dark" cx="25.86" cy="24.62" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="44.71" cy="24.62" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="63.57" cy="24.62" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="82.43" cy="24.62" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="101.29" cy="24.62" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="120.14" cy="24.62" r="2.95"/>
                <path class="svg-custom-border-dark" d="m141.95 24.62c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95 2.95 1.32 2.95 2.95z"/>
                <path class="svg-custom-border-dark" d="m9.95 6.82c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95c0-1.62 1.32-2.94 2.95-2.94s2.95 1.32 2.95 2.94z"/>
                <circle class="svg-custom-border-dark" cx="25.86" cy="6.82" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="44.71" cy="6.82" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="63.57" cy="6.82" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="82.43" cy="6.82" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="101.29" cy="6.82" r="2.95"/>
                <circle class="svg-custom-border-dark" cx="120.14" cy="6.82" r="2.95"/>
                <path class="svg-custom-border-dark" d="m141.95 6.82c0 1.63-1.32 2.95-2.95 2.95s-2.95-1.32-2.95-2.95 1.32-2.95 2.95-2.95c1.63 0.01 2.95 1.33 2.95 2.95z"/>
            </svg>
        </figure>
        <!-- Shape 2 -->
        <figure class="position-absolute start-0 bottom-0 mb-6 ms-6 d-none d-lg-block">
            <svg width="214" height="172" viewBox="0 0 358 287" xmlns="http://www.w3.org/2000/svg">
            <ellipse class="fill-primary" transform="matrix(.9961 -.0884 .0884 .9961 -9.9064 21.268)" cx="235.25" cy="122.52" rx="120.04" ry="120.04"/>
                <defs> <ellipse id="round-bg" transform="matrix(.7071 -.7071 .7071 .7071 -91.988 129.49)" cx="110.31" cy="175.78" rx="109" ry="109"/> </defs>
                <clipPath id="lines"><use xlink:href="#round-bg"/></clipPath>
                <g clip-path="url(#lines)">
                    <path class="fill-dark" d="m-64.69 132.76c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.77-2.29 10.17-4.89 15.48-1.42z"/>
                </g>
                <g clip-path="url(#lines)">
                    <path class="fill-dark" d="m-79.96 156.09c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.88-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.76-2.28 10.17-4.88 15.47-1.41z"/>
                </g>
                <g clip-path="url(#lines)">
                    <path class="fill-dark" d="m-49.1 108.94c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.76-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.77-2.29 10.18-4.9 15.48-1.42z"/>
                </g>
                <g clip-path="url(#lines)">
                    <path class="fill-dark" d="m-32.99 84.32c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.88-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.76-2.28 10.17-4.88 15.47-1.41z"/>
                </g>
                <g clip-path="url(#lines)">
                    <path class="fill-dark" d="m-1.61 36.38c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.88-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.45-5.08-9.44-4.89-14.73 0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.76-2.3 10.16-4.9 15.47-1.43z"/>
                </g>
                <g clip-path="url(#lines)">
                    <path class="fill-dark" d="m-16.88 59.71c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.77-2.27 10.17-4.88 15.48-1.4z"/>
                </g>
                <g clip-path="url(#lines)">
                    <path class="fill-dark" d="m13.98 12.56c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.76-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.77-2.29 10.17-4.9 15.48-1.42z"/>
                </g>
                <g clip-path="url(#lines)">
                    <path class="fill-dark" d="m30.09-12.06c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.77-2.28 10.17-4.88 15.48-1.41z"/>
                </g>
            </svg>
        </figure>
        <!-- Shape Decoration END -->

        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <h2 class="display-5">Redefine your marketing strategy</h2>
                    <p>We are an insight and behavior-driven creative marketing agency. A Full Service Digital Creative Agency Specializing in: Video Production, Web Design, Branding, Brand Strategy</p>
                </div>
            </div>
            <div class="row d-flex justify-content-lg-end">
                <!-- Service Item 1-->
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="display-1 text-dark-stroke text-hover-fill text-primary-shadow">B</h2>
                    <h5 class="mb-4">Branding</h5>
                    <div class="list-group list-group-borderless list-unstyled">
                        <a href="#" class="list-group-item bg-transparent">Brand Identity</a>
                        <a href="#" class="list-group-item bg-transparent">Art Direction</a>
                        <a href="#" class="list-group-item bg-transparent">Visual Design</a>
                        <a href="#" class="list-group-item bg-transparent">Illustration & Iconography</a>
                        <a href="#" class="list-group-item bg-transparent">Content / Video</a>
                    </div>
                </div>
                <!-- Service Item 2-->
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="display-1 text-dark-stroke text-hover-fill text-primary-shadow">G</h2>
                    <h5 class="mb-4">Graphic Design</h5>
                    <div class="list-group list-group-borderless list-unstyled">
                        <a href="#" class="list-group-item bg-transparent">Creative Concepting</a>
                        <a href="#" class="list-group-item bg-transparent">Apps & mobile</a>
                        <a href="#" class="list-group-item bg-transparent">User Experience</a>
                        <a href="#" class="list-group-item bg-transparent">Motion Design</a>
                        <a href="#" class="list-group-item bg-transparent">Interface Design</a>
                    </div>
                </div>
                <!-- Service Item 3-->
                <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="display-1 text-dark-stroke text-hover-fill text-primary-shadow">D</h2>
                    <h5 class="mb-4">Development</h5>
                    <div class="list-group list-group-borderless list-unstyled">
                        <a href="#" class="list-group-item bg-transparent">Back-end Development</a>
                        <a href="#" class="list-group-item bg-transparent">Front-end Development</a>
                        <a href="#" class="list-group-item bg-transparent">Web Development</a>
                        <a href="#" class="list-group-item bg-transparent">Apps & Game</a>
                        <a href="#" class="list-group-item bg-transparent">E-commerce</a>
                    </div>
                </div>
            </div><!-- row END -->

            <div class="row d-flex justify-content-end">
                <div class="col-lg-9">
                    <a href="#" class="btn btn-line text-dark mt-4">View all services</a>
                </div>
            </div>
        </div> --}}
        <div class="container" id="about">
            <!-- Title -->
            <div class="row">
                <div class="col-md-8 mx-auto text-center mb-5">
                    <span class="font-alt fw-normal display-8">{{ __('translate.we_are') }} {{ active_setting()->company_name }}</span>
                    <h2 class="display-6 my-3">{{ session('lang') == 'en'?pages('ABOUT')->title->en:pages('ABOUT')->title->fr }}</h2>
                    <p class="h6 text-light-gray mb-4 fw-normal">{{ session('lang') == 'en'?pages('ABOUT')->sub_title->en:pages('ABOUT')->sub_title->fr }}</p>
                </div>
            </div>
            <!-- Fun facts -->
            <div class="row">
                <!-- Fact Item -->
                <div class="col-md-4">
                    <div class="text-center px-3">
                        <h2 class="text-dark-stroke text-primary-shadow">{{ active_setting()->statistics->projects }}+</h2>
                        <h4 class="mb-4">{{ __('translate.implemented_projects') }}</h4>
                        <p>Chez ITE EXPERTS, nous développons des solutions innovantes en applications web et gestion des systèmes d'information. Nous nous engageons à améliorer l'efficacité de nos clients tout en garantissant une expérience utilisateur optimale.</p>
                    </div>
                </div>
                <!-- Fact Item -->
                <div class="col-md-4">
                    <div class="text-center px-3">
                        <h2 class="text-dark-stroke text-primary-shadow">{{ active_setting()->statistics->partners }}+</h2>
                        <h4 class="mb-4">{{ __('translate.partners') }}</h4>
                        <p>Nous collaborons avec des entreprises de premier plan pour offrir des solutions innovantes. Nos partenaires partagent notre engagement envers l'excellence, garantissant des services adaptés aux besoins de nos clients.</p>
                    </div>
                </div>
                <!-- Fact Item -->
                <div class="col-md-4">
                    <div class="text-center px-3">
                        <h2 class="text-dark-stroke text-primary-shadow">{{ active_setting()->statistics->clients }}+</h2>
                        <h4 class="mb-4">{{ __('translate.satisfied_clients') }}</h4>
                        <p>Nous nous engageons à dépasser les attentes de nos clients en leur fournissant des solutions de qualité. Leur satisfaction est notre priorité, et nous sommes fiers de bâtir des relations de confiance grâce à un service exceptionnel.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Service END -->

    <!-- =======================
    Features START -->
    <section class="bg-dark position-relative pattern-overlay-5 mx-xl-3 mx-xxxl-9 rounded">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-5">
                    <div class="row">
                        @foreach($services as $service)
                            <!-- Feature item -->
                            <div class="col-sm-6 mb-5">
                                <i class="display-6 text-primary fas fa-check"></i>
                                <h5 class="text-white my-3">{{ session('lang') == 'en'?$service->name->en:$service->name->fr }}</h5>
                                <p class="text-secondary">{{ session('lang') == 'en'?$service->short_description->en:$service->short_description->fr }}</p>
                            </div>
                        @endforeach

                        {{-- <!-- Feature item -->
                        <div class="col-sm-6 mb-5">
                            <i class="display-6 text-primary bi bi-bar-chart-line"></i>
                            <h5 class="text-white my-3">Online Marketing</h5>
                            <p class="text-secondary">The right mix of resources for achieving your online goals.</p>
                        </div>
                        <!-- Feature item -->
                        <div class="col-sm-6 mb-5 mb-sm-0">
                            <i class="display-6 text-primary bi bi-shop"></i>
                            <h5 class="text-white my-3">E-Commerce Solution</h5>
                            <p class="text-secondary m-0">A scalable web shop for online sales of your product or service.</p>
                        </div>
                        <!-- Feature item -->
                        <div class="col-sm-6">
                            <i class="display-6 text-primary bi bi-envelope-open"></i>
                            <h5 class="text-white my-3">E-mail Campaigns</h5>
                            <p class="text-secondary m-0">Effective communication campaigns that activate your target group.</p>
                        </div> --}}
                    </div>
                </div>
                <!-- Title -->
                <div class="col-md-5 mb-5 d-flex align-items-center">
                    <div class="">
                        <h2 class="display-5 text-white-stroke ">{{ session('lang') == 'en'?pages('SERVICES')->title->en:pages('SERVICES')->title->fr }}</h2>
                        <p>{{ session('lang') == 'en'?pages('SERVICES')->sub_title->en:pages('SERVICES')->sub_title->fr }}</p>
                    </div>
                </div>

            </div><!-- row END -->
        </div>
    </section>
    <!-- =======================
    Features END -->
    <!-- =======================
    Action boxes START -->
    <section class="mt-30 pt-0">
        <div class="container-fluid px-md-4">
            <div class="row">

                <!-- Box 1 -->
                <div class="col-xl-4">
                    <div class="h-100 d-flex bg-dark-overlay-5 rounded position-relative rounded overflow-hidden" style="background:url({{ asset('backend/img/400x400/img13.jpg') }}) no-repeat center center; background-size:cover;">
                        <!-- Shape Decoration START -->
                        <div class="position-absolute end-0 bottom-0 d-none d-lg-block">
                            <div class="bg-primary-overlay-dotted p-9 mb-n4 rotate-10"></div>
                        </div>
                        <!-- Shape Decoration END -->
                        <div class="text-start mb-auto p-3 p-md-5">
                            <h5 class="text-white">{{ __('translate.more_than') }}:</h5>
                            <h2 class="display-5 text-white-stroke text-primary-shadow"><span class="purecounter" data-purecounter-start="0" data-purecounter-delay="400" data-purecounter-duration="10" data-purecounter-end="{{ date('Y') - active_setting()->company_creation_date }}">{{ date('Y') - active_setting()->company_creation_date }} {{ __('translate.years') }}</span> </h2>
                            <p class="text-white mt-n2">{{ __('translate.in_creative_web_dev') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Box 2 -->
                <div class="col-xl-4">
                    <div class="h-100 p-3 p-md-5 bg-dark rounded position-relative overflow-hidden">
                        <!-- Shape Decoration START -->
                        <!-- Shape 1 -->
                        <div class="position-absolute start-0 top-0 zoom-2">
                            <div class="bg-primary-overlay-dotted px-6 py-7 mt-n4 rotate-10"></div>
                        </div>
                        <!-- Shape 2 -->
                        <figure class="position-absolute end-0 top-0">
                            <svg width="180" height="144" viewBox="0 0 358 287" xmlns="http://www.w3.org/2000/svg">
                            <ellipse class="fill-primary" transform="matrix(.9961 -.0884 .0884 .9961 -9.9064 21.268)" cx="235.25" cy="122.52" rx="120.04" ry="120.04"></ellipse>
                                <defs> <ellipse id="round-bg" transform="matrix(.7071 -.7071 .7071 .7071 -91.988 129.49)" cx="110.31" cy="175.78" rx="109" ry="109"></ellipse> </defs>
                                <clipPath id="lines"><use xlink:href="#round-bg"></use></clipPath>
                                <g clip-path="url(#lines)">
                                    <path class="fill-white" d="m-64.69 132.76c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.77-2.29 10.17-4.89 15.48-1.42z"></path>
                                </g>
                                <g clip-path="url(#lines)">
                                    <path class="fill-white" d="m-79.96 156.09c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.88-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.76-2.28 10.17-4.88 15.47-1.41z"></path>
                                </g>
                                <g clip-path="url(#lines)">
                                    <path class="fill-white" d="m-49.1 108.94c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.76-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.77-2.29 10.18-4.9 15.48-1.42z"></path>
                                </g>
                                <g clip-path="url(#lines)">
                                    <path class="fill-white" d="m-32.99 84.32c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.88-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.76-2.28 10.17-4.88 15.47-1.41z"></path>
                                </g>
                                <g clip-path="url(#lines)">
                                    <path class="fill-white" d="m-1.61 36.38c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.88-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.45-5.08-9.44-4.89-14.73 0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.76-2.3 10.16-4.9 15.47-1.43z"></path>
                                </g>
                                <g clip-path="url(#lines)">
                                    <path class="fill-white" d="m-16.88 59.71c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.77-2.27 10.17-4.88 15.48-1.4z"></path>
                                </g>
                                <g clip-path="url(#lines)">
                                    <path class="fill-white" d="m13.98 12.56c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.76-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48-3.53-2.31-7.36-0.47-11.79 1.67-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.77-2.29 10.17-4.9 15.48-1.42z"></path>
                                </g>
                                <g clip-path="url(#lines)">
                                    <path class="fill-white" d="m30.09-12.06c5.31 3.47 5.08 9.47 4.89 14.76-0.18 4.92-0.34 9.16 3.19 11.48 3.53 2.31 7.36 0.47 11.79-1.67 4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43s5.08 9.47 4.89 14.76c-0.18 4.92-0.34 9.16 3.19 11.47s7.36 0.47 11.79-1.67c4.77-2.3 10.17-4.9 15.48-1.43 5.3 3.47 5.08 9.47 4.88 14.75-0.18 4.92-0.34 9.16 3.19 11.47l-2.06 3.14c-5.3-3.47-5.08-9.47-4.88-14.76 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43-5.3-3.47-5.08-9.47-4.88-14.75 0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.47s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43s-5.08-9.47-4.89-14.76c0.18-4.92 0.34-9.16-3.19-11.48s-7.36-0.47-11.79 1.67c-4.77 2.3-10.17 4.9-15.48 1.43l2.06-3.14c3.53 2.31 7.36 0.47 11.8-1.67 4.77-2.28 10.17-4.88 15.48-1.41z"></path>
                                </g>
                            </svg>
                        </figure>
                        <!-- Shape Decoration END -->

                        <h3 class="text-white pt-9 mt-4 mt-xl-8">{{ session('lang')=='en'?pages('SERVICES')->sub_title->en:pages('SERVICES')->sub_title->fr }}</h3>
                        <a href="/services" class="btn btn-line text-white">{{ __('translate.explore_now') }}</a>
                    </div>
                </div>

                <!-- Box 3 -->
                <div class="col-xl-4">
                    <div class="h-100 p-3 p-md-5 d-flex bg-primary rounded position-relative overflow-hidden">
                        <!-- Shape Decoration START -->
                        <!-- Shape 1 -->
                        <figure class="position-absolute start-0 top-0 rtl-flip opacity-5">
                            <svg width="390" height="398" viewBox="0 0 150 153" xmlns="http://www.w3.org/2000/svg">
                                <path class="svg-custom-border-dark" d="m-0.5 104.5c31 0 52.4 52.06 83.04 46.46 11.62-2.12 14.02-21.83 15.4-33.43 1.44-12.1-2.08-25.17-1.81-37.62 0.13-5.92 0.9-13.67 4.38-17.95 4.75-5.82 12.07-2.67 18.26-2.03 13.9 1.43 24.11-13.65 20.62-30.34-0.04-0.19-0.08-0.39-0.12-0.58-2.65-12.47-0.77-29.5 10.23-29.5"/>
                                <path class="svg-custom-border-dark" d="m-172.95 36.58"/>
                                <path class="svg-custom-border-dark" d="m-0.57 93.25c27.07 0 46.79 46.35 74.09 41.35 10.37-1.9 12.53-19.44 13.77-29.76 1.31-10.82-1.83-22.46-1.6-33.56 0.11-5.28 0.79-12.19 3.9-16.01 1.78-2.18 3.96-2.96 6.31-3.08 3.23-0.17 6.76 0.9 9.95 1.22 12.39 1.23 21.51-12.18 18.44-27.05-0.04-0.17-0.07-0.34-0.11-0.52-1.12-5.35-0.67-10.67 1.04-15.2 1.83-4.87 9.26-6.32 9.26-11.14"/>
                                <path class="svg-custom-border-dark" d="m0.17 82.08c24.33 0 40.38 40.55 64.33 36.16 9.13-1.68 11.05-17.05 12.14-26.09 1.18-9.53-1.58-19.74-1.38-29.49 0.1-4.63 0.69-10.7 3.42-14.08 1.56-1.92 3.48-2.61 5.53-2.72 2.83-0.16 5.93 0.76 8.73 1.03 10.88 1.03 18.9-10.71 16.26-23.76l-0.09-0.45c-0.97-4.7-0.56-9.36 0.95-13.35 1.62-4.28 8.31-5.38 8.31-9.61"/>
                                <path class="svg-custom-border-dark" d="m-0.09 70.92c21.59 0 34.98 34.76 55.58 30.96 7.88-1.46 9.55-14.66 10.51-22.42 1.03-8.25-1.33-17.03-1.17-25.43 0.08-3.99 0.59-9.22 2.94-12.14 1.34-1.66 2.99-2.25 4.76-2.37 2.44-0.15 5.1 0.62 7.51 0.84 9.37 0.82 16.3-9.24 14.08-20.47-0.03-0.13-0.05-0.26-0.08-0.39-0.82-4.04-0.45-8.06 0.85-11.5 1.4-3.69 7.16-4.65 7.16-8.3"/>
                                <path class="svg-custom-border-dark" d="m-0.36 59.76c18.86 0 29.57 28.96 46.83 25.77 6.63-1.24 8.06-12.26 8.89-18.76 0.89-6.96-1.09-14.32-0.95-21.36 0.06-3.35 0.48-7.74 2.46-10.21 1.12-1.39 2.5-1.9 3.98-2.01 2.04-0.15 4.27 0.49 6.29 0.65 7.86 0.64 13.7-7.77 11.9-17.18l-0.06-0.33c-0.66-3.38 1.52-4.84 3.52-6.84s3.26-1 3.26-9.81"/>
                                <path class="svg-custom-border-dark" d="m-0.5 47.5c14.12 0 24.04 24.25 37.95 21.67 5.39-1.02 6.57-9.87 7.26-15.09 0.75-5.68-0.84-11.6-0.74-17.29 0.05-2.71 0.38-6.25 1.99-8.28 0.9-1.13 2.01-1.55 3.2-1.65 1.64-0.14 3.44 0.35 5.07 0.46 6.35 0.44 11.09-6.3 9.72-13.89-0.02-0.09-0.03-0.18-0.05-0.26-0.51-2.73-0.23-5.45 0.67-7.81 0.96-2.52 4.87-3.2 4.87-5.68"/>
                                <path class="svg-custom-border-dark" d="m0 38c11.88 0 17.87 16.82 28.43 14.81 4.15-0.79 5.08-7.48 5.63-11.42 0.61-4.39-0.59-8.89-0.52-13.23 0.03-2.07 0.28-4.77 1.51-6.34 0.68-0.87 1.52-1.2 2.43-1.29 1.25-0.14 2.61 0.21 3.85 0.28 4.84 0.24 8.49-4.83 7.55-10.6-0.01-0.07-0.02-0.13-0.03-0.2-0.36-2.07-0.12-4.15 0.58-5.96 0.74-1.93 3.72-2.47 3.72-4.37"/>
                                <path class="svg-custom-border-dark" d="m0 29c10 0 28 13 23.41-0.29-1.02-2.97-0.34-6.18-0.31-9.16 0.01-1.43 0.17-3.29 1.03-4.41 0.46-0.6 1.03-0.85 1.65-0.94 0.85-0.13 1.78 0.08 2.63 0.09 3.33 0.05 5.89-3.36 5.37-7.31-0.01-0.05-0.01-0.09-0.02-0.14-0.2-1.42-0.01-2.84 0.48-4.11 0.52-1.34 2.55-1.74 2.58-3.05"/>
                                <path class="svg-custom-border-dark" d="M0,21c1.69,0,14,2,12.77-4.98c-0.32-1.83-0.09-3.46-0.09-5.1c0-0.79,0.07-1.8,0.55-2.47   c0.24-0.34,0.55-0.49,0.87-0.58c0.45-0.12,0.95-0.12,1.4-0.1C20,8,20.51,2,20.51-0.34"/>
                                <path class="svg-custom-border-dark" d="m0 6c1 0 4 1 4-2v-4"/>
                            </svg>
                        </figure>
                        <!-- Shape Decoration END -->
                        <!-- Newsletter -->
                        <div class="text-end mt-auto position-relative">
                            <div class="opacity-1 display-2 text-dark"><i class="far fa-paper-plane"></i></div>
                            <h3 class="font-heading text-white">{!! __('translate.signup_newsletter') !!}</h3>
                            <form class="bg-white rounded my-2 my-md-4 mx-0 ms-xl-5 p-2">
                                <div class="input-group">
                                    <input class="form-control border-0" type="email" placeholder="Email">
                                    <button type="button" class="btn btn-dark mb-0 rounded">{!! __('translate.subscribe') !!}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Action boxes END -->
    <!-- =======================
    Testimonials START -->
    <section class="p-0">
        <div class="container">
            <div class="row position-relative">
                <!-- Title -->
                <div class="col-sm-8 mb-3 mx-auto text-center pt-7">
                    <h2 class="display-5 mb-5 text-dark-stroke">{!! __('translate.testimonials') !!}</h2>
                </div>
                <!-- Testimonials -->
                <div class="col-md-10 mx-auto text-center pb-7">
                    <div class="tiny-slider arrow-md-none arrow-bordered arrow-large arrow-round">
                        <div class="tiny-slider-inner" data-gutter="0" data-edge="50" data-autoplay="false" data-arrow="true" data-dots="false" data-items="1">
                            @foreach($reviews as $review)

                            <!-- Testimonial item -->
                            <div class="item px-3 px-md-6">
                                <div class="position-absolute top-50 start-50 translate-middle display-1 text-body z-index-n9 opacity-1"><i class="fas fa-quote-left"></i></div>
                                <div class="avatar"><img class="avatar-img rounded-circle" src="{{ asset('review/logos/'.$review->logo) }}" onerror="src='{{ asset('backend/img/160x160/img1.jpg') }}'" alt="avatar" width="160" height="160"></div>
                                <p class="lead">{{ $review->review }}</p>
                                <h6 class="mb-0 mt-3">{{ $review->reviewer_name }}</h6>
                                {{-- <span class="small">Software Developer</span> --}}
                            </div>

                            <!-- Testimonial item -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div><!-- row END -->
        </div>
    </section>
    <!-- =======================
    Testimonials END -->

    <!-- =======================
    Portfolio START -->
    <section class="pt-4">
        <div class="container">
            <!-- Title -->
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-sm-7 mb-4 text-right text-sm-end">
                    <a href="/projects" class="btn btn-line text-dark mt-3">{!! __('translate.view_work') !!}</a>
                </div>
                <div class="col-sm-5 mb-3">
                    <h2 class="display-5 mb-0 mb-sm-4 text-dark-stroke">{!! __('translate.our') !!} Portfolio</h2>
                </div>

            </div>
            <!-- Portfolio items -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tiny-slider dots-bordered">
                        <div class="tiny-slider-inner" data-arrow="false" data-dots="true" data-items-xl="3" data-items-lg="3" data-items-md="3" data-items-sm="2" data-items-xs="1">

                            @foreach ($projects as $project)
                            <!-- Card item START -->
                            <div class="item">
                                <a href="#" class="card card-metro">
                                    <!-- Card Image -->
                                    <div class="card-image H6">
                                        <img src="{{ asset('project-images/'.$project->img) }}" alt="card image" height="900" width="420">
                                    </div>
                                    <!-- Card Overlay -->
                                    <div class="card-img-overlay d-flex flex-column">
                                        <img class="w-40" src="assets/images/clients/light/01.svg" alt="">
                                        <div class="mt-auto card-text">
                                            <h5 class="text-white">{{ $project->title }}</h5>
                                            <p class="small text-white mb-0 text-truncate">{{ session('lang') == 'en'?$project->short_description->en:$project->short_description->fr }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Card item END -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- row END -->
        </div>
    </section>
    <!-- =======================
    Portfolio END -->

    <!-- =======================
    Steps START -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Step item -->
                <div class="col-sm-12 col-md-4 mb-5">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="display-4 mb-0 text-light-stroke text-light-shadow me-3">01</h2>
                        <h4 class="mt-0">{!! __('translate.home_research') !!}</h4>
                    </div>
                    <div class="ps-6 pt-4 pt-sm-0">
                        <p>{{ __('translate.home_research_desc') }}</p>
                        <img class="rounded" src="assets/images/about/01.jpg" alt="">
                    </div>
                </div>

                <!-- Step item -->
            <div class="col-sm-6 col-md-4 mb-5">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="display-4 mb-0 text-light-stroke text-light-shadow me-3">02</h2>
                    <h4 class="mt-0">{!! __('translate.home_design') !!}</h4>
                </div>
                <div class="ps-6 pt-4 pt-sm-0">
                    <p>{{ __('translate.home_design_desc') }}</p>
                    <img class="rounded" src="assets/images/about/02.jpg" alt="">
                </div>
            </div>

                <!-- Step item -->
                <div class="col-sm-6 col-md-4 mb-5">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="display-4 mb-0 text-light-stroke text-light-shadow me-3">03</h2>
                    <h4 class="mt-0">{!! __('translate.home_testing') !!}</h4>
                </div>
                <div class="ps-6 pt-4 pt-sm-0">
                    <p>{{ __('translate.home_testing_desc') }}</p>
                    <img class="rounded" src="assets/images/about/03.jpg" alt="">
                </div>
            </div>

            </div>
        </div>
    </section>
    <!-- =======================
    Steps END -->

    <!-- =======================
    Clients START -->
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <!-- Title -->
                <div class="col-lg-4">
                    <h2 class="display-5 mb-3">{{ __('translate.home_partners') }}</h2>
                    <p>{{ __('translate.home_partners_desc') }} </p>
                </div>
                <!-- Clients logos -->
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($partners as $partner)
                        <!-- Logo item -->
                        <div class="col-6 col-sm-4 col-lg-3">
                            <div class="mb-4 p-4 grayscale bg-light-overlay-dotted text-center">
                                <img src="{{ asset('sponsors/'.$partner->logo) }}" alt="" height="40" width="80">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div><!-- row END -->
        </div>
    </section>
    <!-- =======================
    Clients END -->

    <!-- =======================
    Action box START -->
    <section class="pt-0 position-relative">
        <!-- Shape Decoration START -->
        <figure class="position-absolute start-0 bottom-0 ms-n6 mb-n4 z-index-9 d-none d-lg-block">
            <svg width="285" height="82" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 285 82">
                <rect class="fill-primary" x="22.67" y="16.58" width="262.22" height="65.42"/>
                <path d="m9.63 4.83c0 2.66-2.16 4.81-4.81 4.81-2.66 0.01-4.82-2.15-4.82-4.81s2.16-4.81 4.81-4.81c2.66 0 4.82 2.15 4.82 4.81z"/>
                <path d="m35.25 4.83c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.66 0 4.81 2.15 4.81 4.81z"/>
                <path d="m60.88 4.83c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81s4.81 2.15 4.81 4.81z"/>
                <path d="m86.5 4.83c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81s4.81 2.15 4.81 4.81z"/>
                <path d="m112.12 4.83c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.66 0 4.81 2.15 4.81 4.81z"/>
                <path d="m137.75 4.83c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81s4.81 2.15 4.81 4.81z"/>
                <path d="m163.37 4.83c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.66 0 4.81 2.15 4.81 4.81z"/>
                <path d="m188.99 4.83c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.66 0 4.81 2.15 4.81 4.81z"/>
                <path d="m214.62 4.83c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81s4.81 2.15 4.81 4.81z"/>
                <path d="m240.24 4.83c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.66 0 4.81 2.15 4.81 4.81z"/>
                <path d="m9.63 30.38c0 2.66-2.16 4.81-4.81 4.81-2.66 0.01-4.82-2.15-4.82-4.81s2.16-4.81 4.81-4.81c2.66 0 4.82 2.16 4.82 4.81z"/>
                <path d="m35.25 30.38c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.66 0 4.81 2.16 4.81 4.81z"/>
                <path d="m60.88 30.38c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81s4.81 2.16 4.81 4.81z"/>
                <path d="m86.5 30.38c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81s4.81 2.16 4.81 4.81z"/>
                <path d="m112.12 30.38c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.66 0 4.81 2.16 4.81 4.81z"/>
                <path d="m137.75 30.38c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81s4.81 2.16 4.81 4.81z"/>
                <circle cx="158.56" cy="30.38" r="4.81"/>
                <circle cx="184.18" cy="30.38" r="4.81"/>
                <circle cx="209.8" cy="30.38" r="4.81"/>
                <circle cx="235.43" cy="30.38" r="4.81"/>
                <path d="m9.63 55.94c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.82-2.16-4.82-4.81 0-2.66 2.16-4.81 4.81-4.81 2.66-0.01 4.82 2.15 4.82 4.81z"/>
                <path d="m35.25 55.94c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.66-0.01 4.81 2.15 4.81 4.81z"/>
                <path d="m60.88 55.94c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.65-0.01 4.81 2.15 4.81 4.81z"/>
                <path d="m86.5 55.94c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.65-0.01 4.81 2.15 4.81 4.81z"/>
                <path d="m112.12 55.94c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.66-0.01 4.81 2.15 4.81 4.81z"/>
                <path d="m137.75 55.94c0 2.66-2.16 4.81-4.81 4.81-2.66 0-4.81-2.16-4.81-4.81 0-2.66 2.16-4.81 4.81-4.81 2.65-0.01 4.81 2.15 4.81 4.81z"/>
                <circle cx="158.56" cy="55.94" r="4.81"/>
                <circle cx="184.18" cy="55.94" r="4.81"/>
                <circle cx="209.8" cy="55.94" r="4.81"/>
                <circle cx="235.43" cy="55.94" r="4.81"/>
            </svg>
        </figure>
        <!-- Shape Decoration END -->
        <div class="container">
            <div class="row g-0 d-flex align-items-center">
                <!-- Our Work Block -->
                <div class="col-sm-6">
                    <div class="text-center bg-primary-multiply position-relative overflow-hidden px-3 py-6 h-100" >
                        <h2 class="mb-3 display-6"><a class="text-white-stroke" href="/projects">{{ __('translate.our') }} {{ __('translate.work') }}</a></h2>
                        <a class="btn btn-line text-white mb-0" href="/projects">{{ __('translate.view_projects') }}</a>
                        <img class="bg-primary-multiply position-absolute top-50 start-50 translate-middle z-index-n9" src="assets/images/about/05.jpg" alt="">
                    </div>
                </div>
                <!-- Project Block -->
                <div class="col-sm-6">
                    <div class="text-center bg-dark px-3 py-6 h-100">
                        <h2 class="mb-3 display-6 text-white">{{ __('translate.have_project') }}?</h2>
                        <a class="btn btn-line text-white mb-0" href="/contact">{{ __('translate.lets_talk') }}</a>
                    </div>
                </div>
            </div><!-- row END -->
        </div>
    </section>
    <!-- =======================
    Action box END -->

    <!-- =======================
    Newsletter START-->
    <section class="bg-dark position-relative bg-dark-overlay-4">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Title -->
                <div class="col-sm-5">
                    <h2 class="display-6 text-white-stroke">{{ __('translate.latest_stories') }}</h2>
                </div>
                <!-- Content and input -->
                <div class="col-sm-6">
                    <p class="mt-3">{{ __('translate.latest_stories_desc') }}</p>
                    <form>
                        <div class="input-group">
                            <input class="form-control bg-white border-0" type="text" name="Newsletter" placeholder="Enter your email address">
                            <button type="button" class="btn btn-line btn-primary mb-0">{{ __('translate.subscribe') }}</button>
                        </div>
                    </form>
                </div>
            </div><!-- row END -->
        </div>
    </section>
    <!-- =======================
    Newsletter END-->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <!-- =======================
    Footer START -->
    <x-frontend.footer />
    <!-- =======================
    Footer END -->

    <!-- Custom cursor -->
    <div class="cursor-dot-outline"></div>
    <div class="cursor-dot"></div>

    <!-- Back to top -->
    <div class="back-top">
        <div class="scroll-line"></div>
        <span class="scoll-text">{{ __('translate.go_up') }}</span>
    </div>

    <!-- =======================
    JS libraries, plugins and custom scripts -->

    <x-frontend.scripts />

</body>
</html>
