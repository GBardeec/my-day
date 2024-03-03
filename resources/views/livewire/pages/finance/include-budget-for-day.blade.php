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
                        <p class="m-0">{{$z . '. ' . $budget['budget_category'] . ' - ' . $budget['amount'] . ' руб.'}}</p>

                        @php
                            $z++;
                            $arrayForSumExpenses[] = $budget['amount'];
                        @endphp
                    @empty
                        Данные отсутствуют
                    @endforelse

                    @if($arrayForSumExpenses)
                        <strong class="mt-3">
                            Итог: {{ array_sum($arrayForSumExpenses) }} руб.
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
                        <p class="m-0">{{$z . '. ' . $budget['budget_category'] . ' - ' . $budget['amount'] . ' руб.'}}</p>

                        @php
                            $z++;
                            $arrayForSumIncomes[] = $budget['amount'];
                        @endphp
                    @empty
                        Данные отсутствуют
                    @endforelse

                    @if($arrayForSumIncomes)
                        <strong class="mt-2">
                            Итог: {{ array_sum($arrayForSumIncomes) }}  руб.
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
