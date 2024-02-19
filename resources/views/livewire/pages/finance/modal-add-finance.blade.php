<div class="modal-body">
    <p>
        <strong>Добавить {{$type === 'expense' ? 'расходы' : 'доходы'}}</strong>
    </p>
    <form >
        <div class="row">
            <div class="form-group m-0">
                <x-inputs.basic-input wire:model="date" type="date" text="Дата"/>
            </div>

            <div class="form-group m-0">
                <x-inputs.basic-input wire:model="sum" type="text" text="Категория"/>
            </div>

            <div class="form-group m-0">
                <x-inputs.basic-input wire:model="sum" type="text" text="Cумма"/>
            </div>


            <div class="col-lg-12 text-center mt-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="submit" id="downloadButton" class="btn btn-outline-success">Выбрать</button>
            </div>
        </div>
    </form>
</div>
