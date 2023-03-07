<div class="row">
    <div class="col-lg-12">
        <div class="card card-dark card-outline">
            <div class="card-header">
                <h5 class="card-title"><?= $title; ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="<?= base_url() ?>laporan/cetak_laporan">
                            <!-- <form> -->
                            <div class="row">
                                <div div class="col-md-8">
                                    <div class="form-group">
                                        <label for="dari">Dari</label>
                                        <input type="date" name="dari" id="dari" class="form-control">
                                    </div>
                                </div>
                                <div div class="col-md-8">
                                    <div class="form-group">
                                        <label for="sampai">Sampai</label>
                                        <input type="date" name="sampai" id="sampai" class="form-control">
                                    </div>
                                </div>
                                <div div class="col-md-8">
                                    <div class="form-group">
                                        <label for="id_paket">Paket</label>
                                        <select name="id_paket" id="id_paket" class="form-control">
                                            <option value="">Semua Paket</option>
                                            <?php foreach ($paket as $row) : ?>
                                                <option value="<?php echo $row['id_paket'] ?>"><?php echo $row['nama_paket'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div div class="col-md-8">
                                    <div class="form-group">
                                        <label for="id_outlet">Outlet</label>
                                        <select name="id_outlet" id="id_outlet" class="form-control">
                                            <option value="">Semua Outlet</option>
                                            <?php foreach ($outlet as $row) : ?>
                                                <option value="<?php echo $row['id_outlet'] ?>"><?php echo $row['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="">Status Pembayaran</label>
                                        <select name="kode_invoice" id="kode_invoice" class="form-control">
                                            <option>Status Pembayaran</option>
                                            <?php foreach ($transaksi as $row) : ?>
                                                <option value="<?= $row['kode_invoice'] ?>"><?= $row['dibayar'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="">Dibayar</label>
                                        <select name="dibayar" id="dibayar" class="form-control">
                                            <option>Status Pembayaran</option>
                                            <option value="Dibayar">Dibayar</option>
                                            <option value="Belum Dibayar">Belum Dibayar</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <hr>
                        <!-- <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nama Paket</th>
                                    <th class="text-center">Outlet</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Status Pembayaran</th>
                                    <th class="text-center">Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1;
                                foreach ($laporan as $row) : ?>

                                    <tr>
                                        <td class="text-center"><?php echo $index++ ?></td>
                                        <td class="text-center"><?php echo $row['tgl'] ?></td>
                                        <td class="text-center"><?php echo $row['nama_paket'] ?></td>
                                        <td class="text-center"><?php echo $row['nama_outlet'] ?></td>
                                        <td class="text-center"><?php echo "Rp. " . number_format($row['harga'], 0, '.', '.') ?></td>
                                        <td class="text-center"><?php echo $row['jumlah'] ?></td>
                                        <td class="text-center"><?php echo "Rp. " . number_format($row['total'], 0, '.', '.') ?></td>
                                        <td class="text-center"><?php echo $row['dibayar'] ?></td>
                                        <td>
                                            <?php if ($row['dibayar'] == "Dibayar") { ?>
                                                <?php echo "Rp. " . number_format($row['total'], 0, '.', '.') ?>
                                            <?php } else { ?>
                                                <?php echo "Rp. " . number_format($row['harga'] * 0, 0, '.', '.') ?>
                                            <?php  } ?>
                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>



                            <tr>
                                <th class="text-center" colspan="8">Total Semua Pendapatan</th>
                                <td>

                                </td>
                            </tr>


                        </table> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->