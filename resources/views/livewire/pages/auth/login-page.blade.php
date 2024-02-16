<div class="row justify-content-center align-items-center" style="height:70vh;">
    <form class="col-lg-6" wire:submit="login">
        <div>
            <h3 class="text-center mb-4">
                <b>Авторизация</b>
            </h3>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
            <input type="email" class="form-control" id="exampleInputEmail1" wire:model="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" wire:model="password">

            @error('email')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3 form-check d-flex justify-content-between">
            <div>
                <input type="checkbox" class="form-check-input" id="exampleCheck1" wire:model="is_remember">
                <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
            </div>
            <div>
                <a href="{{route('register')}}">
                    Зарегестрироваться
                </a>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </form>
</div>
</div>
