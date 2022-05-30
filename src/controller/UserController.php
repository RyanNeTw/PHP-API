<?php

namespace Mvc\Controller;

use Config\Controller;
use Mvc\Model\UserModel;

class UserController extends Controller{

    
    private UserModel $usersModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function list()
    {
        $this->sendReponse(200, $this->userModel->findAll());
    }


    public function create()
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);
        var_dump($userData);
        $isaccountCreated = $this->userModel->create($userData[0]["nickname"], $userData[0]["mail"], $userData[0]["password"]);

        $status = 200;
        $message = 'An error occured while creating the task';

        if ($isaccountCreated)
        {
            http_response_code(201);
            $status = 201;
            $message = 'account create';
        }

        echo json_encode([
            'status' => $status,
            'data' => [],
            'message' => $message
        ]);
    }


    public function delete(int $id)
    {
        $this->userModel->delete($id);

        http_response_code(204);
        echo json_encode([
            'status' => 204,
            'data' => [],
        ]);
    }


    public function update(int $id)
    {
        $json = file_get_contents('php://input');
        $userData = json_decode($json, true);
        var_dump($userData);
        $isUserUpdated = $this->userModel->update($userData[0]['nickname'],$userData[0]['mail'],$userData[0]['password'], $id,);

        $message = $isUserUpdated === true ? 'Task has been updated' : 'An error occured while updating the task';

        echo json_encode([
            'status' => 200,
            'data' => [],
            'message' => $message
        ]);
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