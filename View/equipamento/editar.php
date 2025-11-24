<?php
    include_once("Controller/EquipamentoController.php"); 

    $id = @$_REQUEST["id_equipamento"];
    
    if (!empty($id)) {
        $equipamento = getEquipamentoById($conn, $id);
        
        if (!$equipamento) {
            print "<div class='alert alert-danger'>Equipamento não encontrado.</div>";
            print "<script>location.href='?page=equipamento/listar';</script>";
            exit;
        }
    } else {
        print "<div class='alert alert-warning'>ID do equipamento não fornecido.</div>";
        print "<script>location.href='?page=equipamento/listar';</script>";
        exit;
    }
?>

<h1 class="mb-4">Editar Equipamento: <?php echo $equipamento->nome_equipamento; ?></h1>

<form action="?page=equipamento/processar&action=editar" method="POST">
    
    <input type="hidden" name="id_equipamento" value="<?php echo $equipamento->id_equipamento; ?>">
    
    <div class="mb-3">
        <label for="nome_equipamento" class="form-label">Nome do Equipamento</label>
        <input type="text" class="form-control" id="nome_equipamento" name="nome_equipamento" value="<?php echo $equipamento->nome_equipamento; ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="tipo_equipamento" class="form-label">Tipo</label>
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
    </div>
    
    <div class="mb-3">
        <label for="valor_hora" class="form-label">Valor por Hora (R$)</label>
        <input type="number" step="0.01" class="form-control" id="valor_hora" name="valor_hora" value="<?php echo $equipamento->valor_hora; ?>" required>
    </div>

    <div class="mb-3">
        <label for="status_disponivel" class="form-label">Status</label>
        <select class="form-select" id="status_disponivel" name="status_disponivel" required>
            <option value="1" <?php echo ($equipamento->status_disponivel == 1) ? 'selected' : ''; ?>>1 - Disponível</option>
            <option value="0" <?php echo ($equipamento->status_disponivel == 0) ? 'selected' : ''; ?>>0 - Em Manutenção</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="?page=equipamento/listar" class="btn btn-secondary">Cancelar</a>
</form>