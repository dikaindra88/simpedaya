<?php echo view('layouts/Header') ?>
<?php echo view('layouts/Front-end') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Report Dana Masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Report Dana Masuk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>
            <form action="Search-masuk" method="POST" enctype="multipart/form-data">
                <div class="row ml-2">
                    <div class="col-lg-3">
                        <div class="form-group">

                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="first_date" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="First Date" required />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">

                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#reservationdate1" placeholder="End Date" required />
                                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <select name="id_satuan" data-placeholder="Pilih Satuan" class="form-control select2bs4" required>
                                <option value="" selected disabled></option>
                                <?php foreach ($satuan as $value) : ?>
                                    <option value="<?= $value['id_satuan'] ?>"><?= $value['satuan'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <button type="submit" name="show" class="btn btn-info">Show</button>
                            <a href="<?= base_url('Print/masuk') . '/' . $first_date . '/' . $end_date . '/' . $id_satuan ?>" target="_blank" class="btn btn-outline btn-danger ">
                                <i class="fas fa-file-pdf"></i> Pdf
                            </a>
                            <a href="<?= base_url('Print-masuk') . '/' . $first_date . '/' . $end_date . '/' . $id_satuan ?>" target="_blink" class="btn btn-outline-secondary btn-light">
                                <i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>




    <section class="content">
        <div class="container-fluid">
            <?php
            session()->getFlashdata('pesan');
            if (session()->getFlashdata('pesan')) {
                echo '  <div class="mt-4 swalDefaultSuccess">
                       
                        ';

                echo '</div>';
            } ?>
            <div class="card">

                <!-- /.card-header -->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed " id="example3">
                            <thead>
                                <tr class="bg-primary color-light text-center" style=" font-size: 9pt;">
                                    <th>No</th>
                                    <th>Approval</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Nama Donatur</th>
                                    <th>Jenis Dana</th>
                                    <th>Satuan</th>
                                    <th>Keterangan</th>
                                    <th>Dana Masuk</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach ($masuk as $row) :
                                ?>
                                    <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                                        <td><?= $nomor++ ?></td>
                                        <td><?php
                                            if ($row['id_approve'] == '1') {
                                            ?>
                                                <button class="btn btn-success btn-sm text-center" disabled>Approved</button>
                                            <?php } elseif ($row['id_approve'] == '2') {
                                            ?>
                                                <button class="btn btn-warning btn-sm text-center" disabled>Progress</button>
                                            <?php } else { ?>
                                                <button class="btn btn-danger btn-sm text-center" disabled>Not Approved</button>
                                            <?php } ?>
                                        </td>
                                        <td><?= $row['tgl_masuk'] ?></td>
                                        <td><?= $row['nama_donatur'] ?></td>
                                        <td><?= $row['jenis'] ?></td>
                                        <td><?= $row['satuan'] ?></td>
                                        <td><?= $row['keterangan'] ?></td>
                                        <td><?= $row['dana_masuk'] ?></td>

                                    </tr>

                                <?php endforeach
                                ?>
                                <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                                    <td colspan="7">Total Dana Masuk</td>
                                    <td><?= $sum[0]['dana_masuk'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.modal-dialog -->
    <!-- /.container-fluid -->

    <!-- /.content-header -->

</div>
<?php echo view('layouts/Footer') ?>