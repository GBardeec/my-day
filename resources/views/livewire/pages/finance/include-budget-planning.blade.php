<div class="row">
    <div class="col-lg-6 col-xs-12 col-md-6 col-sm-12">
        <div class="card border-dark mb-3">
            <div class="card-header bg-transparent border-dark">Расходы</div>
            <div class="card-body text-dark">
                @php
                    $expensePlans = $this->getExpensePlan;

                    $expensePlan = $this->selectedExpensePlanId
                        ? $expensePlans->where('id', $this->selectedExpensePlanId)->first()
                        : $expensePlans->first();

                    $otherExpensePlans = $this->selectedExpensePlanId
                        ? $expensePlans->where('id', '!=' ,$this->selectedExpensePlanId)->get()
                        : $expensePlans;
                @endphp
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">
                            С {{ $expensePlan->started_at->format('d.m') }}
                            по {{ $expensePlan->ended_at->format('d.m.Y') }}
                        </h5>
                    </div>
                    <div class="text-end">
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Маленькая кнопка
                            </button>
                            <ul class="dropdown-menu">
                                @forelse($otherExpensePlans as $otherPlan)
                                    <li wire:click="$set('selectedExpensePlanId', {{ $otherPlan->id }})">
                                        {{ $otherPlan->started_at->format('d.m') }}
                                        -
                                        {{ $otherPlan->ended_at->format('d.m.Y') }}
                                    </li>
                                @empty
                                    Вы еще не добавили другие периоды
                                @endforelse
                            </ul>
                        </div>
                    </div>
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
                            $arrayForSumExpense = [];
                        @endphp
                        @forelse($expensePlan->plans ?? [] as $key => $plan)
                            <tr>
                                <th scope="row">{{ $z }}</th>
                                <td>{{ $plan['budget_category_id'] }}</td>
                                <td>{{ $plan['amount'] }} руб</td>
                                <td wire:click="delete({{ $expensePlan->id }}, {{ $key }})">
                                    <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                </td>
                            </tr>
                            @php
                                $z++;
                                $arrayForSumExpense[] = $plan['amount'];
                            @endphp
                        @empty
                            <tr>
                                <td colspan="4">Данные отсутствуют</td>
                            </tr>
                        @endforelse

                        @if($arrayForSumExpense)
                            <tr>
                                <td colspan="4">Итог: <strong> {{ array_sum($arrayForSumExpense) }} </strong> руб.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-transparent border-dark">
                <a class="btn btn-outline-success btn-sm"
                   wire:click="$dispatch('showModal', {data: {'alias' : 'pages.finance.modal-add-budget-plans', 'params': {type: 'expense'}}})">
                    Добавить планы на расходы
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
                        С по
                    </h5>
                </div>
                <div class="card-text">

                </div>
            </div>
            <div class="card-footer bg-transparent border-dark">
                <a class="btn btn-outline-success btn-sm"
                   wire:click="$dispatch('showModal', {data: {'alias' : 'pages.finance.modal-add-budget-plans', 'params': {type: 'income'}}})">
                    Добавить планы на доходы
                </a>
            </div>
        </div>
    </div>
</div>
