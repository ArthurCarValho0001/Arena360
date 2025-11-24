<?php
    include_once("Controller/ClienteController.php"); 

    $id = @$_REQUEST["id_cliente"];
    
    if (!empty($id)) {
        $cliente = getClienteById($conn, $id);
        
        if (!$cliente) {
            print "<div class='alert alert-danger'>Cliente não encontrado.</div>";
            print "<script>location.href='?page=cliente/listar';</script>";
            exit;
        }
    } else {
        print "<div class='alert alert-warning'>ID do cliente não fornecido.</div>";
        print "<script>location.href='?page=cliente/listar';</script>";
        exit;
    }
?>

<h1 class="mb-4">Editar Cliente: <?php echo $cliente->nome_cliente; ?></h1>

<form action="?page=cliente/processar&action=editar" method="POST">
    
    <input type="hidden" name="id_cliente" value="<?php echo $cliente->id_cliente; ?>">
    
    <div class="mb-3">
        <label for="nome_cliente" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value="<?php echo $cliente->nome_cliente; ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="email_cliente" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email_cliente" name="email_cliente" value="<?php echo $cliente->email_cliente; ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="telefone_cliente" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="telefone_cliente" name="telefone_cliente" value="<?php echo $cliente->telefone_cliente; ?>">
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="?page=cliente/listar" class="btn btn-secondary">Cancelar</a>
</form>