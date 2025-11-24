<h1 class="mb-4">Clientes Cadastrados</h1>

<?php
    include_once("Controller/ClienteController.php"); 
    
    $clientes = listarClientes($conn);
?>

<?php if ($clientes): ?>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $clientes->fetch_object()): ?>
                <tr>
                    <td><?php echo $row->id_cliente; ?></td>
                    <td><?php echo $row->nome_cliente; ?></td>
                    <td><?php echo $row->email_cliente; ?></td>
                    <td><?php echo $row->telefone_cliente; ?></td>
                    <td>
                        <a href="?page=cliente/editar&id_cliente=<?php echo $row->id_cliente; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="?page=cliente/processar&action=excluir&id_cliente=<?php echo $row->id_cliente; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-info" role="alert">
        Nenhum cliente cadastrado ainda. 
        <a href="?page=cliente/cadastrar" class="alert-link">Cadastre um novo cliente aqui.</a>
    </div>
<?php endif; ?>

<a href="?page=cliente/cadastrar" class="btn btn-success mt-3">Cadastrar Novo Cliente</a>