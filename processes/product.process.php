<?php
    include('../src/config.php');

    $products = new Products();
    $formValidator = new FormValidator();
    $siteurl = new SiteURL();

    $errors = false;
    $messages = array();

    $sku = isset($_POST['sku']) ? $_POST['sku'] : null;
    $productName = isset($_POST['productName']) ? $_POST['productName'] : null;
    $price = isset($_POST['price']) ? $_POST['price'] : null;
    $productType = isset($_POST['productType']) ? ucfirst($_POST['productType']) : null;

    if($formValidator->skuExist($sku)) {
        $errors = true;
        $messages[] = "SKU already exists.";
    }

    if($formValidator->emptyInput($sku)) {
        $errors = true;
        $messages[] = "Please fill in the SKU.";
    }

    if($formValidator->emptyInput($productName)) {
        $errors = true;
        $messages[] = "Please fill in the product name.";
    }

    if($formValidator->emptyInput($price)) {
        $errors = true;
        $messages[] = "Please input the price.";
    }

    if(!is_null($productType)) {
        $typeObj = new $productType;
        $attribute = $typeObj->addAttribute($_POST);

        if($formValidator->emptyInput($attribute)) {
            $errors = true;
            $messages[] = "Please fill in the " . $typeObj->getAttributeName();
        }

    } else {
        $errors = true;
        $messages[] = "Please select a product type.";
    }

    echo json_encode(
        array(
            'errors' => $errors,
            'messages' => $messages
        )
    );

    if($errors === false) {        
        $products->addProduct($sku, $productName, $price, $productType, $attribute);
    }