<?php include '../template/header.php' ?>

<?php
    include_once '../model/conexion.php';
    //print_r($persona);
?>

<div class="container mt-5">
    <!-- inicio alerta -->
    <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
    <div class="row justify-content-center">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="crearProceso.php">
                    <div class="mb-3">
                        <label class="form-label" >Id Jugador: </label>
                        <input type="number" class="form-control" placeholder="Ingresar id del jugador"  name="txtIdJugador" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banco: </label>
                            <select id="subject-filter" class="form-select mt-2" name="txtBanco" placeholder="Ingresar banco" style="border: #bababa 1px solid; color:#000000;" autofocus required >
                            <option value="BCP">BCP</option>
                            <option value="Interbank">Interbank</option>
                            </select>                    
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Medio: </label>
                        <select id="subject-filter" class="form-select mt-2" name="txtMedio" placeholder="Ingresar medio" style="border: #bababa 1px solid; color:#000000;" autofocus required >
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Telegram">Telegram</option>
                        </select>                     
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monto: </label>
                        <input type="number" class="form-control" placeholder="Ingresar monto" name="txtMonto" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Crear">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>