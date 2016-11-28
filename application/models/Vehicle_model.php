<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = null)
    {
        if (!is_null($id)) {
            $query = $this->db->select('*')->from('Vehicle')->where('id', $id)->get();
            if ($query->num_rows() === 1) {
                return $query->row_array();
            }
            return null;
        }
        $query = $this->db->select('*')->from('Vehicle')->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;
    }

    public function save($vehiculo)
    {
        $this->db->set($this->_setData($vehiculo))->insert('Vehicle');
        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }
        return null;
    }

    public function update($vehiculo)
    {
        $id = $vehiculo['id'];
        $this->db->set($this->_setData($vehiculo))->where('id', $id)->update('Vehicle');
        if ($this->db->affected_rows() === 1) {
            return true;
        }
        return null;
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('Vehicle');
        if ($this->db->affected_rows() === 1) {
            return true;
        }
        return null;
    }

    private function _setData($vehiculo)
    {
        return array(
            'idMarca' => $vehiculo["marca"],
            'placa' => $vehiculo['placa'],
            'color' => $vehiculo['color'],
            'fabricacion' => $vehiculo['fabricacion'],
            'nro_motor' => $vehiculo['motor'],
            'nro_serie' => $vehiculo['serie'],
            'modelo' => $vehiculo['modelo']
        );
    }
}