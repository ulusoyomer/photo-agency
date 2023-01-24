<div>
    @livewireStyles
    <main id="main" data-aos="fade" data-aos-delay="1500" wire:ignore>
        <!-- ======= End Page Header ======= -->
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9 text-center">
                        <h2>Bize Ulaşın</h2>
                        <div>
                            {!! $settings->map !!}
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Header -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="row gy-4 justify-content-center">

                    <div class="col-lg-3">
                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Adres:</h4>
                                <p>{{ $settings->address }}</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3">
                        <a href="mailto:{{ $settings->email }}">
                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>E-posta:</h4>
                                    <p>{{ $settings->email }}</p>
                                </div>
                            </div>
                        </a>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3">
                        <a href="tel:{{ $settings->phone }}">
                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Telefon:</h4>
                                    <p>{{ $settings->phone }}</p>
                                </div>
                            </div>
                        </a>
                    </div><!-- End Info Item -->

                </div>

                <div class="row justify-content-center mt-4">

                    <div class="col-lg-9">
                        <form wire:submit.prevent="store" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input wire:model='name' type="text" name="name" class="form-control"
                                        id="name" placeholder="Ad Soyad" required>
                                    @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input wire:model='email' type="email" class="form-control" name="email"
                                        id="email" placeholder="E-posta" required>
                                    @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input wire:model='subject' type="text" class="form-control" name="subject"
                                    id="subject" placeholder="Konu" required>
                                @error('subject')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <textarea wire:model='message' class="form-control" name="message" rows="5" placeholder="Mesaj" required></textarea>
                                @error('message')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center"><button type="submit">
                                    Gönder
                                    <span wire:loading wire:target='store'>
                                        <div class="lds-dual-ring"></div>
                                    </span>
                                </button></div>
                        </form>
                        
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success">
                <strong class="me-auto text-light">Bildirim</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Mesajınız Alındı
            </div>
        </div>
    </div>
    @livewireScripts
    <script>
        window.addEventListener('success-message', event => {
            const toastLiveExample = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        })
    </script>
</div>
