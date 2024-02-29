<div>
    <h3 class="mb-2">
        МоиФинансы
    </h3>

    <div class="col-lg-12">
        <div class="row mb-3">
            <a class="btn btn-outline-success col-6"
               wire:click="$dispatch('showModal', {data: {'alias' : 'pages.finance.modal-add-categories'}})">
                Добавить свою категорию
            </a>
            <a class="btn btn-outline-success col-6"
               wire:click="$dispatch('showModal', {data: {'alias' : 'pages.finance.modal-edit-categories', 'params': {type: 'expense'}}})">
                Изменить свои категории
            </a>
        </div>
        <div class="row">
            <div class=" col-6 col-lg-6">
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
            <div class="col-6 col-lg-6">
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
    </div>
</div>
