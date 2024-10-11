
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
    <section class="bg-dark pattern-overlay-4 position-relative text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Title -->
                    @if(session('lang') == 'en')
                    <h1 class="text-white-stroke display-5">{{ pages('FAQ')->title->en }}</h1>
                    <p class="lead">{{ pages('FAQ')->sub_title->en }}.</p>
                    @else
                    <h1 class="text-white-stroke display-5">{{ pages('FAQ')->title->fr }}</h1>
                    <p class="lead">{{ pages('FAQ')->sub_title->fr }}.</p>
                    @endif
                    <!-- Breadcrumb -->
                    {{-- <nav class="d-flex justify-content-center">
                        <ol class="breadcrumb breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Frequently Asked Questions</li>
                        </ol>
                    </nav> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Inner intro END -->

    <!-- =======================
    Faqs START -->
    <section class="pb-3">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left START -->
                <div class="col-md-8 col-lg-7 mb-5">

                    <!-- General FAQ START -->
                    <h3 class="mb-4">{{ __('translate.general_faq') }}</h3>
                    <div class="accordion accordion-icon" id="accordiongeneralfaq">
                        @foreach($faqs as $faq)
                        <div class="accordion-item">
                          <h5 class="accordion-header" id="heading-{{ $faq->id }}">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}" aria-expanded="true" aria-controls="collapse-1">
                              {{ session('lang') == 'en'?$faq->question->en : $faq->question->fr }}
                            </button>
                          </h5>
                          <div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse show" aria-labelledby="heading-1" data-bs-parent="#accordiongeneralfaq">
                            <div class="accordion-body">
                              {!! session('lang') == 'en'?$faq->answer->en : $faq->answer->fr!!}
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- General FAQ END -->
                </div>
                <!-- Left END -->

                <!-- Right START -->
                <div class="col-md-4">
                    <h4 class="mb-5">{{ __('translate.didnt_find') }}</h4>
                    <!-- Call -->
                    <div class="mb-4 d-flex">
                      <div class="text-primary display-8 me-3">
                            <i class="bi bi-headset fa-fw"></i>
                        </div>
                      <div>
                          <h6><a href="#">+237 {{ active_setting()->contact->phone }}</a></h6>
                            <p>{{ __('translate.contact_desc_section_1') }}</p>
                      </div>
                    </div>

                    <!-- Skype -->

                    <!-- Email -->
                    <div class="mb-4 d-flex">
                      <div class="text-primary display-8 me-3">
                            <i class="bi bi-envelope fa-fw"></i>
                        </div>
                      <div>
                          <h6><a href="#">{{ active_setting()->company_email }}</a></h6>
                            <p>{{ __('translate.contact_desc_section_2') }}</p>
                      </div>
                    </div>

                    <!-- Live chat -->
                    <div class="mb-4 d-flex">
                      <div class="text-primary display-8 me-3">
                            <i class="bi bi-person-plus fa-fw"></i>
                        </div>
                      <div>
                          <h6><a href="#">{{ active_setting()->company_email }}</a></h6>
                            <p>{{ __('translate.contact_desc_section_3') }}</p>
                      </div>
                    </div>

                </div>
                <!-- Right END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Faqs END -->

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
