<?php
    include('./src/config.php');

    $pageTitle = 'Add Product';
    require_once('./views/header.php');
?>

<!-- Form -->
<form id="product_form" action="<?php echo $siteURL->getUrl() . '/processes/product.process.php'; ?>" method="POST">

    <ul id="form-messages"></ul>

    <div class="row form-field">
        <label class="col-lg-1 col-form-label">SKU</label>
        <div class="col-lg-4">
            <input type="text" id="sku" name="sku" class="form-control">
        </div>
    </div>

    <div class="row form-field">
        <label class="col-lg-1 col-form-label">Name</label>
        <div class="col-lg-4">
            <input type="text" id="name" name="productName" class="form-control">
        </div>
    </div>

    <div class="row form-field">
        <label class="col-lg-1 col-form-label">Price($)</label>
        <div class="col-lg-4">
            <input type="number" id="price" name="price" class="form-control">
        </div>
    </div>

    <div class="row form-field">
        <label class="col-lg-1">Type Switcher</label>
        <div class="col-lg-4">
            <select name="productType" id="productType" class="form-select" onchange="GetSelectedTextValue(this)">
                <option value="select product type" selected disabled>Type Switcher</option>
                <option value="dvd" id="DVD">DVD</option>
                <option value="book" id="Book">Book</option>
                <option value="furniture" id="Furniture">Furniture</option>
            </select>
        </div>
    </div>

    <div id="attribute"></div>
    
</form>

<!-------------DVD attributes--------------------->
<template data-type-dvd>
    <div class="attr_div" id="dvd_attr">
        <div class="row form-field">
            <label class="col-lg-1 col-form-label">Size (MB)</label>
            <div class="col-lg-4">
                <input type="number" id="size" name="size" class="form-control" />
                <p>Please provide size in MB.</p>
            </div>
        </div>
    </div>
</template>

<!-------------Book attributes--------------------->
<template data-type-book>
    <div class="attr_div" id="book_attr">
        <div class="row form-field">
            <label class="col-lg-1 col-form-label">Weight (KG)</label>
            <div class="col-lg-4">
                <input type="number" id="weight" name="weight" class="form-control">
                <p>Please provide weight in kg.</p>
            </div>  
        </div>
    </div>
</template>

<!-------------Furniture attributes--------------------->
<template data-type-furniture>
    <div class="attr_div" id="furniture_attr">
        <div class="row form-field">
            <label class="col-lg-1 col-form-label">Height (CM)</label>
            <div class="col-lg-4">
                <input type="number" id="height" name="height" class="form-control">
            </div>
        </div>  

        <div class="row form-field">
            <label class="col-lg-1 col-form-label">Width (CM)</label>
            <div class="col-lg-4">
                <input type="number" id="width" name="width" class="form-control">
            </div>
        </div>  

        <div class="row form-field">
            <label class="col-lg-1 col-form-label">Length (CM)</label>
            <div class="col-lg-4">
                <input type="number" id="length" name="length" class="form-control">
                <p>Please provide dimensions in HxWxL format.</p> 
            </div>
        </div>  
    </div>
</template>

<?php
    require_once('./views/footer.php');
?>