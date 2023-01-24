<div>
    <section class="vh-100" style="background-color: #2779e2;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif (session()->has('message_error'))
                    <div class="alert alert-danger">
                        {{ session('message_error') }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-xl-9">

                    <h1 class="text-white mb-4">Admin Giriş</h1>

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">
                            <form wire:submit.prevent="login">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Kullanıcı Adı</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='name' id="name" name="name" type="text"
                                            class="form-control form-control-lg" />
                                        @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Parola</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">

                                        <input wire:model='password' type="password"
                                            class="form-control form-control-lg" id="password" name="password">
                                        @error('password')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="px-5 py-4">
                                    <button type="submit" class="btn btn-primary btn-lg float-end">Giriş</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
