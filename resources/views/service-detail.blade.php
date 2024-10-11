
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
            <div class="row  mt-5">
                <div class="col-md-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ __('translate.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="careers.html">Services</a></li>
                            <li class="breadcrumb-item active">{{ $service->name->en }}</li>
                        </ol>
                    </nav>
                    <h2 class="display-6">{{ $service->name->en }}</h2>
                    <p class="lead">{{ $service->short_description->en }}.</p>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

    <!-- =======================
    About service START -->
    <section class="pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img class="w-100" src="{{ $service->img != null ?asset('company-services/'.$service->img):asset('backend/img/1618x1010/img1.jpg') }}" alt="Image">
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                    <h3>{{ __('translate.about') }} {{ session('lang') == 'en'?$service->name->en:$service->name->fr }}</h3>
                    <div class="">
                        {!! session('lang') == 'en'?$service->description->en:$service->description->fr !!}
                    </div>
                    <div class="row">
                        <!-- Features -->
                        <div class="col-lg-6">
                            <ul class="list-group list-group-borderless list-group-icon-primary-bg">
                                @foreach($service->categories as $category)
                                    @if($loop->iteration<=3)
                                    <li class="list-group-item"><i class="fas fa-check"></i>{{ session('lang') == 'en'?$category->name->en:$category->name->fr }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- Features -->
                        <div class="col-lg-6">
                            <ul class="list-group list-group-borderless list-group-icon-primary-bg">
                                @foreach($service->categories as $category)
                                    @if($loop->iteration >3 && $loop->iteration <=6)
                                    <li class="list-group-item"><i class="fas fa-check"></i>{{ session('lang') == 'en'?$category->name->en:$category->name->fr }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <a href="#" class="btn btn-dark btn-line mt-4">{{ __('translate.get_estimate') }}</a>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    About service End -->

    <!-- =======================
    Our Approach START -->
    <section class="pt-3">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="mb-4">{{ __('translate.our_approach') }}</h2>
                </div>
            </div>
            @foreach($service->approaches as $approach)
            <!-- Research and Strategy -->
            <div class="row mb-5">
                <div class="col-lg-4">
                    <h3 class="mb-4">{{ __('translate.step') }} {{ $loop->iteration }}</h3>
                </div>
                <div class="col-lg-8">
                    {!! $approach->approach_description !!}
                </div>
            </div> <!-- Row END -->
            @endforeach
        </div>
    </section>
    <!-- =======================
    Our Approach END -->

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
                            <h3 class="mb-0">{{ __('translate.contact_desc') }}?</h3>
                            <p class="lead mb-0">{{ __('translate.contact_desc_section_1') }}</p>
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
