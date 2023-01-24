<div>
    
    <main id="main" data-aos="fade" data-aos-delay="1500">
        <!-- ======= End Page Header ======= -->
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Hakkımızda</h2>
                    </div>
                </div>
            </div>
        </div><!-- End Page Header -->
    
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
    
                <div class="row gy-4 justify-content-center">
                    <div class="col-lg-4">
                        <img src="{{ url('/').'/storage'.$settings->about_us_image }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-5 content">
                        <h2>{{ $settings->about_us_title }}</h2>
                        {!! $settings->about_us_text !!}
                    </div>
                </div>
    
            </div>
        </section><!-- End About Section -->
    
    </main><!-- End #main -->
    
</div>
