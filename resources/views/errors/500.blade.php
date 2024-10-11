
<!DOCTYPE html>
<html lang="en">
<x-frontend.head />

<body>

<!-- Pre loader -->
<x-frontend.loader />

<x-frontend.header2 />
<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================
Inner intro START -->
<section class="text-center">
	<div class="container">
		<div class="row">
			<!-- Inner intro title -->
			<div class="col-12 my-5">
				<h1 class="display-2 text-dark-stroke text-primary-shadow">500!</h1>
				<h3>Server Error</h3>
				<p>Oops! The server faced a problem, we are working to fix this.</p>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Inner intro END -->

<!-- =======================
Links START -->
<section class="bg-light">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<!-- item -->
			<div class="col-md-4 col-lg-3">
				<a href="/" class="bg-white d-block text-center p-3 mb-30 line-draw-animation">
					<div class="line-draw-inner">
						<span class="text-primary display-8"><i class="bi bi-house"></i></span>
						<h5 class="my-2">Back to home</h5>
					</div>
				</a>
			</div>
			<!-- item -->
			<div class="col-md-4 col-lg-3">
				<a href="/projects" class="bg-white d-block text-center p-3 mb-30 line-draw-animation">
					<div class="line-draw-inner">
						<span class="text-primary display-8"><i class="bi bi-briefcase"></i></span>
						<h5 class="my-2">View our works</h5>
					</div>
				</a>
			</div>
			<!-- item -->
			<div class="col-md-4 col-lg-3">
				<a href="/contact" class="bg-white d-block text-center p-3 mb-30 line-draw-animation">
					<div class="line-draw-inner">
						<span class="text-primary display-8"><i class="bi bi-info-square"></i></span>
						<h5 class="my-2">Contact us</h5>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- =======================
Links END -->

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
	<span class="scoll-text">Go Up</span>
</div>

<!-- =======================
JS libraries, plugins and custom scripts -->
<x-frontend.scripts />
</body>
</html>
