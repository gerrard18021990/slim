<a href="/create-product-form" class="btn btn-success">Create product</a>
<?php foreach ($products as $product) { ?>
    <div class="row" style="margin-top: 15px">
        <div class="col-sm-3"><?= $product->name; ?></div>
        <div class="col-sm-3"><?= $product->price; ?></div>
    </div>
<?php }