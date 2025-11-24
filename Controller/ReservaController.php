<?php

function handleReservaRequest($conn) {
    $action = @$_REQUEST["action"];

    switch ($action) {
        case 'cadastrar':
            cadastrarReserva($conn);
            break;
        case 'editar':
            editarReserva($conn);
            break;
        case 'excluir':
            excluirReserva($conn);
            break;
    }
}

function calcularValorTotal($conn, $equipamento_id, $duracao_horas) {
    include_once("Controller/EquipamentoController.php");
    $equipamento = getEquipamentoById($conn, $equipamento_id);
    
    if ($equipamento) {
        return $equipamento->valor_hora * $duracao_horas;
    }
    return 0;
}

function cadastrarReserva($conn) {
    $cliente_id = $_POST["cliente_id"];
    $equipamento_id = $_POST["equipamento_id"];
    $data = $_POST["data_reserva"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_fim = $_POST["hora_fim"];

    // Calcula a duração em horas (simples)
    $inicio = strtotime($hora_inicio);
    $fim = strtotime($hora_fim);
    $duracao_segundos = $fim - $inicio;
    $duracao_horas = round($duracao_segundos / 3600);

    // Calcula o valor total
    $valor_total = calcularValorTotal($conn, $equipamento_id, $duracao_horas);

    $sql = "INSERT INTO reserva (cliente_id, equipamento_id, data_reserva, hora_inicio, hora_fim, duracao_horas, valor_total) 
            VALUES ('{$cliente_id}', '{$equipamento_id}', '{$data}', '{$hora_inicio}', '{$hora_fim}', '{$duracao_horas}', '{$valor_total}')";

    if ($conn->query($sql) === TRUE) {
        print "<script>alert('Reserva agendada com sucesso! Valor: R$ {$valor_total}');</script>";
        print "<script>location.href='?page=reserva/listar';</script>";
    } else {
        print "<div class='alert alert-danger'>Erro ao cadastrar a reserva.</div>";
        print "<script>location.href='?page=reserva/cadastrar';</script>";
    }
}

function editarReserva($conn) {
    $id = $_POST["id_reserva"];
    $cliente_id = $_POST["cliente_id"];
    $equipamento_id = $_POST["equipamento_id"];
    $data = $_POST["data_reserva"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_fim = $_POST["hora_fim"];

    $inicio = strtotime($hora_inicio);
    $fim = strtotime($hora_fim);
    $duracao_segundos = $fim - $inicio;
    $duracao_horas = round($duracao_segundos / 3600);
    $valor_total = calcularValorTotal($conn, $equipamento_id, $duracao_horas);

    $sql = "UPDATE reserva SET 
            cliente_id='{$cliente_id}', 
            equipamento_id='{$equipamento_id}', 
            data_reserva='{$data}', 
            hora_inicio='{$hora_inicio}', 
            hora_fim='{$hora_fim}', 
            duracao_horas='{$duracao_horas}', 
            valor_total='{$valor_total}'
            WHERE id_reserva={$id}";

    if ($conn->query($sql) === TRUE) {
        print "<script>alert('Reserva atualizada com sucesso! Valor: R$ {$valor_total}');</script>";
        print "<script>location.href='?page=reserva/listar';</script>";
    } else {
        print "<div class='alert alert-danger'>Erro ao atualizar a reserva.</div>";
        print "<script>location.href='?page=reserva/listar';</script>";
    }
}

function excluirReserva($conn) {
    $id = $_REQUEST["id_reserva"];

    $sql = "DELETE FROM reserva WHERE id_reserva={$id}";

    if ($conn->query($sql) === TRUE) {
        print "<script>alert('Reserva excluída com sucesso!');</script>";
        print "<script>location.href='?page=reserva/listar';</script>";
    } else {
        print "<div class='alert alert-danger'>Erro ao excluir a reserva.</div>";
        print "<script>location.href='?page=reserva/listar';</script>";
    }
}

function listarReservas($conn) {
    $sql = "SELECT 
                r.*, 
                c.nome_cliente, 
                e.nome_equipamento 
            FROM reserva r
            JOIN cliente c ON r.cliente_id = c.id_cliente
            JOIN equipamento e ON r.equipamento_id = e.id_equipamento
            ORDER BY r.data_reserva DESC, r.hora_inicio ASC";
            
    $res = $conn->query($sql);
    
    if ($res->num_rows > 0) {
        return $res;
    } else {
        return false;
    }
}

function getReservaById($conn, $id) {
    $sql = "SELECT * FROM reserva WHERE id_reserva={$id}";
    $res = $conn->query($sql);
    
    if ($res->num_rows > 0) {
        return $res->fetch_object();
    } else {
        return false;
    }
}

?>