<?php echo view('layouts/Header') ?>
<?php echo view('layouts/Front-end') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Data Dana Keluar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Detail Data Dana Keluar</li>
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
                            <th width="20%">Tanggal Keluar</th>
                            <td width="1%">:</td>
                            <td><?php echo $out[0]['tgl_keluar'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Dana</th>
                            <td>:</td>
                            <td><?php echo $out[0]['jenis'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Dana Keluar</th>
                            <td>:</td>
                            <td><?php echo $out[0]['dana_keluar'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Satuan</th>
                            <td>:</td>
                            <td><?php echo $out[0]['satuan'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td><?php echo $out[0]['keterangan'];
                                ?></td>
                        </tr>
                        <tr>
                            <th>Approval</th>
                            <td>:</td>
                            <td><?php echo $out[0]['approve'];
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