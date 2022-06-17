<?php
foreach ($orders as $order) {
    foreach ($order->customers as $customer) {
        $temp_customer_id = $customer->id;
?>
        <h4><?= $customer->name ?></h4>
    <?php
    }

    if ($order->customer_id == $temp_customer_id) {
    ?>
        <p>Nomor Order:<?= $order->id ?></p>
        <p>Tanggal Order:<?= $order->date ?></p>
        <h6>Item: </h6>
        <ul>
            <?php
            foreach ($order->items as $item) {
                if ($order->id == $item['order_id']) {
            ?>
                    <li><?= $item['name'] ?></li>
            <?php
                }
            }
            ?>
        </ul>
<?php

    }
}





?>