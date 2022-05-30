<?php

namespace Mvc\Controller;

use Config\Controller;
use Mvc\Model\UserModel;

class TournamentController extends Controller{

    
    private TournamentModel $tournamentModel;

    public function __construct()
    {
        $this->tournamentModel = new TournamentModel();
    }

    public function list()
    {
        $this->sendReponse(200, $this->tournamentModel->findAll());
    }





    private function sendReponse(int $status, array $data = [])
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: http://127.0.0.1:5500');

        http_response_code($status);

        echo json_encode([
            'status' => $status,
            'data' => $data
        ]);
    }

}