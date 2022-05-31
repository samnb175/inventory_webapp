<?php

class FormValidator extends Dbh {
    public function emptyInput($input) {

        return empty($input);
    }

    public function skuExist($sku) {
        $error;

        $sql = "SELECT sku FROM $this->tableName WHERE sku = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku]);

        $result = $stmt->fetchAll();

        if(!empty($result)) {
            $error = true;
        } else {
            $error = false;
        }

        return $error;
    }

    public function emptyProductType($productType) {
        $error;

        if(empty($productType)) {
            $error = true;
        } else {
            $error = false;
        }

        return $error;
    }
    
}