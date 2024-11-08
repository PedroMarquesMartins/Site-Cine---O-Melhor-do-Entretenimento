<?php
require_once '../models/Reporte.php';

class reporteController
{
    private $reporte;

    public function __construct($db)
    {
        $this->reporte = new Reporte($db);
    }

    public function list()
    {
        $reportes = $this->reporte->list();
        echo json_encode($reportes);
    }

    public function create()
    {
        $data = json_decode(file_get_contents("php://input"));
        if (isset($data->descricaoBug) && isset($data->descricaoSugestao) && isset($data->idUsuario)) {
            try {
                $this->reporte->create($data->descricaoBug, $data->descricaoSugestao, $data->idUsuario);
                http_response_code(201);
                echo json_encode(["message" => "Usuário criado com sucesso."]);
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao criar o usuário."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
        //$id, $descricaoBug, $descricaoSugestao, $idUsuario
    }

    public function getById($id)
    {
        if (isset($id)) {
            try {
                $reporte = $this->reporte->getById($id);
                if ($reporte) {
                    echo json_encode($reporte);
                } else {
                    http_response_code(404);
                    echo json_encode(["message" => "Usuário não encontrado."]);
                }
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao buscar o usuário."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }

    public function update($id)
    {
        $data = json_decode(file_get_contents("php://input"));
        if (isset($id) && isset($data->descricaoBug) && isset($data->descricaoSugestao) && isset($data->idUsuario)) {

            try {
                $count = $this->reporte->update($id, $data->descricaoBug, $data->descricaoSugestao, $data->idUsuario);
                if ($count > 0) {
                    http_response_code(200);
                    echo json_encode(["message" => "Usuário atualizado com sucesso."]);
                } else {
                    http_response_code(500);
                    echo json_encode(["message" => "Erro ao atualizar o usuário."]);
                }
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao atualizar o usuário."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }

    //DELETE AQUI

    public function delete($id)
    {
        if (isset($id)) {
            try {
                $count = $this->reporte->delete($id);

                if ($count > 0) {
                    http_response_code(200);
                    echo json_encode(["message" => "Usuário deletado com sucesso."]);
                } else {
                    http_response_code(500);
                    echo json_encode(["message" => "Erro ao deletar o usuário."]);
                }
            } catch (\Throwable $th) {
                http_response_code(500);
                echo json_encode(["message" => "Erro ao deletar o usuário."]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Dados incompletos."]);
        }
    }
}