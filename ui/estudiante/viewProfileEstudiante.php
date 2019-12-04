<?php
require 'ui/validacionEstudiante.php';
include 'ui/menuEstudiante.php';
?>

<div class="container" style="height: 100vh;">
    <div class="row my-4">
        <div class="col-12 col-md-4 border">
           <div class="row h-100">
               <div class="col-4 col-md-12 d-flex justify-content-center align-items-center">
                    <img src="<?php
                          if($estudiante -> getFoto() == ""){
                              echo "img/person.png";
                          }else{
                              echo $estudiante -> getFoto();
                          }
                          ?>"
                alt="Usuario" style="width: 65%; height: 65%;" class="border p-0 p-md-2">
               </div>
               <div class="col-8 col-md-12 border d-flex justify-content-center align-items-center">
                   <h3><?php echo $estudiante -> getNombre(); echo " ". $estudiante -> getApellido() ?></h3>
               </div>
           </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="row border d-flex justify-content-center p-2">
               <h2>Datos personales</h2>
            </div>
            <div class="row border">
                <table class="table table-striped table-hover border m-2">
				    <tr>
				        <th>Codigo</th>
				        <td><?php echo $estudiante -> getCodigo() ?></td>
				    </tr>
				        <th>Correo</th>
				        <td><?php echo $estudiante -> getCorreo() ?></td>
				    </tr>
					<tr>
				        <th>Fecha de registro</th>
				        <td><?php echo $estudiante -> getFecha_registro() ?></td>
				    </tr>
					<tr>
				        <th>Fecha de actualizacion</th>
				        <td><?php echo $estudiante -> getFecha_actualizacion() ?></td>
				    </tr>
				    <tr>
				        <th>Telefono</th>
				        <td><?php echo $estudiante -> getTelefono() ?></td>
				    </tr>
				    <tr>
				        <th>Puntaje</th>
				        <td><?php echo $estudiante -> getPuntaje() ?></td>
				    </tr>
				    <tr>
				        <th>Rango</th>
				        <td><?php echo $estudiante -> getRango() -> getNombre() ?></td>
				    </tr>
				</table>
            </div>
        </div>
    </div>
</div>
