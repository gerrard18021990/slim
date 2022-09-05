<form method="post" action="/create-product">
    <div class="row form-group">
        <div class="col-sm-3">
            Название
        </div>
        <div class="col-sm-9">
            <input type="text" name="<?= get_class($product); ?>[name]" class="form-control">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-3">
            Стоимость
        </div>
        <div class="col-sm-9">
            <input type="text" name="<?= get_class($product); ?>[price]" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>