<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="public/css/additional-style.css" rel="stylesheet" />
    </head>
        
    <body>
        <header>
            <div class="header">
                <div class="row-new justify-content-center" role="navigation">
			        <nav class="navbar navbar-expand-lg navbar-dark col-sm">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
			    	</button>
			  	        <p class="navbar-brand">Jean Forteroche</p>
				        <div class="collapse navbar-collapse" id="navbarToggler">  
				            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
				                <li class="nav-item">
				                <a class="nav-link navlink" href="/">Accueil</a>
				                </li>
				                <li class="nav-item">
				                <a class="nav-link navlink" href="index.php?action=about">L'auteur</a>
				                </li>
				                <li class="nav-item">
				                <a class="nav-link navlink" href="index.php?action=contact">Contact</a>
				                </li>	
				            </ul>
				        </div>
			        </nav>
                    <h1 class="header-text">Billet simple pour l'Alaska</h1>
		        </div>		
            </div>
        </header>

        <div class="container main">
            <div>
                <?= $content ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>
