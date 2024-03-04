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
                    @forelse($this->getBudgetExpense()->values ?? [] as $budget)
                        <div class="d-flex justify-content-between border-bottom">
                            <span class="m-0">
                                {{$z . '. ' . $budget['budget_category'] . ' - ' . $budget['amount'] . ' руб.'}}
                            </span>
                            <span wire>
                                <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                            </span>
                        </div>

                        @php
                            $z++;
                            $arrayForSumExpenses[] = $budget['amount'];
                        @endphp
                    @empty
                        Данные отсутствуют
                    @endforelse

                    @if($arrayForSumExpenses)
                        <div class="mt-3">
                            Итог: <strong> {{ array_sum($arrayForSumExpenses) }} </strong> руб.
                        </div>
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
                    @forelse($this->getBudgetIncome()->values ?? [] as $key => $budget)
                        <div class="d-flex justify-content-between border-bottom">
                            <span class="m-0">
                                {{$z . '. ' . $budget['budget_category'] . ' - ' . $budget['amount'] . ' руб.'}}
                            </span>
                            <span>
                                <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                            </span>
                        </div>
                        @php
                            $z++;
                            $arrayForSumIncomes[] = $budget['amount'];
                        @endphp
                    @empty
                        Данные отсутствуют
                    @endforelse

                    @if($arrayForSumIncomes)
                        <div class="mt-2">
                            Итог: <strong> {{ array_sum($arrayForSumIncomes) }} </strong> руб.
                        </div>
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
