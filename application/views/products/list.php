<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .card {
            box-shadow: 2px 2px 8px 2px #b8b8b8;
            padding: 1%;

        }

        .container h3 {
            text-align: center;
            box-shadow: 2px 2px 8px 2px black;
            margin: 2% 2% 2% 0%;
            padding: 2%;

        }
    </style>
    <link rel="stylesheet" href="create.css">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STORE - DISPLAY PRODUCTS</title>
</head>

<body>
    <div class="container">
        <h3 class="text-dark font-weight-bold">PRODUCTS APPLICATION</h3>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-10 offest-1">
            <div class="offset-2">
                <h3 class="text-secondary font-weight-bold" style="float:left;">Display Data</h3>
                <a href="<?php echo base_url() . 'Product/create'; ?>" class="btn btn-primary" style="float: right;position:absolute;right:0;">Create</a>
            </div>
        </div>
    </div>
    <div class="col-md-8 offset-2">
        <?php
        $success = $this->session->userdata('success');
        if ($success != "") {
        ?>
            <div class="alert alert-success text-center font-weight-bold "> <?php echo $success; ?> </div>
        <?php
        }
        ?>
    </div>


    <div class="row">

        <div class=" col-md-10 offset-1">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Brand</th>
                        <th>Supplier Tel</th>
                        <th>Supplier</th>
                        <th>Added on</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                if (!empty($products)) {
                    foreach ($products as $product) { ?>
                        <tr>
                            <td><?php echo $product['productId']; ?></td>
                            <td><?php echo $product['product_Name']; ?></td>
                            <td><?php echo $product['brand']; ?></td>
                            <td><?php echo $product['supplier_phone']; ?></td>
                            <td><?php echo $product['supplier']; ?></td>
                            <td><?php echo $product['added_date']; ?></td>
                            <td><a href="<?php echo base_url() . 'Product/edit/' . $product['productId']; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="<?php echo base_url() . 'Product/delete/' . $product['productId']; ?>" class=" btn btn-danger">Delete</a></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="12">
                            <div class="alert alert-danger text-center">No Record Found</div>
                        </td>
                    </tr> <?php
                        } ?>
            </table>
        </div>
    </div>
</body>

</html>