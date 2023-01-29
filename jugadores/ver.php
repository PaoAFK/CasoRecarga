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

    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }
    $id = $_GET['id'];


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
                                                <h3 class="card-title">Jugador: <?php echo $id; ?> </h4>
                                        </th>
                                        <th class="col-3">
                                                <div class="d-grid gap-2 mx-auto">
                                                <a class="btn btn-primary" href="../recargas/crear.php" role="button" style="background-color: green; color: white;">Nueva recarga</a>
                                                </div>
                                        </th>
                                </tr>
                        </thead>
                </table>
        </div>
                <form id="form2" name="form2" method="POST" action="ver.php?id=<?php echo $id; ?>">

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
                                                        Medio:
                                                        <select id="subject-filter" id="buscamedio" name="buscamedio" class="form-select mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                <?php if ($_POST["buscamedio"] != ''){ ?>
                                                                <option value="<?php echo $_POST["buscamedio"]; ?>"><?php echo $_POST["buscamedio"]; ?></option>
                                                                <?php } ?>
                                                                <option value="">Todos</option>
                                                                <option value="WhatsApp">WhatsApp</option>
                                                                <option value="Telegram">Telegram</option>
                                                        </select>
                                                </th> 
                                                <th>
                                                        Banco:
                                                        <select id="subject-filter" id="buscabanco" name="buscabanco" class="form-select mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                <?php if ($_POST["buscabanco"] != ''){ ?>
                                                                <option value="<?php echo $_POST["buscabanco"]; ?>"><?php echo $_POST["buscabanco"]; ?></option>
                                                                <?php } ?>
                                                                <option value="">Todos</option>
                                                                <option value="BCP">BCP</option>
                                                                <option value="Interbank">Interbank</option>
                                                                <option value="Scotiabank">Scotiabank</option>

                                                        </select>
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
                                                        <a class="btn btn-primary" href="ver.php?id=<?php echo $id; ?>" role="button"><box-icon name='refresh' color='#ffffff' ></box-icon></a>
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
                $query ="SELECT * FROM recarga WHERE idJugador=$id ";                                                         
               if ($_POST["buscar"] == ''  AND $_POST['buscamedio'] == '' AND $_POST['buscafechadesde'] == '' AND $_POST['buscafechahasta'] == ''AND $_POST['buscamontodesde'] == '' AND $_POST['buscamontohasta'] == ''){ 
                }else{
           
                if ($_POST["buscafechadesde"] != '' ){
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
        
        }
                $sql = $conexion->query($query);
                $numeroSql = mysqli_num_rows($sql);
                $query2 ="SELECT incidencia.id, incidencia.monto,  incidencia.fecha FROM incidencia LEFT JOIN recarga ON incidencia.motivo=recarga.id LEFT JOIN jugador ON jugador.id=recarga.idJugador WHERE jugador.id=$id; ";                                                         
                $sql2 = $conexion->query($query2);
                $numeroSql2 = mysqli_num_rows($sql2);
                $total = 0; 
                ?>
                <p style="font-weight: bold; color:purple;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql+$numeroSql2; ?> Resultados encontrados</p>
        </form>


        <div class="table-responsive">
                <table class="table ">
                        <thead>
                                <tr style="background-color:purple; color:#FFFFFF;">
                                        <th style=" text-align: center;"> Id </th>
                                        <th style=" text-align: center;"> Banco </th>
                                        <th style=" text-align: center;"> Medio </th>
                                        <th style=" text-align: center;"> Fecha </th>
                                        <th style=" text-align: center;"> Opciones </th>
                                        <th style=" text-align: center;"> Monto </th>

                                </tr>
                        </thead>
                        <tbody>
                        <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                
                                <tr class="text-success" >
                                <td style="text-align: center;"><?php echo $rowSql["id"]; ?></td>
                                <td style="text-align: center;"><?php echo $rowSql["banco"]; ?></td>
                                <td style="text-align: center;"><?php echo $rowSql["medio"]; ?></td>
                                <td style="text-align: center;"><?php echo $rowSql["fecha"]; ?></td>
                                <td style="text-align: center;"><a class="text-success" href="../recargas/editar.php?id=<?php echo $rowSql["id"]; ?>"><i class="bi bi-pencil-square" ></i></a></td>
                                <td style="text-align: center;"><?php echo money_format('%(#10n',$rowSql["monto"]);  $total = $total + $rowSql['monto'];?></td>
                                </tr>
                        <?php } 
                        ?>
                        </tbody>
                        <tbody>
                        <?php While($rowSql2 = $sql2->fetch_assoc()) {   ?>
                
                                <tr class="text-danger">
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;">Incidencia</td>
                                <td  style="text-align: center;"><?php echo $rowSql2["fecha"]; ?></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"><?php echo money_format('%(#10n',$rowSql2["monto"]);  $total = $total - $rowSql2['monto'];?></td>
                                </tr>
                
                <?php } 
                ?>
                        </tbody>
                        
                        <tfoot style="background-color:purple; color:#FFFFFF;">
                        <tr>
                        <td colspan="5"><strong>Saldo</strong></td>
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