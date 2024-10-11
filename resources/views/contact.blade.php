
<!DOCTYPE html>
<html lang="en" dir="rtl">
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
    <x-frontend.header2 />
    <!-- =======================
    Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Contact form and map START -->
    <section class="p-0 pb-4 pb-md-0 bg-dark position-relative">
        <div class="container">
            <div class="row g-0 justify-content-lg-between">
                <div class="col-md-6 bg-dark-start z-index-m9 position-relative h-md-800 d-flex align-items-center z-index-9">
                    <div class="position-relative py-5 pe-0 pe-md-6">
                        <h1 class="text-white-stroke">{{ __('translate.hi') }}!</h1>
                        <h6 class="text-white">{{ __('translate.contact_desc') }}... </h6>
                        <!-- Form START -->
                        <form class="contact-form form-dark form-line mt-5" id="contact-form" name="contactform" method="POST" action="assets/include/contact-action.php">
                            <!-- Main form -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- name -->
                                    <div class="mb-3 position-relative">
                                        <input required id="con-name" name="name" type="text" class="form-control" placeholder="{{ __('translate.name') }}">
                                        <span class="focus-border"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- email -->
                                    <div class="mb-3 position-relative">
                                        <input required id="con-email" name="email" type="email" class="form-control" placeholder="E-mail">
                                        <span class="focus-border"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!-- Subject -->
                                    <div class="mb-3 position-relative">
                                        <input required id="con-subject" name="subject" type="text" class="form-control" placeholder="{{ __('translate.subject') }}">
                                        <span class="focus-border"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!-- Message -->
                                    <div class="mb-3 position-relative">
                                        <textarea required id="con-message" name="message" cols="40" rows="6" class="form-control" placeholder="Message"></textarea>
                                        <span class="focus-border"></span>
                                    </div>
                                </div>
                                <!-- submit button -->
                                <div class="col-md-12 text-start"><button class="btn btn-primary" type="submit">{{ __('translate.send') }} Message</button></div>
                            </div>
                        </form>
                        <!-- Form END -->
                    </div>
                </div>
                <div class="col-md-6 col-md-full-right">
                    <!-- Google map -->
                    <div class="position-md-absolute end-0 top-0 w-100 h-400 h-md-800 bg-dark">
                        <iframe class="w-100 h-100 grayscale" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878428698!3d40.74076684379132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bf5c1654f3%3A0xc80f9cfce5383d5d!2sGoogle!5e0!3m2!1sen!2sin!4v1586000412513!5m2!1sen!2sin"  style="border:0;" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Contact form and map END -->

    <!-- =======================
    Contact info START -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Call -->
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex flex-row align-items-center mb-3">
                        <span class="text-primary display-8 me-3">
                            <i class="bi bi-headset"></i>
                        </span>
                        <h6 class="mt-2"><a href="#">+237 {{ active_setting()->contact->phone }}</a></h6>
                    </div>
                    <p>{{ __('translate.contact_desc_section_1') }}</p>
                </div>
                <!-- Skype -->
                <!-- Email -->
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex flex-row align-items-center mb-3">
                        <span class="text-primary display-8 me-3">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <h6 class="mt-2"><a href="#">{{ active_setting()->company_email }}</a></h6>
                    </div>
                    <p>{{ __('translate.contact_desc_section_2') }}</p>
                </div>
                <!-- Live chat -->
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex flex-row align-items-center mb-3">
                        <span class="text-primary display-8 me-3">
                            <i class="bi bi-person-plus"></i>
                        </span>
                        <h6 class="mt-2"><a href="#">{{ active_setting()->contact->linkedin }}</a></h6>
                    </div>
                    <p>{{ __('translate.contact_desc_section_3') }}</p>
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Contact info END -->

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
