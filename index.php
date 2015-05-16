<?php require_once('inc.php') ?>
<!DOCTYPE html>
<!--
* Homepage Magazin @BitAcademy
* Implementare clasa Produse
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Magazin @BitAcademy</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </button>

                    <button type="button" class="navbar-toggle  collapsed" data-toggle="collapse" data-target="#navbar-cart">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        RON <span class="currentCost"><?php echo $cos->Calculeaza_Cost_Total(); ?></span>
                    </button>

                    <a class="navbar-brand" href="./index.php">Magazin @BitAcademy</a>
                </div>


                <ul class="nav navbar-nav collapse navbar-collapse">
                    <li>
                        <a href="./index.php"><i class="fa fa-home"></i>Home</a>
                    </li>
                   
                </ul>

                <div id="navbar-cart" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a id="cart-popover" class="btn" data-placement="bottom" title="Cos de cumparaturi">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                <span class="currentCost"><?php echo $cos->Calculeaza_Cost_Total(); ?></span> RON
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="popover_content_wrapper" style="display: none">
            <?php if ($cos->Get_Cos()) { ?>
                <div>
                    <h5>Total: <span class="currentCost"><?php echo $cos->Calculeaza_Cost_Total(); ?></span> RON</h5>
                    <a href="./cos.php" class="btn btn-primary">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Vezi continut
                    </a>
                    <a href="./goleste_cos.php" class="btn btn-default golesteCos">
                        <span class="glyphicon glyphicon-trash"></span> Goleste
                    </a>
                </div>
            <?php } else { ?>
                <p class="cosgol">Cosul este gol!</p>
                <div>
                    <h5>Total: <span class="currentCost">0</span> RON</h5>
                    <a href="./cos.php" class="btn btn-primary">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Vezi continut
                    </a>
                    <a href="./goleste_cos.php" class="btn btn-default golesteCos">
                        <span class="glyphicon glyphicon-trash"></span> Goleste
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>



    <!-- Page Content -->
    <div class="container">
        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer"></header>
        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Produse populare</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Products row -->
        <div class="row text-center">
            <?php
            foreach ($Produse as $key => $value) {
                $produsObiect = new Produse(
                        $value['id'], $value['nume'], $value['categorie'], $value['img_url'], $value['pret']
                );
                //$addToCartURL =
                ?>
                <div class="col-md-4 col-sm-6 prod-thumb">
                    <div class="thumbnail">
                        <img src="assets/img/produse/<?php echo $produsObiect->img_url ?>" alt="<?php echo $produsObiect->nume ?>">
                        <div class="caption">
                            <h4><?php echo $produsObiect->nume ?></h4>
                            <p>
                                <a href="adauga_in_cos.php?<?php echo "id={$produsObiect->getProdusID()}&nume={$produsObiect->nume}&pret={$produsObiect->pret}"; ?>" class="addToCart btn btn-primary">Adauga in cos</a> 
                            </p>
                            <div class="clear" style="height:20px"></div>
                            <div class="row">
                                <div class="col-xs-6"><p>Categorii: <a href="javascript://"><span class="label label-default"><?php echo $produsObiect->categorie ?></span></a></p></div>
                                <div class="col-xs-6"><p>Pret <span class="label label-success"><?php echo $produsObiect->pret ?> RON</span></p></div>
                            </div><!--row-->
                            
                            
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Magazin @BitAcademy 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <script src="assets/js/vendors/jquery/jquery.min.js"></script>
    <script src="assets/js/vendors/twitter-bootstrap/js/bootstrap.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
