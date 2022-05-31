<?php
    include('./src/config.php');

    $pageTitle = 'Product List';
    require('./views/header.php');
    
    $products = new Products();
?>

<!-- Display using card --> 
<div class="listing_container">
    <div class="row">

    <?php if($products->getProduct()) { ?>
    <?php foreach($products->getProduct() as $product) { ?>
        <div class="col-sm-6 col-md-3">
            <div class="card mb-4" id="<?php echo $product['id']; ?>">
                <div class="card-header">
                    <label class="checkbox_area">
                    <input type="checkbox" class="delete-checkbox" />
                    <span></span>
                    </label>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $product['sku']; ?></h5>
                    <p class="card-text"><?php echo $product['productName']; ?></p>
                    <p class="card-text"><?php echo $product['price']; ?> $</p>
                    <p class="card-text"><?php echo $product['attribute']; ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php } else { ?>
    <h1>No product to display.</h1>
    <?php } ?>
    </div>                              
</div>

<?php
    require('./views/footer.php');
?>