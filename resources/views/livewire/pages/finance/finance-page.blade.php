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
                <button type="button" class="btn btn-outline-success w-100 btn-sm"
                        wire:click="setActiveVariable('budgetForDay')">Финансы за день
                </button>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 mb-3">
                <button type="button" class="btn btn-outline-success w-100 btn-sm"
                        wire:click="setActiveVariable('budgetPlanning')">Планирование
                </button>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 mb-3">
                <button type="button" class="btn btn-outline-success w-100 btn-sm"
                        wire:click="setActiveVariable('totalBudget')">Общий бюджет
                </button>
            </div>
        </div>

        @if($budgetForDay)
            <div class="row">
                <div class="col-lg-6 col-xs-12 col-md-6 col-sm-12">
                    <div class="card border-dark mb-3">
                        <div class="card-header bg-transparent border-dark">Расходы</div>
                        <div class="card-body text-dark">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{Carbon\Carbon::parse($dateForExpense)->format('d.m.Y')}}</h5>
                                <input type="date" wire:model.live="dateForExpense">
                            </div>
                            <div class="card-text mt-1">
                                @php
                                    $z = 1;
                                    $arrayForSumExpenses = [];
                                @endphp
                                @forelse($this->getBudgetExpense as $budget)
                                    <p class="m-0">{{$z . '. ' . $budget->budgetCategory->name . ' - ' . $budget->amount . ' руб.'}}</p>

                                    @php
                                        $z++;
                                        $arrayForSumExpenses[] = $budget->amount;
                                    @endphp
                                @empty
                                    Данные отсутствуют
                                @endforelse

                                @if($arrayForSumExpenses)
                                    <strong class="mt-3">
                                        Итог: {{array_sum($arrayForSumExpenses)}}
                                    </strong>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-dark">
                            <a class="btn btn-outline-success btn-sm"
                               wire:click="$dispatch('showModal', {data: {'alias' : 'pages.finance.modal-add-finance', 'params': {type: 'expense'}}})">
                                Добавить расходы
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12 col-md-6 col-sm-12">
                    <div class="card border-dark mb-3">
                        <div class="card-header bg-transparent border-dark">Доходы</div>
                        <div class="card-body text-dark">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{Carbon\Carbon::parse($dateForIncome)->format('d.m.Y')}}</h5>
                                <input type="date" wire:model.live="dateForIncome">
                            </div>
                            <div class="card-text">
                                @php
                                    $z = 1;
                                    $arrayForSumIncomes = [];
                                @endphp
                                @forelse($this->getBudgetIncome as $budget)
                                    <p class="m-0">{{$z . '. ' . $budget->budgetCategory->name . ' - ' . $budget->amount . ' руб.' }}</p>

                                    @php
                                        $z++;
                                        $arrayForSumIncomes[] = $budget->amount;
                                    @endphp
                                @empty
                                    Данные отсутствуют
                                @endforelse

                                @if($arrayForSumIncomes)
                                    <strong class="mt-2">
                                        Итог: {{array_sum($arrayForSumIncomes)}}
                                    </strong>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-dark">
                            <a class="btn btn-outline-success btn-sm"
                               wire:click="$dispatch('showModal', {data: {'alias' : 'pages.finance.modal-add-finance', 'params': {type: 'income'}}})">
                                Добавить доходы
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($budgetPlanning)
            Для плана
        @elseif($totalBudget)
            Для полного бюджета
        @endif
    </div>
</div>
