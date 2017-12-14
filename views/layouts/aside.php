<div class="col-lg-3">

    <h3 class="my-4">Категории</h3>

    <div class="list-group">
        <div id="lod"></div>
        <?php foreach ($categories as $category): ?>
            <a data-id="<?= $category['id'] ?>" href="" class="categori list-group-item"><?= $category['name'] ?></a>
        <?php endforeach; ?>
    </div>

</div>