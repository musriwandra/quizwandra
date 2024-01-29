<?php

namespace App\Controllers;

use App\Models\ModelTransaksi;

class Transaksi extends BaseController
{
    public function index()
    {
        $model = new ModelTransaksi();
        $data['transaksi'] = $model->getTransaksi()->getResultArray();
        $data['data_pelanggan'] = $model->getPelanggan()->getResult();
        $data['data_tarif'] = $model->getTarif()->getResult();
        echo view('transaksi/v_transaksi', $data);
    }
    public function save()
    {
        $model = new ModelTransaksi();
        $data = array(
            'idpel' => $this->request->getPost('idpel'),
            'idharga' => $this->request->getPost('idharga'),
            'meterbulanini' => $this->request->getPost('meterbulanini'),
            'meterbulanlalu' => $this->request->getPost('meterbulanlalu'),
            'tglbayar' => $this->request->getPost('tanggal'),

        );

        $model->insertData($data);
        return redirect()->to('/transaksi');
    }
    public function delete()
    {
        $model = new ModelTransaksi();
        $id = $this->request->getPost('idt');
        $model->deletetransaksi($id);
        return redirect()->to('/transaksi/index');
    }
    function update()
    {
        $model = new ModelTransaksi();
        $id = $this->request->getPost('id');
        $data = array(
            'idpel' => $this->request->getPost('idpel'),
            'idharg' => $this->request->getPost('idharga'),
            'meterbulanini' => $this->request->getPost('meterbulanini'),
            'meterbulanlalu' => $this->request->getPost('meterbulanlalu'),
            'tglbayar' => $this->request->getPost('tglbayar'),
        );
        $model->updatetransaksi($data, $id);
        return redirect()->to('/transaksi/index');
    }

    public function laporanperperiode()
    {
        echo view('transaksi/vlaporantransaksi');
    }

    public function cetaklaporanperperiode()
    {
        $model = new Modeltransaksi();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiode($tgla, $tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('transaksi/v_cetaklaporanperperiode', $data);
    }
}
