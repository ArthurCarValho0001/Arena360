<h1 class="mb-4">Cadastrar Novo Cliente</h1>

<form action="?page=cliente/processar&action=cadastrar" method="POST">
    
    <div class="mb-3">
        <label for="nome_cliente" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" required>
    </div>
    
    <div class="mb-3">
        <label for="email_cliente" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email_cliente" name="email_cliente" required>
    </div>
    
    <div class="mb-3">
        <label for="telefone_cliente" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="telefone_cliente" name="telefone_cliente">
    </div>
    
    <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
    <a href="?page=cliente/listar" class="btn btn-secondary">Voltar para a Lista</a>
</form>