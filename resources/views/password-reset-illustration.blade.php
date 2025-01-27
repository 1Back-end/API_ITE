<!doctype html>
<html lang="en">
  <x-frontend.head />
  <body>

    <!-- CONTENT -->
    <section class="section-border border-primary">
      <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center gx-0 min-vh-100">
          <div class="col-8 col-md-6 col-lg-7 offset-md-1 order-md-2 mt-auto mt-md-0 pt-8 pb-4 py-md-11">

            <!-- Image -->
            <img src="assets/img/illustrations/illustration-4.png" alt="..." class="img-fluid">

          </div>
          <div class="col-12 col-md-5 col-lg-4 order-md-1 mb-auto mb-md-0 pb-8 py-md-11">

            <!-- Heading -->
            <h1 class="mb-0 fw-bold text-center">
              Password reset
            </h1>

            <!-- Text -->
            <p class="mb-6 text-center text-muted">
              Enter your email to reset your password.
            </p>

            <!-- Form -->
            <form class="mb-6">

              <!-- Email -->
              <div class="form-group">
                <label class="form-label" for="email">
                  Email Address
                </label>
                <input type="email" class="form-control" id="email" placeholder="name@address.com">
              </div>

              <!-- Submit -->
              <button class="btn w-100 btn-primary" type="submit">
                Reset Password
              </button>

            </form>

            <!-- Text -->
            <p class="mb-0 fs-sm text-center text-muted">
              Remember your password? <a href="signin-illustration.html">Log in</a>.
            </p>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- JAVASCRIPT -->
    <x-frontend.scripts />

  </body>
</html>
