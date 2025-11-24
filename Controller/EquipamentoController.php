<?php

function handleEquipamentoRequest($conn) {
    $action = @$_REQUEST["action"];

    switch ($action) {
        case 'cadastrar':
            cadastrarEquipamento($conn);
            break;
        case 'editar':
            editarEquipamento($conn);
            break;
        case 'excluir':
            excluirEquipamento($conn);
            break;
    }
}

function cadastrarEquipamento($conn) {
    $nome = $_POST["nome_equipamento"];
    $tipo = $_POST["tipo_equipamento"];
    $valor = $_POST["valor_hora"];
    $status = $_POST["status_disponivel"];

    $sql = "INSERT INTO equipamento (nome_equipamento, tipo_equipamento, valor_hora, status_disponivel) 
            VALUES ('{$nome}', '{$tipo}', '{$valor}', '{$status}')";

    if ($conn->query($sql) === TRUE) {
        print "<script>alert('Equipamento cadastrado com sucesso!');</script>";
        print "<script>location.href='?page=equipamento/listar';</script>";
    } else {
        print "<div class='alert alert-danger'>Erro ao cadastrar.</div>";
        print "<script>location.href='?page=equipamento/cadastrar';</script>";
    }
}

function editarEquipamento($conn) {
    $id = $_POST["id_equipamento"];
    $nome = $_POST["nome_equipamento"];
    $tipo = $_POST["tipo_equipamento"];
    $valor = $_POST["valor_hora"];
    $status = $_POST["status_disponivel"];

    $sql = "UPDATE equipamento SET 
            nome_equipamento='{$nome}', 
            tipo_equipamento='{$tipo}', 
            valor_hora='{$valor}', 
            status_disponivel='{$status}'
            WHERE id_equipamento={$id}";

    if ($conn->query($sql) === TRUE) {
        print "<script>alert('Equipamento atualizado com sucesso!');</script>";
        print "<script>location.href='?page=equipamento/listar';</script>";
    } else {
        print "<div class='alert alert-danger'>Erro ao atualizar.</div>";
        print "<script>location.href='?page=equipamento/listar';</script>";
    }
}

function excluirEquipamento($conn) {
    $id = $_REQUEST["id_equipamento"];

    $sql = "DELETE FROM equipamento WHERE id_equipamento={$id}";

    if ($conn->query($sql) === TRUE) {
        print "<script>alert('Equipamento excluído com sucesso!');</script>";
        print "<script>location.href='?page=equipamento/listar';</script>";
    } else {
        print "<div class='alert alert-danger'>Erro ao excluir.</div>";
        print "<script>location.href='?page=equipamento/listar';</script>";
    }
}

function listarEquipamentos($conn) {
    $sql = "SELECT * FROM equipamento ORDER BY nome_equipamento ASC";
    $res = $conn->query($sql);
    
    if ($res->num_rows > 0) {
        return $res;
    } else {
        return false;
    }
}

function getEquipamentoById($conn, $id) {
    $sql = "SELECT * FROM equipamento WHERE id_equipamento={$id}";
    $res = $conn->query($sql);
    
    if ($res->num_rows > 0) {
        return $res->fetch_object();
    } else {
        return false;
    }
}

?>