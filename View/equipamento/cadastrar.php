<h1 class="mb-4">Cadastrar Novo Equipamento</h1>

<form action="?page=equipamento/processar&action=cadastrar" method="POST">
    
    <div class="mb-3">
        <label for="nome_equipamento" class="form-label">Nome do Equipamento</label>
        <input type="text" class="form-control" id="nome_equipamento" name="nome_equipamento" required>
    </div>
    
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo de Equipamento</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="" disabled selected>Selecione o Tipo</option>
                <option value="PC">PC Gamer</option>
                <option value="Console">Console</option>
                <option value="VR">Óculos VR</option>
                <option value="Acessório">Volante Gamer</option>
            </select>
    </div>

    <div class="mb-3">
        <label for="valor_hora" class="form-label">Valor por Hora (R$)</label>
        <input type="number" step="0.01" class="form-control" id="valor_hora" name="valor_hora" required>
    </div>

    <div class="mb-3">
        <label for="status_disponivel" class="form-label">Status</label>
        <select class="form-select" id="status_disponivel" name="status_disponivel" required>
            <option value="1">1 - Disponível</option>
            <option value="0">0 - Em Manutenção</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Cadastrar Equipamento</button>
    <a href="?page=equipamento/listar" class="btn btn-secondary">Voltar para a Lista</a>
</form>