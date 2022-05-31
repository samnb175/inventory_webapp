<?php
    include('../src/config.php');

    $products = new Products();

    if($_GET['send'] === 'del') {
        $ids = $_GET['ids'];
        $products->massDelProducts($ids);

        header("Location: ../index.php");
        exit();
    }
