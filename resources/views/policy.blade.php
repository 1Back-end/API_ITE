
<!DOCTYPE html>
<html lang="en" >
    <x-frontend.head />

<body>

    <!-- Pre loader -->
    <x-frontend.loader />

    <!-- =======================
    Header START -->
    <x-frontend.header2 />
    <!-- =======================
    Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Inner intro START -->
    <section class="bg-dark pattern-overlay-3 position-relative">
        <div class="container">
            <div class="d-flex justify-content-end">
                <span>
                    <!-- Title -->
                    <h1 class="text-white-stroke display-5">{{ sesion('lang') == 'en'?pages('PRIVACY-POLICY')->title->en:pages('PRIVACY-POLICY')->title->fr }}</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/">{{ __('translate.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ sesion('lang') == 'en'?pages('PRIVACY-POLICY')->title->en:pages('PRIVACY-POLICY')->title->fr }}</li>
                            <li class="breadcrumb-item active">{{ sesion('lang') == 'en'?pages('PRIVACY-POLICY')->title->en:pages('PRIVACY-POLICY')->title->fr }}</li>
                        </ol>
                    </nav>
                </span>
            </div>
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

    <!-- =======================
    Pricing START -->
    <section class="position-relative">
        <div class="container">
            <!-- Title -->
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2>{{ session('lang') == 'en'?pages('PRIVACY-POLICY')->sub_title->en:pages('PRIVACY-POLICY')->sub_title->fr }}</h2>
                </div>
            </div>
            {!! session('lang') == 'en'?pages('PRIVACY-POLICY')->description->en:pages('PRIVACY-POLICY')->description->fr !!}
        </div>
    </section>
    <!-- =======================
    Pricing END -->

    <!-- =======================
    Pricing Features START -->
    <!-- =======================
    Pricing Features END -->
    <!-- =======================
    Clients START -->

    <!-- =======================
    Clients END -->

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
