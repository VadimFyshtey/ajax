<?php include_once(ROOT . '/views/layouts/header.php') ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php include_once(ROOT . '/views/layouts/aside.php') ?>

        <div class="col-lg-9 ">
            <br/>
            <div id="load"></div>
            <div class="sort1">
                <strong>Сортировка: </strong>
                По цене: <input type="radio" name="sort" id="1"/>
                По алфавиту: <input type="radio" name="sort" id="2"/>
                По дате: <input type="radio" name="sort" id="3"/>
            </div>
            <div id="load"></div>
            <div class="row">
                <?php foreach ($categoryProducts as $product): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?= $product['name'] ?>
                                </h4>
                                <h5><?= $product['price'] ?> грн.</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                <small><?= $product['date'] ?></small>
                            </div>
                            <div class="card-footer">
                                <h5 class="text-muted buy"><a data-toggle="modal" data-target="#myModal" data-id="<?= $product['id'] ?>" href="#">Купить</a></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php include_once(ROOT . '/views/site/modal.php') ?>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php include_once(ROOT . '/views/layouts/footer.php') ?>

