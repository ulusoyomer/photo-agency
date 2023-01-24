<div>
    <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <section class="vh-100" style="background-color: #2779e2;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-xl-9">

                    <h1 class="text-white mb-4">Yeni Post Oluştur</h1>

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <form wire:submit.prevent="store">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Başlık</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='title' id="title" name="title" type="text"
                                            class="form-control form-control-lg" />
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

                                        <h6 class="mb-0">İçerik</h6>
                                    </div>
                                    <div class="col-md-9 pe-5" wire:ignore>
                                        <textarea wire:model="content" name="content"></textarea>
                                        @error('content')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Resimler</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input wire:model="images" type="file" multiple>
                                        <div wire:loading wire:target="images">Yükleniyor ..</div>
                                        @if ($images)
                                            <div>
                                                Resim Önizlemesi :
                                            </div>
                                            <div>
                                                @foreach ($images as $key => $image)
                                                    <a href="{{ $image->temporaryUrl() }}" target="_blank"><img
                                                            width="50" src="{{ $image->temporaryUrl() }}"></a>
                                                    <button type="button" class="btn btn-danger"
                                                        wire:click="removeImage({{ $key }})">
                                                        Sil
                                                    </button>
                                                @endforeach
                                            </div>
                                        @endif
                                        @error('images')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="px-5 py-4">
                                    <div wire:loading.remove.delay.shorter wire:target="images">
                                        <button type="submit" class="btn btn-primary btn-lg float-end">Oluştur</button>
                                    </div>
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
            const editor = CKEDITOR.replace('content');
            editor.on('change', function(event) {
                @this.set('content', event.editor.getData());
            });
        });
    </script>
</div>
