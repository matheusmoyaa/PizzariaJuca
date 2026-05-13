<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/db.php';
include_once '../../models/bebidas.php';

// Instanciar o banco de dados e conectar
$database = new DB();
$db = $database->getConnection();

// Instanciar o objeto bebidas
$bebidas = new bebidas($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {

        // Obter os dados enviados
        $data = json_decode(file_get_contents("php://input"));

        // Verificar se os dados não estão vazios
        if (
            !empty($data->nome) &&
            !empty($data->tipo) &&
            !empty($data->valor)
        ) {

            // Atribuir valores
            $bebidas->nome = $data->nome;
            $bebidas->tipo = $data->tipo;
            $bebidas->valor = $data->valor;

            // Inserir bebida
            if ($bebidas->add()) {

                header("HTTP/1.1 201 Created");

                echo json_encode(
                    array('Mensagem' => 'Bebida Criada com Sucesso')
                );

            } else {

                header("HTTP/1.1 500 Internal Server Error");

                echo json_encode(
                    array('Mensagem' => 'Nao foi possivel criar a bebida')
                );
            }

        } else {

            header("HTTP/1.1 400 Bad Request");

            echo json_encode(
                array('Mensagem' => 'Dados incompletos. Nao foi possivel criar a bebida.')
            );
        }

    } catch (Exception $e) {

        header("HTTP/1.1 500 Internal Server Error");

        echo json_encode(
            array("erro" => $e->getMessage())
        );
    }

} else {

    header("HTTP/1.1 405 Method Not Allowed");

    echo json_encode(
        array("erro" => "Método não suportado!")
    );
}

?>