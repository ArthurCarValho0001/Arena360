<?php
    include_once("Controller/ReservaController.php"); 
    include_once("Controller/ClienteController.php"); 
    include_once("Controller/EquipamentoController.php"); 

    $id = @$_REQUEST["id_reserva"];
    $reserva = getReservaById($conn, $id);
    $clientes = listarClientes($conn);
    $equipamentos = listarEquipamentos($conn);
    
    if (!$reserva) {
        print "<div class='alert alert-danger'>Reserva não encontrada.</div>";
        print "<script>location.href='?page=reserva/listar';</script>";
        exit;
    }
?>

<h1 class="mb-4">Editar Reserva #<?php echo $reserva->id_reserva; ?></h1>

<form action="?page=reserva/processar&action=editar" method="POST">
    
    <input type="hidden" name="id_reserva" value="<?php echo $reserva->id_reserva; ?>">
    
    <div class="mb-3">
        <label for="cliente_id" class="form-label">Cliente</label>
        <select class="form-select" id="cliente_id" name="cliente_id" required>
            <?php 
                $clientes->data_seek(0); // Volta o ponteiro
                while ($cli = $clientes->fetch_object()): 
            ?>
                <option value="<?php echo $cli->id_cliente; ?>" 
                    <?php echo ($cli->id_cliente == $reserva->cliente_id) ? 'selected' : ''; ?>>
                    <?php echo $cli->nome_cliente; ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="equipamento_id" class="form-label">Equipamento</label>
        <select class="form-select" id="equipamento_id" name="equipamento_id" required>
            <?php 
                $equipamentos->data_seek(0); // Volta o ponteiro
                while ($eqp = $equipamentos->fetch_object()): 
            ?>
                <option value="<?php echo $eqp->id_equipamento; ?>"
                    <?php echo ($eqp->id_equipamento == $reserva->equipamento_id) ? 'selected' : ''; ?>>
                    <?php echo $eqp->nome_equipamento; ?> (R$ <?php echo number_format($eqp->valor_hora, 2, ',', '.'); ?>/h)
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="data_reserva" class="form-label">Data da Reserva</label>
        <input type="date" class="form-control" id="data_reserva" name="data_reserva" 
               value="<?php echo $reserva->data_reserva; ?>" required>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="hora_inicio" class="form-label">Hora Início</label>
            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" 
                   value="<?php echo $reserva->hora_inicio; ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="hora_fim" class="form-label">Hora Fim</label>
            <input type="time" class="form-control" id="hora_fim" name="hora_fim" 
                   value="<?php echo $reserva->hora_fim; ?>" required>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="?page=reserva/listar" class="btn btn-secondary">Cancelar</a>
</form>