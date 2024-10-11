
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
                    <h1 class="text-white-stroke display-5">{{ session('lang') == 'en'?pages('PRICING')->title->en:pages('PRICING')->title->fr }}</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('translate.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('translate.pricing_packages') }}</li>
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
                    <h2>{{ session('lang') == 'en'?pages('PRICING')->sub_title->en:pages('PRICING')->sub_title->fr }}</h2>
                </div>
            </div>
            <!-- Pricing -->
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        @foreach($packages as $package)
                        <!-- Pricing plan START -->
                        <div class="col-md-4">
                            <div class="card text-center mb-5">
                                <!-- Card Header -->
                                <div class="card-header">
                                    <h4 class="mb-3">{{ $package->name->en }}</h4>
                                    <h4 class="display-6 mb-2 text-dark-stroke text-{{($loop->iteration % 2 == 0) ?'light':'primary' }}-shadow">XAF {{ $package->amount }}</h4>
                                    <span class="d-block">/ {{ __('translate.per_month') }}</span>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        @foreach($package->advantages as $advantage)
                                        @if($loop->iteration < 9)
                                        <li class="mb-3"> <i class="fas fa-check"></i>{{ session('lang') == 'en'?$advantage->advantage->en:$advantage->advantage->fr }}</li>
                                        @endif
                                        @endforeach
                                        @if(sizeof($package->advantages) > 8)
                                        <li class="mb-3"> <i class="fas fa-check"></i>{{ __('translate.many_more') }}</li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer text-center">
                                    <button type="button" class="btn btn-{{($loop->iteration % 2 == 0) ?'dark':'primary' }}">{{ __('translate.get_started') }}</button>
                                </div>
                            </div>
                        </div>
                        <!-- Pricing plan END -->
                        @endforeach

                        {{-- <!-- Pricing plan START -->
                        <div class="col-md-4 position-relative">
                            <div class="card text-center mb-5">
                                <!-- Card Header -->
                                <div class="card-header">
                                    <h4 class="mb-3">Business Plan</h4>
                                    <h4 class="display-6 mb-2 text-dark-stroke text-primary-shadow">$50</h4>
                                    <span class="d-block">/ Per Month</span>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li class="mb-3">Up to 10 users monthly</li>
                                        <li class="mb-3"><del class="text-secondary">Unlimited updates</del></li>
                                        <li class="mb-3">Free 15 host & domain</li>
                                        <li class="mb-3">24/7 dedicated Support </li>
                                    </ul>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer text-center">
                                    <button type="button" class="btn btn-primary">Get Started</button>
                                </div>
                            </div>
                        </div>
                        <!-- Pricing plan END -->
                        <!-- Pricing plan START -->
                        <div class="col-md-4">
                            <div class="card text-center mb-5">
                                <!-- Card Header -->
                                <div class="card-header">
                                    <h4 class="mb-3">Ultimate Plan</h4>
                                    <h4 class="display-6 mb-2 text-dark-stroke text-light-shadow">$99</h4>
                                    <span class="d-block">/ Per Month</span>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li class="mb-3">Up to 50 users monthly</li>
                                        <li class="mb-3">Unlimited updates</li>
                                        <li class="mb-3">Free host & domain included</li>
                                        <li class="mb-3">24/7 dedicated Support </li>
                                    </ul>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer text-center">
                                    <button type="button" class="btn btn-dark">Get Started</button>
                                </div>
                            </div>
                        </div>
                        <!-- Pricing plan END --> --}}
                    </div>
                </div>
            </div><!--  Row END -->
            <!-- Enterprise plan -->
            <div class="row">
                <div class="col-sm-12 mt-0 mt-md-4">
                    <div class="text-center">
                        <h4>{{ __('translate.pricing_custom_plan') }}! </h4>
                        <p class="m-0">{{ __('translate.pricing_custom_plan_desc') }}.</p>
                        <a class="btn text-dark btn-line mt-4" href="#!">{{ __('translate.contact_us') }}!</a>
                    </div>
                </div>
            </div>
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
