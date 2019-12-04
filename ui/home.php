<?php
if(!isset($_SESSION['inicio'])){
   $_SESSION['inicio'] = "1";
}

if(isset($_POST["contactar"])){
    if(isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["asunto"]) && isset($_POST["mensaje"])){
        if($_SESSION['inicio'] != $_POST['idf']){
            $_SESSION['inicio'] = $_POST['idf'];
            $nombre = $_POST["nombre"];
            $correo = $_POST["correo"];
            $asunto = $_POST["asunto"];
            $mensaje = $_POST["mensaje"];

            //Datos del correo
            $destinatario = "miguelmolina.1990@gmail.com";
            $cabeceras = "From: " . $correo;
            $mail = mail($destinatario, $asunto, $mensaje, $cabeceras);

            if($mail){
                echo "<script>
                        alertify.success('Mensaje enviado');
                     </script>";  
            }else{
                echo "<script>
                        alertify.success('Error al enviar el mensaje');
                      </script>";  
            }   
         }  
    }
}
?>

  
   <link rel="stylesheet" href="css/home.css">     
   
    <!-- Menu de nevegacion-->
    <nav class="navbar navbar-light bg-light navbar-expand-md fixed-top">
        <div class="container">
            <a class="navbar-brand">
               <a href="index.php"><img src="img/logoUDX.png" alt="UDXpertis" width="230" class="img-fluid"></a>
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
    
    <!--Header-->
    <header class="py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 text-center">
                    <img src="img/desarrollador.svg" alt="Soy el desarrollador" class="img-fluid mb-4 mb-md-0">
                </div>
                <div class="col-12 col-md-6 text-center text-md-left align-self-md-center">
                    <h1 class="display-4 font-weight-bold text-primary">¿Tienes preguntas sobre alguna asignatura?</h1>
                    <p>UDXpertis es una comunidad creada para que los estudiantes de la Universidad Distrital compartan
                        sus conocimientos y se ayuden entre sí, resolviendo preguntas sobre la academia.</p>
                </div>
            </div>    
        </div>
    </header>

    <!--Seccion Filosofia-->
    <section class="filosofia py-4 bg-primary text-center text-white">
        <div class="container">
            <div class="row">
                <div class="col-12 py-5">
                    <p class="h2"><cite>La motivación es lo que te pone en marcha, el hábito es lo que hace que sigas. </cite></p>
                    <p class="h4 font-italic">-Jim Ryun</p>
                </div>
            </div>
        </div>
    </section>

    <!--Seccion Como funciona el sitio-->
    <section class="servicios py-4 bg-light text-center">
        <div class="container">
        <h1 class="text-center display-4 font-weight-bold pb-5">¿Cómo funciona el sitio?</h1>
        <div class="row">
            <div class="col-md-3">
                <i class="fas fa-question-circle text-primary" aria-hidden="true"></i>
                <h2 class="text-primary">Pregunta</h2>
                <p>Haz una pregunta sobre algun tema en específico, ingresa una descripción, selecciona una o varias etiquetas,
                    adjunta algun archivo (si lo deseas) y dale clic en publicar.
                </p>
                </div>

                <div class="col-md-3">
                <i class="fas fa-comment-dots text-primary" aria-hidden="true"></i>
                <h2  class="text-primary">Responde</h2>
                <p>Selecciona la pregunta que deseas responder, ingresa tu respuesta, adjunta algun archivo (si lo deseas),
                     se preciso y coherente, y dale clic en responder.</p>
                </div>

                <div class="col-md-3">
                <i class="fas fa-search text-primary" aria-hidden="true"></i>
                <h2  class="text-primary">Busca</h2>
                <p>¿Crees que tu duda ya ha sido resuelta anteriormente?. Busca por título, etiquetas o demás opciones para el filtrado
                    de preguntas.</p>
                </div>

                <div class="col-md-3">
                <i class="fas fa-star-half-alt text-primary" aria-hidden="true"></i>
                <h2  class="text-primary">Califica</h2>
                <p>Valora las preguntas y respuetas de tus compañeros, reporta si encuentras algún uso indebido
                    del sistema. Recuerda que juntos lo hacemos mejor.</p>
                </div>
            </div>
        </div>
    </section>

         
    <!--Seccion Quienes Somos-->
    <section class="proyectos py-4 bg-primary text-light">
        <div class="container">
            <h1 class="text-center display-4 font-weight-bold pb-4">¿Quiénes somos?</h1>
            <div class="row text-md-center">
                <div class="col-12 pb-3">
                    <p class="h3">UDXpertis nace de la necesidad de que los estudiantes de la Universidad Distrital posean un
                        medio por el cual puedan proponer preguntas sobre algún tema relacionado a la academia, generando una 
                        comunidad que brinde soluciones óptimas a dichas inquietudes. </p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12 d-flex justify-content-center">
                <a href="#contacto" class="btn btn-light btn-lg rounded-lg text-primary">Más información</a>
                </div>
            </div>
        </div>
    </section>

    <!--Seccion Equipo de trabajo-->
    <section class="team text-center text-dark">
         <div class="container p-5">
         <h1 class="text-center display-4 font-weight-bold pb-3 text-primary">Equipo de trabajo</h1>
             <p class="text-dark">El equipo de trabajo esta conformado por personas que entregaron todo de sí para el beneficio de 
                 la comunidad académica de la universidad.
             </p>
             <div class="row">
                <div class="col-lg-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <img src="img/person.png" alt="img" class="img-fluid rounded-circle" width="40%">
                            <h3>Mateo Chaparro</h3>
                            <p>Tecnólogo en Sistematización de Datos</p>
                            <p>Desarrollador</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <img src="img/person.png" alt="img" class="img-fluid rounded-circle" width="40%">
                            <h3>Héctor Flórez</h3>
                            <p>Ingeniero de Sistemas</p>
                            <p></p>
                            <p>Director</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <img src="img/person.png" alt="img" class="img-fluid rounded-circle" width="40%">
                            <h3>Miguel Molina</h3>
                            <p>Tecnólogo en Sistematización de Datos</p>
                            <p>Desarrollador</p>
                        </div>
                    </div>
                </div>
             </div>
         </div>
     </section>
     
    <!--Contacto-->
     <section class="bg-light p-5" id="contacto">
        <div class="container">
             <div class="row">
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <h3>Informacion de contacto</h3>
                    <div>
                        <p>A continuacion encontraras los medios por los cuales podras ponerte en contacto con nosotros.</p>
                        <div><i class="fas fa-phone-alt mr-1 mb-2"></i> Telefono 1: 999-999-999</div>
                        <div><i class="fas fa-phone-alt mr-1 mb-2"></i> Telefono 1: 999-999-999</div>
                        <div><i class="fas fa-envelope mr-1 mb-2"></i> Correo: contactoudx@gmail.com</div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h3>Contactanos</h3>
                    <p>Ingresa un mensaje.</p>
                    <form action="index.php?pid=<?php echo base64_encode("ui/home.php")?>" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <i class="fas fa-user input-group-text"></i>
                            </div>
                            <input name="nombre" type="text" placeholder="Nombre" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <i class="fas fa-user input-group-text"></i>
                            </div>
                            <input name="correo" type="email" placeholder="Correo" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <i class="fas fa-envelope input-group-text"></i>
                            </div>
                            <input name="asunto" type="text" placeholder="Asunto" class="form-control">
                        </div>                      
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <i class="fas fa-pencil-alt input-group-text"></i>
                            </div>
                            <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Escribe tu mensaje" class="form-control"></textarea>
                        </div>
                        <input type="submit" name="contactar" class="btn btn-primary btn-block" value="Enviar mensaje">
                        <input type="hidden" name="idf" value="<?php echo md5(time())?>">
                    </form>
                </div>
             </div>
         </div>
     </section>
