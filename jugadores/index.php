<?php include '../template/header.php' ?>

<?php
    include_once "../model/conexion.php";
    if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
    if (!isset($_POST['buscafechadesde'])){$_POST['buscafechadesde'] = '';}
    if (!isset($_POST['buscafechahasta'])){$_POST['buscafechahasta'] = '';}
    if (!isset($_POST['buscasaldodesde'])){$_POST['buscasaldodesde'] = '';}
    if (!isset($_POST['buscasaldohasta'])){$_POST['buscasaldohasta'] = '';}
    if (!isset($_POST["orden"])){$_POST["orden"] = '';}
    
    setlocale(LC_MONETARY, 'en_PE');

?>

<div class="container mt-5" >
    <div class="col-11 mx-auto">
        <!-- inicio alerta -->
        <div class="col-11 grid-margin mx-auto">
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
            </div>
    <div class="row">
<div class="col-11 grid-margin mx-auto">
<div class="card" >
        <div class="card-body " >
        <div class="col-12">
                <table class="table">
                        <thead>
                                <tr class="filters ">
                                        <th class="col-9">
                                                <h3 class="card-title">Jugadores</h4>
                                        </th>
                                        <th class="col-3">
                                                <div class="d-grid gap-2 mx-auto">
                                                <a class="btn btn-primary" href="crear.php" role="button" style="background-color: green; color: white;">Nuevo jugador</a>
                                                </div>
                                        </th>
                                </tr>
                        </thead>
                </table>
                </div>
                <form id="form2" name="form2" method="POST" action="index.php">
                <div class="col-12 ">

                                <table class="table">
                                        <thead>
                                                <tr class="filters">
                                                        <th>
                                                                Saldo desde:
                                                                <input type="number" id="buscasaldodesde" placeholder="Ingrese saldo" name="buscasaldodesde" class="form-control mt-2" value="<?php echo $_POST["buscasaldodesde"];?>" style="border: #bababa 1px solid; color:#000000;" >
                                                        </th>
                                                        <th>
                                                                Saldo hasta:
                                                                <input type="number" id="buscasaldohasta" placeholder="Ingrese saldo" name="buscasaldohasta" class="form-control mt-2" value="<?php echo $_POST["buscasaldohasta"];?>" style="border: #bababa 1px solid; color:#000000;" >
                                                        </th>
                                                
                                                        <th>
                                                                Fecha desde:
                                                                <input type="date" id="buscafechadesde" name="buscafechadesde" class="form-control mt-2" value="<?php echo $_POST["buscafechadesde"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                        </th>
                                                        <th>
                                                                Fecha hasta:
                                                                <input type="date" id="buscafechahasta" name="buscafechahasta" class="form-control mt-2" value="<?php echo $_POST["buscafechahasta"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                        </th>
                                                </tr>
                                        </thead>
                                </table>                

                </div>
                <div class="col-12">

<table class="table">
        <thead>
                <tr class="filters">
                        <th>
                                <label  class="form-label">Usuario:</label>
                                <input type="text" class="form-control" placeholder="Ingresar usuario" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>" >
                        </th> 
                        <th>
                                        Ordenar por:
                                                <select id="assigned-tutor-filter" id="orden" name="orden" class="form-select mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                        <?php if ($_POST["orden"] != ''){ ?>
                                                        <option value="<?php echo $_POST["orden"]; ?>">
                                                         <?php 
                                                                if ($_POST["orden"] == '2'){echo 'Por monto de menor a mayor';} 
                                                                if ($_POST["orden"] == '3'){echo 'Por monto de mayor a menor';} 
                                                                if ($_POST["orden"] == '4'){echo 'Por fecha de reciente';} 
                                                                if ($_POST["orden"] == '5'){echo 'Por fecha de antigua';} 
                                                        ?>
                                                        </option>
                                                        <?php } ?>
                                                                <option value="">Ninguno</option>
                                                                <option value="2">Por monto de menor a mayor</option>
                                                                <option value="3">Por monto de mayor a menor</option>
                                                                <option value="4">Por fecha de reciente</option>
                                                                <option value="5">Por fecha de antigua</option>
                                                </select>                                                         
                        </th>
                        <th>
                                <div class="d-grid gap-2 mx-auto">
                                <input type="submit"  class="btn btn-primary" value="Buscar" style="background-color: purple; color: white;">
                                </div>
                        </th>
                        <th>
                                <div class="d-grid gap-2  mx-auto">
                                <a class="btn btn-primary" href="index.php" role="button"><box-icon name='refresh' color='#ffffff' ></box-icon></a>
                                </div>
                        </th>
                                
                </tr>
        </thead>
