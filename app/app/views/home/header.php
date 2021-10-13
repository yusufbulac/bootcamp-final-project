<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Theme</title>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='<?= ASSETS ?>font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="<?= ASSETS ?>bootstrap\css\bootstrap.min.css" rel="stylesheet">

    <!-- Main Style -->
    <link rel="stylesheet" href="<?= ASSETS ?>style.css">

    <!-- owl Style -->
    <link rel="stylesheet" href="<?= ASSETS ?>css\owl.carousel.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css\owl.transitions.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div id="wrapper">
    <div class="header">
        <!--Header -->
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-md-4 main-logo" style="margin-top: 10px;">
                    <button class="btn btn-default btn-red btn-lg">TEKNO NEWS</button>
                </div>
                <?php if (!isset($_SESSION["user_name"]) && !isset($_SESSION["user_password"])) {
                    ?>
                    <div class="col-md-6 pushright" style="margin-top: 5px;">
                        <div class="pushright">
                            <div class="top">
                                <a href="#" id="reg" class="btn btn-default btn-dark">Login<span>-- Or --</span>Register</a>
                                <div class="regwrap"></a>
                                    <div class="row">
                                        <div class="col-md-6 regform">
                                            <div class="title-widget-bg">
                                                <div class="title-widget">Login</div>
                                            </div>
                                            <form role="form" action="/login" method="post">

                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="user_name"
                                                           id="user_name"
                                                           placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="user_password"
                                                           id="user_password" placeholder="password">
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-default btn-red btn-sm">Log In</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="title-widget-bg">
                                                <div class="title-widget">Register</div>
                                            </div>
                                            <p>
                                                New user? By creating an account, you can comment on the news and access
                                                the
                                                latest content instantly...
                                            </p>
                                            <a href="/register">
                                                <button class="btn btn-default btn-yellow">Register Now</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="dashed"></div>
    </div>
    <!--Header -->
    <div class="main-nav">
        <!--end main-nav -->
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="/" class="active">Home</a>
                                    <div class="curve"></div>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <b
                                                class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/category">All Categories</a></li>
                                        <?php foreach ($navcategories as $category) : ?>
                                            <li>
                                                <a href="../category/<?= $category->category_name ?>"><?= $category->category_name ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/contact">Contact</a></li>
                                <?= (isset($_SESSION["user_name"])) ? '<li><a href="/mynews">My News</a></li>' : null; ?>

                            </ul>

                        </div>

                    </div>

                    <?php if (isset($_SESSION["user_name"])) {
                        ?>
                        <div class="col-md-6">
                            <ul class="small-menu">
                                <!--small-nav -->
                                <?=($user->user_type != 4)?'<li><a href="/admin" class="myacc">Management Panel</a></li>':null;?>
                                <li><a href="/account" class="myacc">My Account</a></li>
                                <li><a href="/logout" class="myacc">Logout</a></li>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
    <!--end main-nav -->