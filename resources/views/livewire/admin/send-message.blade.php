<div>
    <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <section class="vh-100" style="background-color: #2779e2; min-height:92.95vh;">
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
                            <div class="accordion" id="accordionExample" wire:ignore>
                                @foreach ($messages as $message)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $message->id }}">
                                            <button wire:click="clear()" class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $message->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $message->id }}">
                                                @if ($message->read)
                                                    <div class="mx-1"><i class="bi bi-check2 text-success"></i></div>
                                                @endif
                                                <div class="mx-1">{{ $message->name }}</div>
                                                <div class="mx-1">{{ $message->email }}</div>
                                                <div class="mx-1">{{ $message->title }}</div>
                                                <div class="mx-1">{{ $message->created_at }}</div>
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $message->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $message->id }}"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div>
                                                    <div class="m-2">
                                                        {{ $message->message }}
                                                    </div>
                                                </div>
                                                @if (!$message->read)
                                                    <div>
                                                        <textarea placeholder="Cevap" wire:model='message' type="text" class="form-control form-control-lg" id="mcontent"
                                                            name="mcontent"></textarea>
                                                            <button type="button"
                                                            wire:click="send('{{ $message->email }}','{{ $message->name }}',{{ $message->id }})" class="btn btn-success mt-2 float-end">
                                                                Gönder
                                                            </button>
                                                            <div class="clearfix"></div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
