<div>
    <main id="main" data-aos="fade" data-aos-delay="1500">
    
        <!-- ======= End Page Header ======= -->
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>{{ $post->title }}</h2>
                    </div>
                </div>
            </div>
        </div><!-- End Page Header -->
    
        <!-- ======= Gallery Single Section ======= -->
        <section id="gallery-single" class="gallery-single">
            <div class="container">
    
                <div class="position-relative h-100">
                    <div class="slides-1 portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            @foreach ($current_images as $image)
                                <div class="swiper-slide">
                                    <img data-src="{{ url('/').'/storage'.$image->image }}" alt="{{ $post->title }}" class="swiper-lazy"/>
                                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
    
                </div>
    
                <div class="row justify-content-between gy-4 mt-4">
    
                    <div class="col">
                        <div class="portfolio-description">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
    
            </div>
        </section><!-- End Gallery Single Section -->
    
    </main><!-- End #main -->
</div>
