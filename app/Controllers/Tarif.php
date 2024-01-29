<?php

namespace App\Controllers;

use App\Models\ModelTarif;

class Tarif extends BaseController
{
    public function index()
    {
        $model = new ModelTarif();
        $data['tarif'] = $model->getTarif()->getResultArray();
        echo view('tarif/v_tarif1', $data);
    }
    public function save()
    {
        $model = new ModelTarif();
        $data = array(
            'idtarif' => $this->request->getPost('id'),
            'idklass' => $this->request->getPost('idklass'),
            'tarif' => $this->request->getPost('tarif'),

        );
        if (!$this->validate([
            'id' => [
                'rules' => 'required|is_unique[tbl_tarif.idtarif]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Ada'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            print_r($this->request->getVar());
        }
        $model->insertData($data);
        return redirect()->to('/tarif');
    }
    public function delete()
    {
        $model = new ModelPelanggan();
        $id = $this->request->getPost('id');
        $model->deletepelanggan($id);
        return redirect()->to('/pelanggan/index');
    }
    function update()
    {
        $model = new ModelPelanggan();
        $id = $this->request->getPost('id');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'nohp' => $this->request->getPost('nohp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $model->updatepelanggan($data, $id);
        return redirect()->to('/pelanggan/index');
    }
}
