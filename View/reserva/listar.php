<h1 class="mb-4">Agendamentos Realizados</h1>

<?php
    include_once("Controller/ReservaController.php"); 
    
    $reservas = listarReservas($conn);
?>

<?php if ($reservas): ?>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Equipamento</th>
                <th>Data</th>
                <th>Início/Fim</th>
                <th>Duração (h)</th>
                <th>Valor Total (R$)</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $reservas->fetch_object()): ?>
                <tr>
                    <td><?php echo $row->id_reserva; ?></td>
                    <td><?php echo $row->nome_cliente; ?></td>
                    <td><?php echo $row->nome_equipamento; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row->data_reserva)); ?></td>
                    <td><?php echo substr($row->hora_inicio, 0, 5); ?> - <?php echo substr($row->hora_fim, 0, 5); ?></td>
                    <td><?php echo $row->duracao_horas; ?></td>
                    <td>R$ <?php echo number_format($row->valor_total, 2, ',', '.'); ?></td>
                    <td>
                        <a href="?page=reserva/editar&id_reserva=<?php echo $row->id_reserva; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="?page=reserva/processar&action=excluir&id_reserva=<?php echo $row->id_reserva; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta reserva?');">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-info" role="alert">
        Nenhum agendamento encontrado.
        <a href="?page=reserva/cadastrar" class="alert-link">Crie a primeira reserva aqui.</a>
    </div>
<?php endif; ?>

<a href="?page=reserva/cadastrar" class="btn btn-success mt-3">Novo Agendamento</a>