<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Добавить {{$type === 'expense' ? 'расходы' : 'доходы'}}</h5>
    </div>
    <div class="modal-body">
        <div class="form-group m-0">
            <x-inputs.basic-input wire:model="date" type="date" text="Дата"/>
        </div>

        <div class="form-group m-0">
            <x-inputs.select text="Тип" wire:model="selectedCategory" :options="$this->categories" required/>
        </div>

        <div class="form-group m-0">
            <x-inputs.basic-input wire:model="amount" type="number" text="Значение"/>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-success" wire:click="create">Сохранить</button>
    </div>
</div>
