<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTarif extends Model
{
    public function getTarif()
    {
        $builder = $this->db->table('tbl_tarif');
        return $builder->get();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_tarif')->insert($data);
    }
    public function deletetarif($id)
    {
        $query = $this->db->table('tbl_tarif')->delete(array('idtarif' => $id));
    }
    public function updatetarif($data, $id)
    {
        $query = $this->db->table('tbl_tarif')->update($data, array('idtarif' => $id));
    }
}
