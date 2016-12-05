<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';
class User extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function login_post()
    {
        $obj=json_decode(file_get_contents('php://input'), true);

        $data = array(
            'nick' => $obj["usuario"],
            'password' => md5($obj['password'])
        );
        $user = $this->user_model->login($data);
        if ($user) {
            $this->response($user, 200);
        } else {
            $this->response(null, 404);
        }
    }

    public function index_get()
    {
        try {
            $usuarios = $this->user_model->get();
            if (!is_null($usuarios)) {
                $this->response($usuarios, 200);
            } else {
                $this->response(null, 404);
            }
        } catch (Exception $e) {
            $this->response(null, 500);
        }        
    }

    public function find_get($id)
    {
        if (!$id) {
            $this->response('No se ingresó un valor válido.', 400);
        }

        try {
            $usuario = $this->user_model->get($id);
            if (!is_null($usuario)) {
                $this->response($usuario, 200);
            } else {
                $this->response('No existe un registro asociado a la marca.', 404);
            }
        } catch (Exception $e) {
            $this->response(null, 500);
        } 
    }

    public function index_post()
    {
        if (!$this->post('city')) {
            $this->response(null, 400);
        }
        $id = $this->user_model->save($this->post('city'));
        if (!is_null($id)) {
            $this->response(array('response' => $id), 200);
        } else {
            $this->response(array('error', 'Algo se ha roto en el servidor...'), 400);
        }
    }

    public function index_put()
    {
        if (!$this->put('city')) {
            $this->response(null, 400);
        }
        $update = $this->user_model->update($this->put('city'));
        if (!is_null($update)) {
            $this->response(array('response' => 'Ciudad actualizada!'), 200);
        } else {
            $this->response(array('error', 'Algo se ha roto en el servidor...'), 400);
        }
    }
    
    public function index_delete($id)
    {
        if (!$id) {
            $this->response(null, 400);
        }
        $delete = $this->user_model->delete($id);
        if (!is_null($delete)) {
            $this->response(array('response' => 'Ciudad eliminada!'), 200);
        } else {
            $this->response(array('error', 'Algo se ha roto en el servidor...'), 400);
        }
    }
}