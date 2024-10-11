
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
    <!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Inner intro START -->
    <section>
        <div class="container">
            <div class="row ">
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('translate.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="careers.html">{{ __('translate.product') }}</a></li>
                            <li class="breadcrumb-item active">{{ session('lang') == 'en'?$product->name->en:$product->name->fr }}</li>
                        </ol>
                    </nav>
                    <h2 class="display-6">{{ session('lang') == 'en'?$product->name->en:$product->name->fr }}</h2>
                    <p class="lead">{{ session('lang') == 'en'?$product->short_description->en:$product->short_description->fr }}.</p>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

    <!-- =======================
    About product START -->
    <section class="pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img class="w-100" src="{{ $product->img != null ?asset('company-products/'.$product->img):asset('backend/img/1618x1010/img1.jpg') }}" alt="Image">
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                    <h3>{{ __('translate.about') }} {{ session('lang') == 'en'?$product->name->en:$product->name->fr }}</h3>
                    <div class="">
                        {!! session('lang') == 'en'?$product->description->en:$product->description->fr !!}
                    </div>
                    <div class="row">
                        <!-- Features -->
                        <div class="col-lg-6">
                            <ul class="list-group list-group-borderless list-group-icon-primary-bg">
                                @foreach($product->categories as $category)
                                    @if($loop->iteration<=3)
                                    <li class="list-group-item"><i class="fas fa-check"></i>{{ session('lang') == 'en'?$category->name->en:$category->name->fr }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- Features -->
                        <div class="col-lg-6">
                            <ul class="list-group list-group-borderless list-group-icon-primary-bg">
                                @foreach($product->categories as $category)
                                    @if($loop->iteration >3 && $loop->iteration <=6)
                                    <li class="list-group-item"><i class="fas fa-check"></i>{{ session('lang') == 'en'?$category->name->en:$category->name->fr }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @if($product->url != null )
                    <a href="{{ $product->url }}" class="btn btn-dark btn-line mt-4" target="_blank">{{ __('translate.go2site') }}</a>
                    @else
                    <a href="#" class="btn btn-dark btn-line mt-4" target="_blank">{{ __('translate.get_estimate') }}</a>
                    @endif
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    About product End -->
    <!-- =======================
    Testimonials START -->
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-dark-overlay-6 rounded overflow-hidden px-3 px-md-5 py-5 py-md-8" style="background:url(assets/images/bg/05.jpg) no-repeat center center; background-size:cover;">
                        <div class="row position-relative">
                            <div class="col-lg-10 mx-auto">
                                <div class="tiny-slider">
                                    <div class="tiny-slider-inner" data-gutter="0" data-hoverpause="true" data-arrow="false" data-dots="false" data-items="1">
                                        @foreach($reviews as $review)

                                        <!-- Testimonial item -->
                                        <div class="item text-white-force text-center px-0 px-xl-5">
                                            <div class="avatar avatar-xl">
                                                <img class="avatar-img rounded-circle" src='{{ asset('review/logos/'.$review->logo) }}' onerror="src='{{ asset('backend/img/160x160/img1.jpg') }}'" alt="avatar">
                                            </div>
                                            <p class="lead font-alt fw-normal display-8 fw-normal">{{ $review->review }}</p>
                                            <h6 class=" text-white mb-0 mt-3">{{ $review->reviewer_name }}</h6>
                                            {{-- <span class="small">Software Developer</span> --}}
                                        </div>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div><!-- row END -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Testimonials END -->
    <!-- =======================
    Action box START -->
    <section>
        <div class="container">
            <div class="row justify-content-md-between align-items-center border p-4">
                <!-- About Title -->
                <div class="col-md-9 col-lg-7">
                    <div class="d-flex">
                        <i class="bi bi-patch-check text-primary display-6 me-3"></i>
                        <div>
                            <h3 class="mb-0">{{ __('translate.custom_product') }}?</h3>
                            <p class="lead mb-0">{{ __('translate.custom_product_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-md-end mt-4 mt-md-0">
                    <a href="#" class="btn btn-lg btn-line btn-primary">{{ __('translate.contact_us') }}</a>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Action box END -->

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
