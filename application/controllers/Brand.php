<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';
class Brand extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('brand_model');
    }

    public function index_get()
    {
        $brands = $this->brand_model->get();
        if (!is_null($brands)) {
            $this->response(array('status' => 'ok', 'brands' => $brands), 200);
        }  else{
            $this->response(array('status' => 'error', 'message' => 'No data available.'), 404);
        }
    }

    public function find_get($id)
    {
        if (!$id) {
            $this->response(array('status' => 'error', 'message' => 'A valid value was not entered.'), 400);
        }
        $brand = $this->brand_model->get($id);
        if ($brand) {
            $this->response($brand, 200);
        } else{
            $this->response(array('status' => 'error', 'message' => 'No data found.'), 400);
        }
    }

    public function index_post()
    {
        if (!$this->post('city')) {
            $this->response(null, 400);
        }
        $id = $this->cities_model->save($this->post('city'));
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
        $update = $this->cities_model->update($this->put('city'));
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
        $delete = $this->cities_model->delete($id);
        if (!is_null($delete)) {
            $this->response(array('response' => 'Ciudad eliminada!'), 200);
        } else {
            $this->response(array('error', 'Algo se ha roto en el servidor...'), 400);
        }
    }
}