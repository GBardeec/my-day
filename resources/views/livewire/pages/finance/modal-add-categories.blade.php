<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Добавить категорию</h5>
    </div>
    <div class="modal-body">
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
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-success" wire:click="create">Сохранить</button>
    </div>
</div>
