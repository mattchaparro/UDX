<?php
$token = $_GET['token'];
$id = $_GET['id'];
$estudiante = new Estudiante($id);
$estudiante -> select();
$tokenbd= $estudiante -> getToken();

if($token == $tokenbd){
    $estudiante -> updateStatus();
    $estudiante -> deleteToken();
}
?>


<header class="py-4 ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 p-0 d-flex align-items-center">
                <img src="img/check.png" alt="Trabajo en equipo" class="d-none d-md-block img-fluid">
            </div>
            <div class="col-12 col-md-6 text-center text-md-left align-self-md-center">
                <h1 class="display-4 font-weight-bold text-danger">¡Genial! Tu cuenta ha sido activada correctamente</h1>
                <p>Ahora eres un miembro de nuestra comunidad. Recuerda que juntos lo hacemos mejor. </p>
            </div>
        </div>    
    </div>
</header>

<section class="py-4 bg-primary text-light">
    <div class="container">
        <h1 class="text-center display-4 font-weight-bold pb-4">¿Tienes preguntas?</h1>
        <div class="row text-center">
            <div class="col-12 d-flex justify-content-center">
            <a href="index.php?pid=<?php echo base64_encode("ui/home.php") ?>" class="btn btn-light btn-lg rounded-lg text-primary">Ir al sitio</a>
            </div>
        </div>
    </div>
</section>