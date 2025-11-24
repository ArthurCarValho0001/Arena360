<?php

function handleClienteRequest($conn) {
    $action = @$_REQUEST["action"];

    switch ($action) {
        case 'cadastrar':
            cadastrarCliente($conn);
            break;
        case 'editar':
            editarCliente($conn);
            break;
        case 'excluir':
            excluirCliente($conn);
            break;
    }
}

function cadastrarCliente($conn) {
    $nome = $_POST["nome_cliente"];
    $email = $_POST["email_cliente"];
    $telefone = $_POST["telefone_cliente"];

    $sql = "INSERT INTO cliente (nome_cliente, email_cliente, telefone_cliente) 
            VALUES ('{$nome}', '{$email}', '{$telefone}')";

    if ($conn->query($sql) === TRUE) {
        print "<script>alert('Cliente cadastrado com sucesso!');</script>";
        print "<script>location.href='?page=cliente/listar';</script>";
    } else {
        print "<div class='alert alert-danger'>Erro ao cadastrar.</div>";
        print "<script>location.href='?page=cliente/cadastrar';</script>";
    }
}

function editarCliente($conn) {
    $id = $_POST["id_cliente"];
    $nome = $_POST["nome_cliente"];
    $email = $_POST["email_cliente"];
    $telefone = $_POST["telefone_cliente"];

    $sql = "UPDATE cliente SET 
            nome_cliente='{$nome}', 
            email_cliente='{$email}', 
            telefone_cliente='{$telefone}'
            WHERE id_cliente={$id}";

    if ($conn->query($sql) === TRUE) {
        print "<script>alert('Cliente atualizado com sucesso!');</script>";
        print "<script>location.href='?page=cliente/listar';</script>";
    } else {
        print "<div class='alert alert-danger'>Erro ao atualizar.</div>";
        print "<script>location.href='?page=cliente/listar';</script>";
    }
}

function excluirCliente($conn) {
    $id = $_REQUEST["id_cliente"];

    $sql = "DELETE FROM cliente WHERE id_cliente={$id}";

    if ($conn->query($sql) === TRUE) {
        print "<script>alert('Cliente excluído com sucesso!');</script>";
        print "<script>location.href='?page=cliente/listar';</script>";
    } else {
        print "<div class='alert alert-danger'>Erro ao excluir.</div>";
        print "<script>location.href='?page=cliente/listar';</script>";
    }
}

function listarClientes($conn) {
    $sql = "SELECT * FROM cliente ORDER BY nome_cliente ASC";
    $res = $conn->query($sql);
    
    if ($res->num_rows > 0) {
        return $res;
    } else {
        return false;
    }
}

function getClienteById($conn, $id) {
    $sql = "SELECT * FROM cliente WHERE id_cliente={$id}";
    $res = $conn->query($sql);
    
    if ($res->num_rows > 0) {
        return $res->fetch_object();
    } else {
        return false;
    }
}

?>