</table>
</div>

                <?php 
                /*FILTRO de busqueda////////////////////////////////////////////*/
                if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
                $aKeyword = explode(" ", $_POST['buscar']);
                
        
                if ($_POST["buscar"] == '' AND $_POST['buscafechadesde'] == '' AND $_POST['buscafechahasta'] == ''AND $_POST['buscasaldodesde'] == '' AND $_POST['buscasaldohasta'] == ''){ 
                        $query ="SELECT * FROM jugador ";
                }else{
                        $query ="SELECT * FROM jugador ";

                if ($_POST["buscar"] != '' ){ 
                        $query .= "WHERE (nombre LIKE LOWER('%".$aKeyword[0]."%')) ";
                
                for($i = 1; $i < count($aKeyword); $i++) {
                if(!empty($aKeyword[$i])) {
                $query .= " OR nombre LIKE '%" . $aKeyword[$i] . "%'";
                }
                }

                }

                if ($_POST["buscafechadesde"] != '' ){
                        $query .= " AND fecha BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' ";
                }

                if ( $_POST['buscasaldodesde'] != '' ){
                        $query .= " AND saldo >= '".$_POST['buscasaldodesde']."' ";
                }

                if ( $_POST['buscasaldohasta'] != '' ){
                        $query .= " AND saldo <= '".$_POST['buscasaldohasta']."' ";
                }
                

                if ($_POST["orden"] == '1' ){
                        $query .= " ORDER BY nombre ASC ";
                }


                if ($_POST["orden"] == '2' ){
                        $query .= " ORDER BY saldo ASC ";
                }

                if ($_POST["orden"] == '3' ){
                        $query .= " ORDER BY saldo DESC ";
                }

                if ($_POST["orden"] == '4' ){
                        $query .= " ORDER BY fecha DESC ";
                }

                if ($_POST["orden"] == '5' ){
                        $query .= " ORDER BY fecha ASC ";
                }
                
        
        }


                $sql = $conexion->query($query);
                $numeroSql = mysqli_num_rows($sql);
                $total = 0; 

                ?>
                <p style="font-weight: bold; color:purple;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
        </form>


        <div class="table-responsive">
                <table class="table">
                        <thead>
                                <tr style="background-color:purple; color:#FFFFFF;">
                                        <th style=" text-align: center;"> Id </th>
                                        <th style=" text-align: center;"> Nombre </th>
                                        <th style=" text-align: center;"> Edad </th>
                                        <th style=" text-align: center;"> Fecha </th>
                                        <th style=" text-align: center;"> Opciones</th>
                                        <th style=" text-align: center;"> Saldo </th>

                                </tr>
                        </thead>
                        <tbody>
                        <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                
                                <tr>
                                <td style="text-align: center;"><?php echo $rowSql["id"]; ?></td>
                                <td style="text-align: center;"><?php echo $rowSql["nombre"]; ?></td>
                                <td style="text-align: center;"><?php echo $rowSql["edad"]; ?></td>
                                <td style="text-align: center;"><?php echo $rowSql["fecha"]; ?></td>
                                <td style="text-align: center;"><a class="text-success" href="ver.php?id=<?php echo $rowSql["id"]; ?>"><i class="bi bi-pencil-square" ></i></a></td>
                                <td style="text-align: center;"><?php echo money_format('%(#10n',$rowSql["saldo"]); ?></td>
                                </tr>
                <?php } ?>
                        </tbody>
                        <tfoot style="background-color:purple; color:#FFFFFF;">
                        <tr >
                        <td colspan="5"><strong>Total</strong></td>
                        <td class="text-right" style="text-align: center;"><strong><?php echo money_format('%(#10n',$total); ?></strong></td>
                        </tr>
                        </tfoot>
                </table>
        </div>
        </div>
</div>
</div>
        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>