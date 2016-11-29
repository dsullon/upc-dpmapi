<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';
class Driver extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('driver_model');
    }

    public function index_get()
    {
        $drivers = $this->driver_model->get();
        if ($drivers) {
            $this->response(array('status' => 'ok', 'drivers' => $drivers), 
                REST_Controller::HTTP_OK);
        } else{
            $this->response(array('status' => 'error', 'message' => 'No data available.'), 
                REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function find_get($id)
    {
        if (!$id) {
            $this->response(array('status' => 'error', 'message' => 'A valid value was not entered.'), 
                REST_Controller::HTTP_BAD_REQUEST);
        }
        $driver = $this->driver_model->get($id);
        if ($driver) {
            $this->response($driver, REST_Controller::HTTP_OK);
        } else{
            $this->response(array('status' => 'error', 'message' => 'No data found.'), 
                REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function deliveries_get($id)
    {
        if (!$id) {
            $this->response(array('status' => 'error', 'message' => 'A valid value was not entered.'), 400);
        }
        $deliveries = $this->driver_model->get_deliveries($id);
        if ($deliveries) {
            $this->response($deliveries, 200);
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