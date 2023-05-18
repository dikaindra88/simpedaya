<?php echo view('layouts/Header') ?>
<?php echo view('layouts/Front-end') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Data Dana Masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Detail Data Dana Masuk</li>
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                    <button type="button" class="btn btn-info btn-sm" onclick="javascript:history.back()">
                        <i class="fa fa-arrow-circle-left"></i> Back
                    </button>
                    <h1></h1>
                    <table class="table table-middle">
                        <tr>
                            <th width="20%">Tanggal Masuk</th>
                            <td width="1%">:</td>
                            <td><?php echo $in[0]['tgl_masuk'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Nama Donatur</th>
                            <td>:</td>
                            <td><?php echo $in[0]['nama_donatur'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>:</td>
                            <td><?php echo $in[0]['jenis_kelamin'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Status Donatur</th>
                            <td>:</td>
                            <td><?php echo $in[0]['status'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td><?php echo $in[0]['alamat'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Dana Masuk</th>
                            <td>:</td>
                            <td><?php echo $in[0]['dana_masuk'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Dana</th>
                            <td>:</td>
                            <td><?php echo $in[0]['jenis'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Satuan</th>
                            <td>:</td>
                            <td><?php echo $in[0]['satuan'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Bukti TF</th>
                            <td>:</td>
                            <td><a href="<?= '../../bukti-tf/' . $in[0]['bukti_tf'] ?>" class="preview" target="_blink"><img class="img-thumbnail" width="100px" height="100px" src="<?= '../../bukti-tf/' . $in[0]['bukti_tf'] ?>"></a></td>
                            </td>
                        </tr>

                        <tr>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td><?php echo $in[0]['keterangan'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Approve</th>
                            <td>:</td>
                            <td><?php echo $in[0]['approve'];
                                ?></td>
                        </tr>
                    </table>

                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>
<?php echo view('layouts/Footer') ?>