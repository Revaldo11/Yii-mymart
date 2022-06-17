<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Produk</h1>
        <p class="lead">Daftar Produk</p>
    </div>

    <div class="body-content">
        <div class="row">
            <?php
            foreach ($model->items as $item) {
            ?>
                <div class="col-lg-4">
                    <?= Html::img('@web/uploads/' . $item->img_url, ['class' => 'img-thumbnail rounded mx-auto d-block mb-3 mt-5', 'width' => '300px']) ?>
                    <h2><?= $item->name ?></h2>

                    <p>Rp. <?= number_format($item->price) ?></p>
                    <p><a class="btn btn-primary" href="site/checkout">Beli Sekarang</a></p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>