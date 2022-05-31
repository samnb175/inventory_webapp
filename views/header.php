<?php
    $siteURL = new SiteURL();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle; ?></title>
     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- Stylesheet-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="header_section">

      <h1 class="page_heading"><?php echo $pageTitle; ?></h1>
      
        <div class="header_btn_section">
          <?php if($siteURL->getPage() == "index.php") { ?>

            <a href="add-product.php"><button type="button" class="btn btn-dark header_btn">ADD</button></a>
            <button id="delete-product-btn" class="btn btn-outline-dark header_btn header_btn_mass" data-url="<?php echo $siteURL->getUrl() . '/processes/massdelete.process.php?&send=del'; ?>">MASS DELETE</button>

          <?php } else if($siteURL->getPage() == "add-product.php") { ?>

            <button type="submit" name="save_product" class="btn btn-dark header_btn" id="save_product" form="product_form">Save</button>
            <a href="index.php" class="btn btn-outline-dark header_btn header_btn_mass">Cancel</a>

          <?php } ?>
        </div>
  </div>
