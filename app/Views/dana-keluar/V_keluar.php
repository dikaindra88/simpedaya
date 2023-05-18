<?php echo view('layouts/Header') ?>
<?php echo view('layouts/Front-end') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Dana Keluar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Data Dana Keluar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>
            <?php if (session()->get('status') == 'bendahara') { ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    <i class="fas fa-plus nav-icon"></i> Tambah
                </button>
            <?php } ?>
        </div>
    </div>



    <div class="modal fade" id="modal-default">

        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary" style="font-family: arial black;font-size:18pt;">&nbsp;Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img class="modal-title" src="<?= base_url('img/logo.png') ?>" height="40">
                    </button>

                </div>
                <form method="post" action="Add-keluar" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Tanggal Keluar</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="tgl_keluar" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal Keluar Dana" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Dana</label>
                                    <select name="kd_jenis" data-placeholder="Pilih Jenis Dana" class="form-control select2bs4" required>
                                        <option value="" selected disabled></option>
                                        <?php foreach ($jenis as $value) : ?>
                                            <option value="<?= $value['kd_jenis'] ?>"><?= $value['jenis'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dana Keluar</label>
                                    <input type="text" name="dana_keluar" class="form-control" placeholder="Jumlah Dana Keluar" required>
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select name="id_satuan" data-placeholder="Pilih Jenis Satuan" class="form-control select2bs4" required>
                                        <option value="" selected disabled></option>
                                        <?php foreach ($satuan as $value) : ?>
                                            <option value="<?= $value['id_satuan'] ?>"><?= $value['satuan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                                </div>

                                <!-- <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" name="stock" value="1" class="form-control" id="part_number" placeholder="Stock">
                                </div> -->


                            </div>

                        </div>

                        <!-- /.form-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
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
                                    <th>Tanggal Keluar</th>
                                    <th>Jenis Dana</th>
                                    <th>Dana Keluar</th>
                                    <th>Satuan</th>
                                    <th>Keterangan</th>
                                    <th>Approval</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach ($out as $row) :
                                ?>
                                    <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $row['tgl_keluar'] ?></td>
                                        <td><?= $row['jenis'] ?></td>
                                        <td><?= $row['dana_keluar'] ?></td>
                                        <td><?= $row['satuan'] ?></td>
                                        <td><?= $row['keterangan'] ?></td>
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
                                        <td>
                                            <div class="nav-item dropup">
                                                <a class="nav-link" data-toggle="dropdown" href="#">
                                                    <i class="far fa-caret-square-down"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <form action="<?= base_url('/Dana-keluar/detail/') . $row['id_keluar']
                                                                    ?>" method="post">
                                                        <?= csrf_field();
                                                        ?>
                                                        <input type="hidden" name="_method" value="Edit">
                                                        <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-eye"></i>
                                                            Details
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="<?= base_url('/Dana-keluar/update/') . $row['id_keluar']
                                                                    ?>" method="post">
                                                        <?= csrf_field();
                                                        ?>
                                                        <input type="hidden" name="_method" value="Edit">
                                                        <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-edit"></i>
                                                            Update
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="<?= base_url('delete-keluar/') . $row['id_keluar'] ?>" method="post">
                                                        <?= csrf_field();
                                                        ?>
                                                        <input type="hidden" name="_method" value="Delete">
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Apakah anda yakin?');"><i class="nav-icon fas fa-trash-alt"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach
                                ?>
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