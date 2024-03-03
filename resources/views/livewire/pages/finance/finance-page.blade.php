<div>
    <h3 class="mb-2">
        МоиФинансы
    </h3>

    <div class="col-12 col-lg-12 overflow-hidden">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <a class="btn btn-outline-secondary w-100"
                   wire:click="$dispatch('showModal', {data: {'alias' : 'pages.finance.modal-edit-categories', 'params': {type: 'expense'}}})">
                    <i class="fa-solid fa-gear" style="color: #000000;"></i>
                    Настроить категории
                </a>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-xs-12 col-sm-4 col-md-4 mb-3">
                <button type="button" class="btn {{ $budgetForDay ? 'btn-success' : 'btn-outline-success' }} w-100 btn-sm"
                        wire:click="setActiveVariable('budgetForDay')">Финансы за день
                </button>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 mb-3">
                <button type="button" class="btn {{ $budgetPlanning ? 'btn-success' : 'btn-outline-success' }} w-100 btn-sm"
                        wire:click="setActiveVariable('budgetPlanning')">Планирование
                </button>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 mb-3">
                <button type="button" class="btn {{ $totalBudget ? 'btn-success' : 'btn-outline-success' }} w-100 btn-sm"
                        wire:click="setActiveVariable('totalBudget')">Общий бюджет
                </button>
            </div>
        </div>

        @if($budgetForDay)
            <livewire:pages.finance.include-budget-for-day />
        @elseif($budgetPlanning)
            <livewire:pages.finance.include-budget-planning />
        @elseif($totalBudget)
            Для полного бюджета
        @endif
    </div>
</div>
