<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . '/libraries/REST_Controller.php';

/**
 * This is a comment.
 */
class Vehicle extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('vehicle_model');
    }

    /**
    * @api {get} /vehicles/ Read all vehicles data
    * @apiHeader {string} X-API-KEY (required) - Your API key.
    * @apiVersion 1.0.0
    * @apiName GetVehicles
    * @apiGroup Vehicles
    *
    * @apiHeaderExample {json} Header-Example:
    * {
    *   "X-API-KEY": "{Api key value}"
    * }
    *
    * @apiSuccess {string}        status      If the request was successful or not. Options: ok, error. In the case of error a message property will be populated.
    * @apiSuccess {Array[]}       vehicles       A list of the vehicles available.
    * @apiSuccessExample Example response:
    *{
    *   "status": 'ok',
    *   "vehicles": [
    *    {
    *       "id": "1",
    *       "model": "YARIS",
    *       "licencePlate": "P9L-980",
    *       "color": "GRIS",
    *       "manufactureYear": "2015",
    *       "engineNumber": "MO899EDTR92",
    *       "serialNumber": "89OLL343",
    *       "idBrand": "74"
    *    },
    *    {
    *       "id": "2",
    *       "model": "ACCENT",
    *       "licencePlate": "J8L-908",
    *       "color": "BLANCO",
    *       "manufactureYear": "2016",
    *       "engineNumber": "09OLKO9OO",
    *       "serialNumber": "34EWQS34",
    *       "idBrand": "31"
    *       }
    *   ]
    *}
    *
    * @apiError NoAccessRight Only authenticated Admins can access the data.
    * @apiError UserNotFound   The <code>id</code> of the User was not found.
    *
    * @apiErrorExample Response (example):
    *     HTTP/1.1 403 Unautorized
    *     {
    *       "status": "error",
    *       "message": "Invalid API key "
    *     }
    */
    public function index_get()
    {
        $vehicles = $this->vehicle_model->get();
        if ($vehicles) {
            $this->response(array('status' => 'ok', 'vehicles' => $vehicles), 200);
        } else{
            $this->response(array('status' => 'error', 'message' => 'No data available.'), 404);
        }     
    }

    public function find_get($id)
    {
        if (!$id) {
            $this->response(array('status' => 'error', 'message' => 'A valid value was not entered.'), 400);
        }
        $vehicle = $this->vehicle_model->get($id);
        if ($vehicle) {
            $this->response(array('status' => 'ok', 'vehicle' => $vehicle), 200);
        } else{
            $this->response(array('status' => 'error', 'message' => 'No vehicle found.'), 404);
        }
    }

    public function index_post()
    {
        $obj=json_decode(file_get_contents('php://input'), true);
        $id = $this->vehicle_model->save($obj);
        if ($id) {
            $this->response(array('status' => true, 'response' => $id), 200);
        } else {
            $this->response(array('status' => false, 'error' => 'There was an error processing the data.'), 500);
        }
    }

    public function index_put()
    {
        $obj=json_decode(file_get_contents('php://input'), true);
        $update = $this->vehicle_model->update($obj);
        if ($update) {
            $this->response(array('status' => true, 'response' => $update), 200);
        } else {
            $this->response(array('status' => false, 'error' => 'There was an error processing the data.'), 500);
        }
    }
    
    public function index_delete($id)
    {
        if (!$id) {
            $this->response(array('status' => false, 'error' => 'A valid value was not entered.'), 400);
        }
        $delete = $this->vehicle_model->delete($id);
        if ($delete) {
            $this->response(array('status' => true, 'response' => $delete), 200);
        } else {
            $this->response(array('status' => false, 'error' => 'There was an error processing the data.'), 500);
        }
    }
}