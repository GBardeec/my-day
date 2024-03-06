<div class="row">
    <div class="col-lg-6 col-xs-12 col-md-6 col-sm-12">
        <div class="card border-dark mb-3 ">
            <div class="card-header bg-transparent border-dark">
                Расходы
            </div>
            <div class="card-body text-dark">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                            <input type="date" wire:model.live="dateForExpense">
                    </h5>
                </div>
                <div class="card-text mt-1">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Значение</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $z = 1;
                            $arrayForSumExpenses = [];
                            $expenses = $this->getBudgetExpense();
                        @endphp
                        @forelse($expenses->values ?? [] as $key => $budget)
                            <tr>
                                <th scope="row">{{ $z }}</th>
                                <td>{{ $budget['budget_category'] }}</td>
                                <td>{{ $budget['amount'] }} руб</td>
                                <td wire:click="delete({{ $expenses['id'] }}, {{ $key }})">
                                    <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                </td>
                            </tr>
                            @php
                                $z++;
                                $arrayForSumExpenses[] = $budget['amount'];
                            @endphp
                        @empty
                            <tr>
                                <td colspan="4">Данные отсутствуют</td>
                            </tr>
                        @endforelse

                        @if($arrayForSumExpenses)
                            <tr>
                                <td colspan="4">Итог: <strong> {{ array_sum($arrayForSumExpenses) }} </strong> руб.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
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
                    <h5 class="card-title">
                        <input type="date" wire:model.live="dateForIncome">
                    </h5>
                </div>
                <div class="card-text mt-1">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Значение</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $z = 1;
                        $arrayForSumIncomes = [];
                        $incomes = $this->getBudgetIncome();
                        @endphp
                        @forelse($incomes->values ?? [] as $key => $budget)
                            <tr>
                                <th scope="row">{{ $z }}</th>
                                <td>{{ $budget['budget_category'] }}</td>
                                <td>{{ $budget['amount'] }} руб</td>
                                <td wire:click="delete({{ $incomes['id'] }}, {{ $key }})">
                                    <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                </td>
                            </tr>
                            @php
                                $z++;
                                $arrayForSumIncomes[] = $budget['amount'];
                            @endphp
                        @empty
                            <tr>
                                <td colspan="4">Данные отсутствуют</td>
                            </tr>
                        @endforelse

                        @if($arrayForSumIncomes)
                            <tr>
                                <td colspan="4">Итог: <strong> {{ array_sum($arrayForSumIncomes) }} </strong> руб.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
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
