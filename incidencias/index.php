<?php include '../template/header.php' ?>
<?php
    include_once "../model/conexion.php";
    if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
    if (!isset($_POST['buscamedio'])){$_POST['buscamedio'] = '';}
    if (!isset($_POST['buscabanco'])){$_POST['buscabanco'] = '';}
    if (!isset($_POST['buscafechadesde'])){$_POST['buscafechadesde'] = '';}
    if (!isset($_POST['buscafechahasta'])){$_POST['buscafechahasta'] = '';}
    if (!isset($_POST['buscamontodesde'])){$_POST['buscamontodesde'] = '';}
    if (!isset($_POST['buscamontohasta'])){$_POST['buscamontohasta'] = '';}
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
                                                <h3 class="card-title">Incidencias</h4>
                                        </th>
                                        <th class="col-3">
                                                <div class="d-grid gap-2 mx-auto">
                                                <a class="btn btn-primary" href="crear.php" role="button" style="background-color: green; color: white;">Nueva incidencia</a>
                                                </div>
                                        </th>
                                </tr>
                        </thead>
                </table>
        </div>
                <form id="form2" name="form2" method="POST" action="index.php">

                <div class="col-12">
                                <table class="table">
                                        <thead>   
                                                <tr class="filters">                                                      
                                                        <th>
                                                                Monto desde:
                                                                <input type="number" id="buscamontodesde" placeholder="Ingrese monto" name="buscamontodesde" class="form-control mt-2" value="<?php echo $_POST["buscamontodesde"];?>" style="border: #bababa 1px solid; color:#000000;" >
                                                        </th>
                                                        <th>
                                                                Monto hasta:
                                                                <input type="number" id="buscamontohasta" placeholder="Ingrese monto" name="buscamontohasta" class="form-control mt-2" value="<?php echo $_POST["buscamontohasta"];?>" style="border: #bababa 1px solid; color:#000000;" >
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
                        $query ="SELECT * FROM incidencia ";
                }else{
                        $query ="SELECT * FROM incidencia ";

                if ($_POST["buscar"] != '' ){ 
                        $query .= "WHERE (usuario LIKE LOWER('%".$aKeyword[0]."%')) ";
                
                for($i = 1; $i < count($aKeyword); $i++) {
                if(!empty($aKeyword[$i])) {
                $query .= " OR usuario LIKE '%" . $aKeyword[$i] . "%'";
                }
                }

                }
                }if ($_POST["buscafechadesde"] != '' ){
                        $query .= " AND fecha BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' ";
                }

                if ( $_POST['buscamontodesde'] != '' ){
                        $query .= " AND monto >= '".$_POST['buscamontodesde']."' ";
                }

                if ( $_POST['buscamontohasta'] != '' ){
                        $query .= " AND monto <= '".$_POST['buscamontohasta']."' ";
                }
                
                if ($_POST["buscamedio"] != '' ){
                        $query .= " AND medio = '".$_POST["buscamedio"]."' ";
                }
                if ($_POST["buscabanco"] != '' ){
                        $query .= " AND banco = '".$_POST["buscabanco"]."' ";
                }

                if ($_POST["orden"] == '2' ){
                        $query .= " ORDER BY monto ASC ";
                }

                if ($_POST["orden"] == '3' ){
                        $query .= " ORDER BY monto DESC ";
                }

                if ($_POST["orden"] == '4' ){
                        $query .= " ORDER BY fecha DESC ";
                }

                if ($_POST["orden"] == '5' ){
                        $query .= " ORDER BY fecha ASC ";
                }
        
        
                $sql = $conexion->query($query);
                $numeroSql = mysqli_num_rows($sql);
                $total = 0; 
                ?>
                <p style="font-weight: bold; color:purple;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
        </form>


        <div class="table-responsive">
                <table class="table ">
                        <thead>
                                <tr style="background-color:purple; color:#FFFFFF;">
                                        <th style=" text-align: center;"> Id </th>
                                        <th style=" text-align: center;"> Usuario </th>
                                        <th style=" text-align: center;"> Motivo </th>
                                        <th style=" text-align: center;"> Fecha </th>
                                        <th style=" text-align: center;"> Monto </th>

                                </tr>
                        </thead>
                        <tbody>
                        <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                
                                <tr>
                                <td style="text-align: center;"><?php echo $rowSql["id"]; ?></td>
                                <td style="text-align: center;"><?php echo $rowSql["usuario"]; ?></td>
                                <td style="text-align: center;"><?php echo $rowSql["motivo"]; ?></td>
                                <td style="text-align: center;"><?php echo $rowSql["fecha"]; ?></td>
                                <td style="text-align: center;"><?php echo money_format('%(#10n',$rowSql["monto"]);  $total = $total + $rowSql['monto'];?></td>
                                </tr>
                
                <?php } 
                ?>
                        </tbody>
                        <tfoot style="background-color:purple; color:#FFFFFF;">
                        <tr >
                        <td colspan="4"><strong>Total</strong></td>
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