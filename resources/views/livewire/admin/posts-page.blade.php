<div>
    <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <section class="vh-100" style="background-color: #2779e2;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif (session()->has('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="col-xl-9">
                    <h1 class="text-white mb-4">Post Listesi</h1>
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <ul class="list-group list-group-flush" wire:sortable="updateTaskOrder">
                            @foreach ($posts as $post)
                            <li class="list-group-item text-center" wire:sortable.item="{{ $post->position }}"
                                wire:key="task-{{ $post->position }}">
                                <div class="p-1" wire:sortable.handle>
                                    <a target="_blank" href="{{route('post',[$post->slug])}}">{{ $post->title }}</a>
                                    @foreach ($post->post_images()->orderBy('position')->get() as $image)
                                    <img width="50" src="{{ url('/').'/storage' . $image->image }}">
                                    @endforeach
                                    <div class="float-end">
                                        @if ($post->visibility)
                                            <button type="button" wire:click="hideShow({{ $post->id }})" class="btn btn-info">
                                                Gizle
                                            </button>
                                            @else
                                            <button type="button" wire:click="hideShow({{ $post->id }})" class="btn btn-success">
                                                Göster
                                            </button>
                                        @endif
                                        <button type="button" wire:click="edit({{ $post->id }})" class="btn btn-warning">
                                            Değiştir
                                        </button>
                                        <button type="button" wire:click="delete({{ $post->id }})" class="btn btn-danger">
                                            Sil
                                        </button>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
