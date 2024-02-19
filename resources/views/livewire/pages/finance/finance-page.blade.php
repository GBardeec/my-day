<div>
    <h3 class="mb-2">
        МоиФинансы
    </h3>

    <div class="col-12">
        <div class="col-12 mb-3">
            <a class="btn btn-outline-success col-12"
               wire:click="$dispatch('showModal', {data: {'alias' : 'pages.finance.modal-add-categories', 'params': {type: 'expense'}}})">
                Добавить категорию
            </a>
        </div>
        <div class="row">
            <div class=" col-6 col-lg-6">
                <div class="card border-dark mb-3">
                    <div class="card-header bg-transparent border-dark">Расходы</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title">18 февраля 2024:</h5>
                        <p class="card-text">1. Обед - 350 руб.</p>
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
                        <h5 class="card-title">18 февраля 2024:</h5>
                        <p class="card-text">
                            1. Основная зарплата - 10 000 руб.
                        </p>
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
