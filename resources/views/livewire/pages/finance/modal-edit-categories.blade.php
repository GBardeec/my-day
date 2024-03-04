<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Редактирование категорий</h5>
    </div>
    <div class="modal-body">
        <div>
            @php
               $categories = collect($this->categories);
            @endphp
            <strong>Расходы:</strong>
            @forelse($categories->where('type', \App\Models\BudgetCategory::EXPENSE) as $id => $category)
                <div class="input-group mt-1">
                    <input type="text" class="form-control" aria-label="Recipient's username"
                           aria-describedby="basic-addon2" wire:model="categories.{{ $id }}.name">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button" wire:click="update('{{$id}}')">
                            <i class="fa-solid fa-check fa-4xs" style="color: #3d7f4f;"></i>
                        </button>
                        <button class="btn btn-outline-danger" type="button" wire:click="delete('{{$id}}')">
                            <i class="fa-solid fa-trash fa-4xs" style="color: #833434;"></i>
                        </button>
                    </div>
                </div>
            @empty
                <p>Данные отсутствуют</p>
            @endforelse
            <a class="btn bg-body-secondary mt-3" wire:click="create({{ \App\Models\BudgetCategory::EXPENSE }})">
                <i class="fa-solid fa-plus" style="color: #000000;"></i>
                Добавить
            </a>
        </div>
        <div class="mt-3">
            <strong>Доходы:</strong>
            @forelse($categories->where('type', \App\Models\BudgetCategory::INCOME) as $id => $category)
                <div class="input-group mt-1">
                    <input type="text" class="form-control" aria-label="Recipient's username"
                           aria-describedby="basic-addon2" wire:model="categories.{{$id}}.name">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button" wire:click="update('{{$id}}')">
                            <i class="fa-solid fa-check fa-4xs" style="color: #3d7f4f;"></i>
                        </button>
                        <button class="btn btn-outline-danger" type="button" wire:click="delete('{{$id}}')">
                            <i class="fa-solid fa-trash fa-4xs" style="color: #833434;"></i>
                        </button>
                    </div>
                </div>
            @empty
                <p>Данные отсутствуют</p>
            @endforelse
            <a class="btn bg-body-secondary mt-3" wire:click="create({{ \App\Models\BudgetCategory::INCOME }})">
                <i class="fa-solid fa-plus" style="color: #000000;"></i>
                Добавить
            </a>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-success">Сохранить</button>
    </div>
</div>
