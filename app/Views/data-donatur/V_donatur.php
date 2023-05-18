<?php echo view('layouts/Header') ?>
<?php echo view('layouts/Front-end') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Donatur</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Data Donatur</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <hr>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-plus nav-icon"></i> Tambah
            </button>

            <a href="<?= base_url('Pdf-donatur')
                        ?>" target="_blank" class="btn btn-outline btn-danger ">
                <i class="fas fa-file-pdf"></i> Pdf
            </a>
            <a href="<?= base_url('Print-donatur')
                        ?>" target="_blink" class="btn btn-outline-secondary btn-light">
                <i class="fas fa-print"></i> Print</a>
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
                <form method="post" action="Add-donatur" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Donatur</label>
                                    <input type="text" name="nama_donatur" class="form-control" placeholder="Nama Donatur" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin" class="form-control select2bs4" required>
                                        <option value=""></option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="textarea" name="alamat" class="form-control" placeholder="Alamat Donatur" required>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" name="status" class="form-control" placeholder="Status" required>
                                </div>
                                <div class="form-group">
                                    <label>Usia Donatur</label>
                                    <input type="text" name="usia" class="form-control" placeholder="Usia Donatur" required>
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
                                    <th>Nama Donatur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Status</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach ($donate as $row) :
                                ?>
                                    <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $row['nama_donatur'] ?></td>
                                        <td><?= $row['jenis_kelamin'] ?></td>
                                        <td><?= $row['usia'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td><?= $row['alamat'] ?></td>
                                        <td>
                                            <div class="nav-item dropup">
                                                <a class="nav-link" data-toggle="dropdown" href="#">
                                                    <i class="far fa-caret-square-down"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">

                                                    <form action="<?= base_url('/Data-donatur/update/') . $row['id_donatur']
                                                                    ?>" method="post">
                                                        <?= csrf_field();
                                                        ?>
                                                        <input type="hidden" name="_method" value="Edit">
                                                        <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-edit"></i>
                                                            Update
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="<?= base_url('delete-donatur/') . $row['id_donatur'] ?>" method="post">
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-upload-wrap').hide();

                    $('.file-upload-image').attr('src', e.target.result);
                    $('.file-upload-image1').hide();
                    $('.file-upload-content').show();
                    $('.file-upload-content1').show();

                    $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

            } else {
                removeUpload();
            }
        }

        function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
        }

        function removeUpload1() {

            $('.file-upload-content1').hide();
            $('.image-title-wrap1').hide();
        }
        $('.image-upload-wrap').bind('dragover', function() {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function() {
            $('.image-upload-wrap').removeClass('image-dropping');
        });
    </script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $('#flash_data').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove()
            });
        }, 2500);
    </script>
</div>
<?php echo view('layouts/Footer') ?>