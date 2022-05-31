<?php

class Products extends Dbh {

    public function getProduct() {
        $sql = "SELECT * FROM $this->tableName";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function addProduct($sku, $productName, $price, $productType, $attribute) {
        $sql = "INSERT INTO $this->tableName(sku, productName, price, productType, attribute) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku, $productName, $price, $productType, $attribute]);
    }

    public function massDelProducts($ids) {
        $arrayIds = explode(",", $ids);
        $in  = str_repeat('?,', count($arrayIds) - 1) . '?';

        $sql = "DELETE FROM $this->tableName WHERE id IN ($in)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($arrayIds);
    }
}