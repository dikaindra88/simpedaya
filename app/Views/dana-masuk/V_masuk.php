<?php echo view('layouts/Header') ?>
<?php echo view('layouts/Front-end') ?>
<style>
    .file-upload {
        background-color: #ffffff;
        width: auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #999;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #999;
        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #000;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Dana Masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Data Dana Masuk</li>
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
                <form method="post" action="Add-masuk" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Donatur</label>
                                    <select name="id_donatur" data-placeholder="Select Status" class="form-control select2bs4" required>
                                        <option value="" selected disabled></option>
                                        <?php foreach ($donate as $value) : ?>
                                            <option value="<?= $value['id_donatur'] ?>"><?= $value['nama_donatur'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="tgl_masuk" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal Masuk Dana" />
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
                                    <label>Dana Masuk</label>
                                    <input type="text" name="dana_masuk" class="form-control" placeholder="Jumlah Dana Masuk" required>
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select name="id_satuan" data-placeholder="Pilih Satuan" class="form-control select2bs4" required>
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
                                <div class="form-group">
                                    <label for="exampleInputFile">Bukti TF</i></label>
                                    <div class="input-group">
                                        <div class="file-upload">
                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" type='file' name="bukti_tf" onchange="readURL(this);" accept="image/*" />
                                                <div class="drag-text">
                                                    <h3>Click or Drag and drop a Image</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <th>Tanggal Masuk</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jenis Dana</th>
                                    <th>Dana Masuk</th>
                                    <th>Satuan</th>
                                    <th>Bukti TF</th>
                                    <th>Status</th>
                                    <th>Approval</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1; ?>
                                <?php foreach ($in as $row) :
                                ?>
                                    <tr class="text-center" style="padding: 5%; font-size: 9pt;">
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $row['tgl_masuk'] ?></td>
                                        <td><?= $row['nama_donatur'] ?></td>
                                        <td><?= $row['jenis_kelamin'] ?></td>
                                        <td><?= $row['jenis'] ?></td>
                                        <td><?= $row['dana_masuk'] ?></td>
                                        <td><?= $row['satuan'] ?></td>
                                        <td><a href="<?= '../../bukti-tf/' . $row['bukti_tf'] ?>" class="preview" target="_blink"><img class="img-thumbnail" width="60px" src="<?= '../../bukti-tf/' . $row['bukti_tf'] ?>"></a></td>
                                        <td><?= $row['status'] ?></td>
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
                                                    <form action="<?= base_url('/Dana-masuk/detail/') . $row['id_masuk'] ?>
                                                                    " method="post">
                                                        <?= csrf_field();
                                                        ?>
                                                        <input type="hidden" name="_method" value="Edit">
                                                        <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-eye"></i>
                                                            Details
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="<?= base_url('/Dana-masuk/update/') . $row['id_masuk'] ?>" method="post">
                                                        <?= csrf_field();
                                                        ?>
                                                        <input type="hidden" name="_method" value="Edit">
                                                        <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-edit"></i>
                                                            Update
                                                        </button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="<?= base_url('delete-masuk/') . $row['id_masuk'] ?>" method="post">
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