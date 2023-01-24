<div>
    <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <section  class="p-2" style="background-color: #2779e2;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @elseif (session()->has('message_error'))
                    <div class="alert alert-danger">
                        {{ session('message_error') }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-xl-9">

                    <h1 class="text-white mb-4">Site Ayarları</h1>

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <form wire:submit.prevent="store">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Ana Resim</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='mainImage' id="mainImage" name="image" type="file"
                                            class="form-control form-control-lg" />
                                            @if ($settings->site_image)
                                                <div class="mt-3 text-danger">
                                                    <img src="{{ url('/').'/storage'.$settings->site_image }}" width="100">
                                                    <i role="button" wire:click="removeSiteImage()" class="bi bi-trash-fill"></i>
                                                </div>
                                            @endif
                                        @error('mainImage')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Site Başlığı</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='title' type="text" class="form-control form-control-lg"
                                            id="title" name="title">
                                        @error('title')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Twitter</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='twitter' type="text" class="form-control form-control-lg"
                                            id="twitter" name="twitter">
                                        @error('twitter')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Facebook</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='facebook' type="text" class="form-control form-control-lg"
                                            id="facebook" name="facebook">
                                        @error('facebook')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Instagram</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='instagram' type="text"
                                            class="form-control form-control-lg" id="instagram" name="instagram">
                                        @error('instagram')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Linkedin</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='linkedin' type="text" class="form-control form-control-lg"
                                            id="linkedin" name="linkedin">
                                        @error('linkedin')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Youtube</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='youtube' type="text" class="form-control form-control-lg"
                                            id="youtube" name="youtube">
                                        @error('youtube')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Footer</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='footer' type="text"
                                            class="form-control form-control-lg" id="footer" name="footer">
                                        @error('footer')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Ana Sayfa Başlığı</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='mtitle' type="text"
                                            class="form-control form-control-lg" id="mtitle" name="mtitle">
                                        @error('mtitle')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Ana Sayfa Metin</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <textarea wire:model='mcontent' type="text" class="form-control form-control-lg" id="mcontent" name="mcontent"></textarea>
                                        @error('mcontent')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Hakkımızda Resim</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='aboutImage' id="aboutImage" name="aboutImage" type="file"
                                            class="form-control form-control-lg" />
                                            @if ($settings->about_us_image)
                                                <div class="mt-3 text-danger">
                                                    <img src="{{ url('/').'/storage'.$settings->about_us_image }}" width="100">
                                                    <i role="button" wire:click="removeAboutImage()" class="bi bi-trash-fill"></i>
                                                </div>
                                            @endif
                                        @error('aboutImage')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">
                                
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                
                                        <h6 class="mb-0">Hakkımızda Başlık</h6>
                                
                                    </div>
                                    <div class="col-md-9 pe-5">
                                
                                        <input wire:model='atitle' type="text" class="form-control form-control-lg" id="atitle" name="atitle">
                                        @error('atitle')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">
                                
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                
                                        <h6 class="mb-0">Hakkımızda Metin</h6>
                                    </div>
                                    <div wire:ignore class="col-md-9 pe-5" wire:ignore>
                                        <textarea wire:model="atext" name="atext"></textarea>
                                        @error('atext')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">
                                
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                
                                        <h6 class="mb-0">Adres</h6>
                                
                                    </div>
                                    <div class="col-md-9 pe-5">
                                
                                        <input wire:model='address' type="text" class="form-control form-control-lg" id="address" name="address">
                                        @error('address')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">
                                
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                
                                        <h6 class="mb-0">Email</h6>
                                
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input wire:model='email' type="text" class="form-control form-control-lg" id="email" name="email">
                                        @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">
                                
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                
                                        <h6 class="mb-0">Telefon</h6>
                                
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input wire:model='call' type="text" class="form-control form-control-lg" id="call" name="call">
                                        @error('call')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                
                                        <h6 class="mb-0">Harita</h6>
                                
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea wire:model='googleMap' type="text" class="form-control form-control-lg" id="googleMap" name="googleMap">
                                        </textarea>
                                        @error('googleMap')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="px-5 py-4">
                                    <button type="submit" class="btn btn-primary btn-lg float-end">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
                const editor = CKEDITOR.replace('atext');
                editor.on('change', function(event) {
                    @this.set('atext', event.editor.getData());
                });
            });
    </script>
</div>
