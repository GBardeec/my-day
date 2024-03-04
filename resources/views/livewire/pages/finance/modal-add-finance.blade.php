<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Добавить {{$type === 'expense' ? 'расходы' : 'доходы'}}</h5>
    </div>
    <div class="modal-body">
        <div class="form-group m-0">
            <x-inputs.basic-input wire:model="date" type="date" text="Дата" required/>
        </div>

        @foreach($this->values as $key => $value)
            @if(count($this->values) > 1 && $key !== 0)
                <hr class="mt-3 mb-2"/>
            @endif

            <div class="row">
                <div class="col-md-6 form-group m-0">
                    <x-inputs.basic-input wire:model="values.{{ $key }}.amount" type="number" text="Значение" required/>
                </div>

                <div class="col-md-6 form-group m-0">
                    <x-inputs.select text="Категория" wire:model="values.{{ $key }}.budget_category" :options="$this->getCategories" required/>
                </div>
            </div>
        @endforeach

        <a class="btn bg-body-secondary mt-3 d-block" wire:click="add">
            <i class="fa-solid fa-plus" style="color: #000000;"></i>
            Добавить значение
        </a>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-success" wire:click="create">Сохранить</button>
    </div>
</div>
