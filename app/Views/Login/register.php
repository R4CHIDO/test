<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>School Community</title>
    <!-- base:css -->
    <link rel="stylesheet" href=<?= site_url('auth/vendors/mdi/css/materialdesignicons.min.css') ?>>
    <link rel="stylesheet" href=<?= site_url('auth/vendors/css/vendor.bundle.base.css') ?>>
    <link rel="stylesheet" href=<?= site_url('auth/css/style.css') ?>>
    <link rel="stylesheet" href=<?= site_url('auth/images/favicon.png') ?>>
</head>

<body>
    <div class="container-scroller d-flex">
        <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <?php if (session()->has("warning")) : ?>
                                <div class="alert alert-warning" role="alert">
                                    <?= session("warning") ?>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->has("error")) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session("error") ?>
                                </div>
                            <?php endif; ?>
                            <div class="brand-logo">
                                <img src="../../images/logo.svg" alt="logo">
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
                            <form class="pt-3" action=<?= site_url('Login/signup') ?> method="POST">
                                <div class="form-group">
                                    <label>First name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input name="first_name" type="text" class="form-control form-control-lg border-left-0" placeholder="First name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Last name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input name="last_name" type="text" class="form-control form-control-lg border-left-0" placeholder="Last name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-email-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input name="email" type="email" class="form-control form-control-lg border-left-0" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Group</label>
                                    <select name="group_id" class="form-control form-control-lg" id="exampleFormControlSelect2">
                                        <?php foreach ($groups as $group) :  ?>
                                            <option value="<?php echo $group->group_id ?>">
                                                <?php echo $group->group_label ?>
                                            </option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input name="password" type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" style="background-color: #1F3BB3;" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP">
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href=<?= site_url('Login') ?> class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 register-half-bg d-none d-lg-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018 All rights reserved.</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>



    <!-- container-scroller -->
    <!-- base:js -->
    <script src=<?= site_url('auth/vendors/js/vendor.bundle.base.js') ?>></script>
    <script src=<?= site_url('auth/js/off-canvas.js') ?>></script>
    <script src=<?= site_url('auth/js/hoverable-collapse.js') ?>></script>
    <script src=<?= site_url('auth/js/template.js') ?>></script>
    <!-- endinject -->
</body>

</html>