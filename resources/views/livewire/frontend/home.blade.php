<div>
    <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade"
            data-aos-delay="1500">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>{{ $settings->home_title }}</h2>
                        <p>{{ $settings->home_text }}</p>
                        <a href="{{route('contact')}}" class="btn-get-started">Bize Ulaşın !</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Hero Section -->

        
        <main id="main" data-aos="fade" data-aos-delay="1500">
        
            <!-- ======= Gallery Section ======= -->
            <section id="gallery" class="gallery">
                <div class="container-fluid">
                    <div class="row gy-4 justify-content-center">
                        @foreach ($posts as $post)
                        @if ($post->visibility)
                        @php
                            $firstImage = $post->post_images()->orderBy('position')->first();
                            if ($firstImage) {
                                $firstImage = url('/').'/storage'.$firstImage->image;
                            }
                        @endphp
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="gallery-item h-100">
                                    <img src="{{ $firstImage }}" class="img-fluid" alt="{{ $post->slug }}">
                                    <div class="gallery-links d-flex align-items-center justify-content-center">
                                        <a href="{{ $firstImage }}" title="{{ $post->title }}" class="glightbox preview-link"><i
                                                class="bi bi-arrows-angle-expand"></i></a>
                                        <a href="{{ route('post',[$post->slug]) }}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Gallery Item -->
                        @endif
                        @endforeach
                        
            </section><!-- End Gallery Section -->
        
        </main>
        <!-- End #main -->
</div>
