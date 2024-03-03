<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Добавить планы на {{ $this->type == \App\Models\BudgetCategory::EXPENSE ? 'расходы' : 'доходы' }}</h5>
    </div>
    <div class="modal-body">
        <div class="form-group m-0">
            <x-inputs.basic-input wire:model="started_at" type="date" text="Дата начало периода"/>
        </div>
        <div class="form-group m-0">
            <x-inputs.basic-input wire:model="ended_at" type="date" text="Дата окончания периода"/>
        </div>

        @foreach($this->plans as $key => $plan)
            @if(count($this->plans) > 1 && $key !== 0)
                <hr class="mt-3 mb-2"/>
            @endif

            <div class="row">
                <div class="col-md-6 form-group m-0">
                    <x-inputs.basic-input wire:model="plans.{{ $key }}.amount" type="number" text="Значение" required/>
                </div>

                <div class="col-md-6 form-group m-0">
                    <x-inputs.select text="Категория" wire:model="plans.{{ $key }}.budget_category_id" :options="$this->getCategories" required/>
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
