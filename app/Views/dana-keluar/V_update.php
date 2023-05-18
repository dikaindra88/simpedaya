<?php echo view('Layouts/Header') ?>
<?php echo view('Layouts/Front-end') ?>
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
                    <h1 class="m-0">Update Data Dana Keluar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Update Data Dana Keluar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <hr>
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="/Edit-keluar/<?= $out[0]['id_keluar'] ?>" enctype="multipart/form-data">

                        <div class="card">
                            <div class="card-body">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="tgl_keluar" value="<?php echo $out[0]['tgl_keluar'] ?>" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="<?php echo $out[0]['tgl_keluar'] ?>" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Dana</label>
                                        <select name="kd_jenis" data-placeholder="Pilih Jenis Dana" class="form-control select2bs4" required>
                                            <option value="<?= $out[0]['kd_jenis'] ?>" selected><?= $out[0]['jenis'] ?></option>
                                            <?php foreach ($jenis as $value) : ?>
                                                <option value="<?= $value['kd_jenis'] ?>"><?= $value['jenis'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Dana Keluar</label>
                                        <input type="text" name="dana_keluar" value="<?= $out[0]['dana_keluar'] ?>" class="form-control" placeholder="Jumlah Dana Keluar" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <select name="id_satuan" data-placeholder="Pilih Satuan" class="form-control select2bs4" required>
                                            <option value="<?= $out[0]['id_satuan'] ?>" selected><?= $out[0]['satuan'] ?></option>
                                            <?php foreach ($satuan as $value) : ?>
                                                <option value="<?= $value['id_satuan'] ?>"><?= $value['satuan'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" value="<?= $out[0]['keterangan'] ?>" class="form-control" placeholder="Keterangan" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Approved</label>
                                        <select name="id_approve" data-placeholder="Pilih Approve" class="form-control select2bs4" required>
                                            <option value="<?= $out[0]['id_approve'] ?>" selected><?= $out[0]['approve'] ?></option>
                                            <?php foreach ($approve as $value) : ?>
                                                <option value="<?= $value['id_approve'] ?>"><?= $value['approve'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer bg-transparent border-success">
                            <button type="submit" class="btn btn-outline-success d-grid gap-2 col-2 mx-auto">
                                <i class="far fa-save"></i> Save
                            </button>
                            <button type="button" class="btn btn-outline-danger d-grid gap-2 col-2 mx-auto" onclick="javascript:history.back()">
                                <i class="fa fa-arrow-circle-left"></i> Cancel
                            </button>
                            <input type="hidden" name="id_keluar" value="<?php echo $out[0]['id_keluar']; ?>">
                        </div>
                </div>
            </div>
        </div>
    </section>
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
    <?php echo view('Layouts/Footer') ?>