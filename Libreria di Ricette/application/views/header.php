<html class="no-js" lang="eng">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tasty Recipes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/nice-select.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/gijgo.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/slick.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/slicknav.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
</head>

<body>
    <!-- header-start -->
    <!-- Header berisi Home, Recipes, dan About -->
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="<?= base_url('/index.php/RecipeController')?>">
                                    <img src="<?= base_url('assets/img/LogoLI.png') ?>" style="height: 100px; width:100px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu   d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="<?= base_url('/index.php/RecipeController')?>" style="color: white;">home</a></li>
										<li><a href="<?= base_url()?>" style="color: white;">About</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                            <div class="col-xl-3 col-lg-2">
                                <?php if ($this->session->has_userdata('username')) : ?>
                                    <form class="form-inline" style="float: right;">
                                        <ul class="navbar-nav ml-auto">
                                            <div class="topbar-divider d-none d-sm-block"></div>
                                                <li class="nav-item dropdown no-arrow" style="background-color: rgb(255, 94, 19);border-radius: 20px; padding-right: 10px; padding-left: 10px;">
                                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <img src="<?= base_url('assets\img\user.png') ?>" width="35">
                                                        <p class="user-name mr-2 d-none d-lg-inline text-dark" style="text-transform: uppercase;font-weight: 500"><?= $this->session->userdata('username') ?></p>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                        <a class="dropdown-item" href="<?= base_url('/index.php/AccountController/view_profile/').$this->session->userdata('username') ?>">
                                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            View User
                                                        </a>
        						                        <a class="dropdown-item" href="<?= base_url('/index.php/RecipeController/form_recipe') ?>">
                                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Create Resep
                                                        </a>
                                                        <a class="dropdown-item" href="<?= base_url('/index.php/AccountController/logout') ?>">
                                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Logout
                                                        </a>
                                                    </div>
                                                </li>
                                        </ul>
                                    </form>
                                <?php else : ?>
                                    <a href="<?= base_url('/index.php/AccountController') ?>" class="genric-btn primary circle" type="button">Login</a>
                                    <a href="<?= base_url('/index.php/daftar/') ?>" class="genric-btn primary circle" type="button">Register</a>
                                <?php endif; ?>
                            </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
