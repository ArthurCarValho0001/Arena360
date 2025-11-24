<h1 class="mb-4">Equipamentos Cadastrados</h1>

<?php
    include_once("Controller/EquipamentoController.php"); 
    
    $equipamentos = listarEquipamentos($conn);
?>

<?php if ($equipamentos): ?>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Valor/Hora (R$)</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $equipamentos->fetch_object()): ?>
                <tr>
                    <td><?php echo $row->id_equipamento; ?></td>
                    <td><?php echo $row->nome_equipamento; ?></td>
                    <td><?php echo $row->tipo_equipamento; ?></td>
                    <td>R$ <?php echo number_format($row->valor_hora, 2, ',', '.'); ?></td>
                    <td>
                        <?php 
                            if ($row->status_disponivel == 1) {
                                echo "<span class='badge bg-success'>Disponível</span>";
                            } else {
                                echo "<span class='badge bg-danger'>Manutenção</span>";
                            }
                        ?>
                    </td>
                    <td>
                        <a href="?page=equipamento/editar&id_equipamento=<?php echo $row->id_equipamento; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="?page=equipamento/processar&action=excluir&id_equipamento=<?php echo $row->id_equipamento; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-info" role="alert">
        Nenhum equipamento cadastrado ainda. 
        <a href="?page=equipamento/cadastrar" class="alert-link">Cadastre um novo equipamento aqui.</a>
    </div>
<?php endif; ?>

<a href="?page=equipamento/cadastrar" class="btn btn-success mt-3">Cadastrar Novo Equipamento</a>