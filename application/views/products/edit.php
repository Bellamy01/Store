<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @media screen and (max-width:600px) {
            .card {
                position: relative;
                left: -13%;
            }

            .formees {
                position: relative;
                left: -30%;
            }

            .container {
                position: relative;
                left: 1%;
            }

            .row {
                display: flex;
                flex-direction: column;
            }
        }

        .card {
            box-shadow: 2px 2px 8px 2px #b8b8b8;
            padding: 1%;

        }

        .container h3 {
            text-align: center;
            box-shadow: 2px 2px 8px 2px black;
            margin: 2%;
            padding: 2%;

        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        input[type=submit] {
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            margin-left: 15px;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 600px) {
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
    <link rel="stylesheet" href="create.css">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STORE - EDIT PRODUCT</title>
</head>

<body>
    <div class="container">
        <h3 class="text-dark font-weight-bold">PRODUCTS-APPLICATION</h3>
    </div>
    <?php
    $success = $this->session->userdata('success');
    if ($success != "") {
    ?>
        <div class="alert alert-success text-center font-weight-bold"> <?php echo $success; ?> </div>
    <?php
    }
    ?>
    <div class="card col-md-8 offset-2">
        <h3 class="text-white text-center font-weight-bold bg-primary bg-gradient">CREATE PRODUCT</h3>
        <form method="post" name="CreateProduct" action="<?php echo base_url() . 'Product/edit/'.$product['productId']; ?>">
            <div class="col-md-6 offset-3 formees">
                <div class="row mb-3 mt-3">
                    <div class="col">
                        <label for="firstname">Product Name</label>
                        <input type="text" name="productname" class="form-control" value="<?php echo set_value('productname',$product['product_Name']); ?>" placeholder="Enter Product">
                        <?php
                        echo "<b>" . form_error('productname') . "</b>";
                        ?>
                    </div>
                    <div class="col">
                        <label for="lastname">Brand</label>
                        <input type="text" name="brand" class="form-control" value="<?php echo set_value('brand',$product['brand']); ?>" placeholder="Enter Brand">
                        <?php
                        echo "<b>" . form_error('brand') . "</b>";
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telephone"> Supplier Tel</label>
                    <input type="text" name="telephone" class="form-control" value="<?php echo set_value('telephone',$product['supplier_phone']); ?>" placeholder="Enter telephone">
                    <?php
                    echo "<b>" . form_error('telephone') . "</b>";
                    ?>
                </div>


                <div class="form-group">
                    <label for="username">Supplier</label>
                    <input type="text" name="supplier" class="form-control" placeholder="Enter supplier" value="<?php echo set_value('supplier',$product['supplier']); ?>">
                    <?php
                    echo "<b>" . form_error('supplier') . "</b>";
                    ?>
                </div>
                <div class="row form-group">
                    <button class="btn btn-primary">Update</button>
                    <a href="<?php echo base_url() . 'Product/index'; ?>" class="btn btn-secondary ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>