<nav class="navbar navbar-light bg-light navbar-expand-md fixed-top">
        <div class="container">
            <a class="navbar-brand">
               <a href="index.php"><img src="img/logoUDX.png" alt="UDXpertis" width="40%" class="img-fluid"></a>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#items" aria-controls="navbarNav" aria-expanded="false" aria-label="Desplegar barra de navegacion">
              <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="items">
                <ul class="navbar-nav ml-auto">
                    <li class="mr-md-2 mr-sm-0 nav-item rounded border border-primary text-center"><a href="index.php?pid=<?php echo base64_encode("ui/logIn.php")?>" class="nav-link text-primary">Iniciar Sesión</a></li>
                    <li class="nav-item rounded bg-primary white text-center"><a href="index.php?pid=<?php echo base64_encode("ui/signIn.php")?>" class="nav-link text-white">Regístrate</a></li>
                </ul>
            </div>
        </div>
    </nav>
