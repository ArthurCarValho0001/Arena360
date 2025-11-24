<h1 class="mb-4">Agendar Nova Reserva</h1>

<?php
    // Inclui os controladores necessários para buscar listas
    include_once("Controller/ClienteController.php"); 
    include_once("Controller/EquipamentoController.php"); 
    
    $clientes = listarClientes($conn);
    $equipamentos = listarEquipamentos($conn);

    if (!$clientes || !$equipamentos) {
        print "<div class='alert alert-warning'>
            É necessário ter pelo menos um Cliente e um Equipamento cadastrado para criar uma reserva.
        </div>";
        print "<a href='?page=cliente/cadastrar' class='btn btn-sm btn-primary'>Cadastrar Cliente</a>";
        print "<a href='?page=equipamento/cadastrar' class='btn btn-sm btn-primary ms-2'>Cadastrar Equipamento</a>";
        return;
    }
?>

<form action="?page=reserva/processar&action=cadastrar" method="POST">
    
    <div class="mb-3">
        <label for="cliente_id" class="form-label">Cliente</label>
        <select class="form-select" id="cliente_id" name="cliente_id" required>
            <?php while ($cli = $clientes->fetch_object()): ?>
                <option value="<?php echo $cli->id_cliente; ?>">
                    <?php echo $cli->nome_cliente; ?> (<?php echo $cli->email_cliente; ?>)
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="equipamento_id" class="form-label">Equipamento</label>
        <select class="form-select" id="equipamento_id" name="equipamento_id" required>
            <?php while ($eqp = $equipamentos->fetch_object()): ?>
                <option value="<?php echo $eqp->id_equipamento; ?>">
                    <?php echo $eqp->nome_equipamento; ?> (R$ <?php echo number_format($eqp->valor_hora, 2, ',', '.'); ?>/h)
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="data_reserva" class="form-label">Data da Reserva</label>
        <input type="date" class="form-control" id="data_reserva" name="data_reserva" required>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="hora_inicio" class="form-label">Hora Início</label>
            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="hora_fim" class="form-label">Hora Fim</label>
            <input type="time" class="form-control" id="hora_fim" name="hora_fim" required>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Agendar Reserva</button>
    <a href="?page=reserva/listar" class="btn btn-secondary">Ver Agendamentos</a>
</form>