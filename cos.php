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

                    <li>
                        <a href="#"><i class="fa fa-home"></i>Buy</a>
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
                <h3>Cos</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Products row -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Produs</th>
                                <th>Cantitate</th>
                                <th class="text-center">Pret</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $produseInCos = $cos->Get_Cos();
                                foreach($produseInCos as $prod) {
                            ?>
                            <tr id="cart_produs_<?php echo $prod['id'] ?>">
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo $prod['nume'] ?></a></h4>
                                        </div>
                                    </div></td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $prod['cantitate'] ?>">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong><span class="pretUnitate"><?php echo $prod['pret'] ?></span> RON</strong></td>
                                <td class="col-sm-1 col-md-1 text-center"><strong><span class="pretGama"><?php echo $prod['cantitate']*$prod['pret'] ?></span> RON</strong></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="btn-sterge btn btn-danger" id="sterge_<?php echo $prod['id'] ?>">
                                        <span class="glyphicon glyphicon-remove"></span> Sterge
                                    </button></td>
                            </tr>
                            <?php } ?>
                            
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h3>Total</h3></td>
                                <td class="text-right"><h3 ><strong><span id="costTotal"><?php echo $cos->Calculeaza_Cost_Total() ?></span> RON</strong></h3></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <a href="javascrip://" type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Continua
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success">
                                        Checkout <span class="glyphicon glyphicon-play"></span>
                                    </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
