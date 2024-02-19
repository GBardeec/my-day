<div class="modal-body">
    <p>
        <strong>Добавить категорию</strong>
    </p>
    <form wire:submit="create">
        <div class="row">
            <div class="form-group m-0">
                <x-inputs.basic-input wire:model="name" type="text" text="Название категории" placeholder="Например, лекарства" required/>
            </div>

            @error('name')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
            @enderror

            <div class="form-group m-0">
                <x-inputs.select text="Тип" wire:model="type" :options="['Расходы', 'Доходы']" required/>
            </div>

            @error('type')
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
            @enderror

            <div class="col-lg-12 text-center mt-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="submit" id="downloadButton" class="btn btn-outline-success">Выбрать</button>
            </div>
        </div>
    </form>
</div>
