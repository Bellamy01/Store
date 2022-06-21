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
    <title>STORE - INSERT USER</title>
</head>

<body>
    <div class="container">
        <h3 class="text-dark font-weight-bold">USERS-APPLICATION</h3>
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
        <h3 class="text-white text-center font-weight-bold bg-primary bg-gradient">CREATE USER</h3>
        <form method="post" name="CreateUser" action=" <?php echo base_url() . 'User/create'; ?> ">
            <div class="col-md-6 offset-3 formees">
                <div class="row mb-3 mt-3">
                    <div class="col">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo set_value('fname'); ?>" placeholder="Enter Firstname">
                        <?php
                        echo "<b>" . form_error('fname') . "</b>";
                        ?>
                    </div>
                    <div class="col">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo set_value('lname'); ?>" placeholder="Enter Lastname">
                        <?php
                        echo "<b>" . form_error('lname') . "</b>";
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="text" name="telephone" class="form-control" value="<?php echo set_value('telephone'); ?>" placeholder="Enter telephone">
                    <?php
                    echo "<b>" . form_error('telephone') . "</b>";
                    ?>
                </div>
                <label for="gender">Gender</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="radio1" value="male" <?php if (set_value('gender') == 'male') {
                                                                                                            echo 'checked';
                                                                                                        } ?>>Male
                    <label class="form-check-label" for="male"></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="radio2" value="female" <?php if (set_value('gender') == 'female') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>Female
                    <label class="form-check-label " for="female"></label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="gender" id="radio3" value="others" <?php if (set_value('gender') == 'others') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>Others
                    <label class="form-check-label " for="others"></label>
                    <?php echo "<b>" . form_error('gender') . "</b>";
                    ?>
                </div>
                <label for="nationality">Nationality</label><br>
                <select name="nationality" class="form-select form-control">
                    <option value="">Not selected</option>
                    <option value="American" <?php if (set_value('nationality') == 'American') {
                                                    echo 'selected';
                                                } ?>>American</option>
                    <option value="French" <?php if (set_value('nationality') == 'French') {
                                                echo 'selected';
                                            } ?>>French</option>
                    <option value="British" <?php if (set_value('nationality') == 'British') {
                                                echo 'selected';
                                            } ?>>British</option>
                    <option value="Rwandan" <?php if (set_value('nationality') == 'Rwandan') {
                                                echo 'selected';
                                            } ?>>Rwandan</option>
                </select>
                <?php echo "<b>" . form_error('nationality') . "</b>";
                ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="uname" class="form-control" placeholder="Enter username" value="<?php echo set_value('uname'); ?>">
                    <?php
                    echo "<b>" . form_error('uname') . "</b>";
                    ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php echo set_value('email'); ?>">
                    <?php
                    echo "<b>" . form_error('email') . "</b>";
                    ?>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" value="<?php echo set_value('password'); ?>">
                    <?php
                    echo "<b>" . form_error('password') . "</b>";
                    ?>
                </div>
                <div class="row form-group">
                    <button class="btn btn-primary">Create</button>
                    <a href="<?php echo base_url() . 'User/index'; ?>" class="btn btn-secondary ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html> 