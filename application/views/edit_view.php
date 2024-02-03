<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        include 'boot.php';
    ?>
</head>

<body>
    <div class="container mt-3">
        <h2>Edit Product</h2>
    </div>
    <form action="<?php echo base_url(); ?>crud_ctrl/update/<?php echo $product-> id; ?>" method="post">
        <div class="container">
            <div class="form-group">
                <input type="text" value="<?php echo $product-> name; ?>" class="form-control col-md-6" name="name" placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <input type="text" value="<?php echo $product-> price; ?>" class="form-control col-md-6" name="price" placeholder="Price" required>
            </div>
            <div class="form-group">
                <input type="text" value="<?php echo $product-> quantity; ?>" class="form-control col-md-6" name="quantity" placeholder="Quantity" required>
            </div>
            <input type="submit" name="edit" value="Update" class="btn btn-outline-primary">
        </div>
    </form>

</body>

</html>