<header>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />

    <script type="text/javascript" src="/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=77Dxyo1CleRBsjyFgRgLQHO_D7hPL_n1LyRNP21C1_v4fy5VwVk3_uMP4DQ2baaHiLDtl6nkOVqjPFM1YOYlzihoK5XNCJJadAV1c8S0g_nPIoLt6FS8TiduGKjDlJQZumTZ43vP_kAUBPIhP4htSQ" charset="UTF-8"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../CSS/main.css" />

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
        <div class="container-fluid">
            <ul class="navbar-nav justify-content-center">                
                <li class="nav-item">
                    <a class="nav-link" href="../Magasin/Accueil.php">
                        <h3>
                            <img style="background-size: contain;  height:3em; display:inline;" src="https://s1.qwant.com/thumbr/0x380/0/9/0019942d765ee3bdd5def6fdb330cd4b9577be28104f1a7e69541eb8175dde/1200px-Carrefour_logo_no_tag.svg.png?u=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fen%2Fthumb%2F1%2F12%2FCarrefour_logo_no_tag.svg%2F1200px-Carrefour_logo_no_tag.svg.png&q=0&b=1&p=0&a=1" alt="Icone du site">
                            Drive
                        </h3>
                    </a>                     
                </li>            
            </ul>
            <?php
            if(isset($_SESSION['AdminPerms'])&&$_SESSION['AdminPerms']==true){
                echo'
                <div class="ml-3 dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                Pages admin
                </button>

                <div class="dropdown-menu">
                <a class="dropdown-item" href="../AjoutDesProduit/AjoutProduit.php">Ajout Produit</a>
                <a class="dropdown-item" href="#">jsp</a>
                <a class="dropdown-item" href="#">jsp</a>
                </div>
                </div>';
            }
            ?>
        
        <a class="mx-auto btn btn-success" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"aria-controls="multiCollapseExample1">Rechercher Ici</a>
        <div class="row">
        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
                    <form class="mx-auto form-inline navbar-nav"method="GET" action="../Magasin/produit.php">
                    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search" name="nomProduit">
                    <button class="btn btn-outline-success" type="submit">Recherche</button> 
                </div>
            </div>
        </div> 
        </div>
                   
        <ul class="mx-auto navbar-nav">
        <li class="nav-item mr-5 "><a class="nav-link" href="../Panier/panier.php"><i class="fa fa-shopping-basket" aria-hidden="true">
        </i>Panier</a></li>
        </ul> 
              
        
        </form>
       
        <?php
        if (isset($_SESSION['User_ID'])){
            echo '<ul class="navbar-nav navbar-right">
            <li class="nav-item "><a class="nav-link" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>'.$_SESSION["Nom"].' '.$_SESSION["Prenom"].'</a></li>
            </ul>';
            echo'         <ul class="navbar-nav navbar-right">
            <li class="nav-item "><a class="nav-link" href="../Magasin/Accueil.php?déco">Déconnexion</a></li>
            </ul>';
        }
        else{
            echo '
            <form action="../Magasin/Accueil.php"method="POST">
            
            <div class="input-group-prepend mb-1">
            <input class="rounded" name="login"placeholder="Login">
            </div>
            <div class="input-group-prepend mb-1">
            <input type="password" class="rounded" name="password"placeholder="Password">
            </div>
            <div class="input-group-prepend mb-1">
            <button class="btn btn-dark-50" type="submit">Connexion</button>
            <ul class="navbar-nav navbar-right">
            <li class="nav-item "><a class="nav-link" href="../autentification&Inscription/Inscription.php">Inscription</a></li>
            </ul>
            </div>
            </form>';
        }
        ?>

    </div>
</nav>

</header>
