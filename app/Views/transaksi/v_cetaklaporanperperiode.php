<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-outline">
        <div class="invoice col-sm-12 p-3 mb-3">
            <div id="div1">
                <div class="row">
                    <div class="col-12">

                        <td width=200>
                            <img src="<?= base_url() ?>/assets/images/logo.jpg" width="100" alt="">
                        </td>
                        <til width=580>
                            <table>
                                <tr>
                                    <center>
                                        <p>
                                        <h4>Mesjid Raya Padang/h4>
                                        </p>
                                        <p>
                                        <h5>Jl.Transmart 
                                        </h5>
                                        </p>
                                    </center>
                                    </td>
                                    <td width=200></td>
                                </tr>
                            </table>
                            <center>
                                <b> Tanggal Masuk : <?= date('d F Y', strtotime($tgla)) ?> Sampai Dengan
                                    <?= date('d F Y', strtotime($tglb)) ?> </b>
                            </center>
                            <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th>No</th>
                                    <th>ID Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Meter Bulan Ini</th>
                                    <th>Meter Bulan Lalu</th>
                                    <th>Tarif</th>
                                    <th>Jumlah Pemakaian</th>
                                    <th>Biaya Sampah</th>
                                    <th>Total Biaya</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 0;
                                $jumlahpakai = 0;
                                $mbi = 0;
                                $mbl = 0;
                                $biayasampah = 0;
                                $totalbiaya = 0;
                                foreach ($data as $val) {
                                    $no++;
                                    $mbi += $val['meterbulanini'];
                                    $mbl += $val['meterbulanlalu'];
                                    $jumlahpakai = $mbi - $mbl;
                                    if ($val['idklass'] == 'Ekonomi') {
                                        $biayasampah = 10000;
                                    } else {
                                        $biayasampah = 0;
                                    }


                                ?>
                                    <tr role="row" class="odd">
                                        <td><?= $no; ?></td>
                                        <td><?= $val['id'] ?></td>
                                        <td><?= $val['nama'] ?></td>
                                        <td><?= $val['tglbayar'] ?></td>
                                        <td><?= $val['meterbulanini'] ?></td>
                                        <td><?= $val['meterbulanlalu'] ?></td>
                                        <td><?= $val['tarif'] ?></td>
                                        <td><?= $jumlahpakai ?>
                                        </td>
                                        <td>
                                            <?= $biayasampah ?>
                                        </td>
                                        <td>
                                            <?= ($val['tarif'] * $jumlahpakai) + $biayasampah; ?>
                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>
                            <tbody>
                        </table>
                        <br><br><br><br>
                        Padang, <?= date('d/M/y') ?>
                        <br><br><br>
                        Ketua <br>
                        Musri Wandra
                    </div>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-12">
                    <button onclick="printContent('div1')" class="btn btn-primary"><i class="fa fa-print"></i>
                        Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<?= $this->endSection('') ?>