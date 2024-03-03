<div class="row">
    <div class="col-lg-6 col-xs-12 col-md-6 col-sm-12">
        <div class="card border-dark mb-3">
            <div class="card-header bg-transparent border-dark">Расходы</div>
            <div class="card-body text-dark">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">С по</h5>
                </div>
                <div class="card-text mt-1">

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
