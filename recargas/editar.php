<?php include '../template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once '../model/conexion.php';
    $id = $_GET['id'];
    $result = $conexion->query("select * from recarga where id = {$id};");
    $recarga = $result->fetch_object();

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                <div class="mb-3">
                        <label class="form-label">Id Jugador: </label>
                        <input type="text" style="text-align: center;" readonly class="form-control-plaintext mt-2" name="txtIdJugador"
                        value="<?php echo $recarga->idJugador; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banco: </label>
                        <select id="subject-filter" class="form-select mt-2" name="txtBanco" placeholder="<?php echo $recarga->banco; ?>" style="border: #bababa 1px solid; color:#000000;" >
                            <option value="BCP">BCP</option>
                            <option value="Interbank">Interbank</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Medio: </label>
                        <select id="subject-filter" class="form-select mt-2" name="txtMedio" placeholder="<?php echo $recarga->medio; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Telegram">Telegram</option>
                        </select>                    
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monto: </label>
                        <input type="text" style="text-align: center;" readonly class="form-control-plaintext mt-2" name="txtMonto"
                        value="<?php echo money_format('%(#10n',$recarga->monto); ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $recarga->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php' ?>