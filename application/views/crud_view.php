<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations in CI</title>
    <?php
     include 'boot.php';
    ?>
</head>

<body>
    <?php if($this->session->flashdata('error')): ?>
    <div class="bg-danger" align="center">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('inserted')): ?>
    <div class="bg-success" align="center">
        <?php echo $this->session->flashdata('inserted'); ?>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('updated')): ?>
    <div class="bg-success" align="center">
        <?php echo $this->session->flashdata('updated'); ?>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('deleted')): ?>
    <div class="bg-success" align="center">
        <?php echo $this->session->flashdata('deleted'); ?>
    </div>
    <?php endif; ?>

    <div class="container">
        <h3>CRUD APP IN CI</h3>
    </div>
    <div class="container">
        <div class="clear-fix">
            <h4 style="float:left">All Products</h4>
            <a style="float:right" class="btn btn-outline-primary mb-3" data-toggle="modal"
                data-target="#exampleModal">Add Product</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $sno = 1; ?>
                <?php foreach($product_details as $products): ?>
                <tr>
                    <td>
                        <?php echo $sno; ?>
                    </td>
                    <td>
                        <?php echo $products->name; ?>
                    </td>
                    <td>
                        <?php echo $products->price; ?>
                    </td>
                    <td>
                        <?php echo $products->quantity; ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url(); ?>crud_ctrl/editProduct/<?php echo $products->id; ?>"
                            class="btn btn-outline-success">Edit

                        </a>
                        <a href="<?php echo base_url(); ?>crud_ctrl/deleteProduct/<?php echo $products->id; ?>"
                            class="btn btn-outline-danger" onclick="return confirmDelete();">Delete</a>
                    </td>
                </tr>
                <?php $sno++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal to add product -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registration" action="<?php echo base_url(); ?>crud_ctrl/addProduct" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="price" placeholder="Price" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="quantity" placeholder="Quantity" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function confirmDelete() 
    {
        return confirm("Are you sure you want to delete this product?");
    }

    $(document).ready(function() {
        $("#submit").on("click", function() {

            var formData = $("#registration").serialize();

            // Make an AJAX request to signup.php
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>crud_ctrl",
                data: formData,
                success: function(response) {

                    console.log(response);

                    // Reset the form
                    $("#registration")[0].reset();
                },
                error: function(error) {
                    console.error("Error:", error);
                }
            });
        });
    });
    </script>

</body>

</html>