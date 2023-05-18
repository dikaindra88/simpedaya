<?php echo view('Layouts/Header') ?>
<?php echo view('Layouts/Front-end') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Data Donatur</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Update Data Donatur</li>
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
                    <form method="post" action="/Edit-donatur/<?= $donate[0]['id_donatur'] ?>" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Donatur</label>
                                        <input type="text" name="nama_donatur" value="<?= $donate[0]['nama_donatur'] ?>" class="form-control" placeholder="Nama Donatur" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" data-placeholder="Pilih Jenis Kelamin" class="form-control select2bs4" required>
                                            <option value="<?= $donate[0]['jenis_kelamin'] ?>" selected><?= $donate[0]['jenis_kelamin'] ?></option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Usia Donatur</label>
                                        <input type="text" name="usia" value="<?= $donate[0]['usia'] ?>" class="form-control" placeholder="Usia Donatur" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" name="status" value="<?= $donate[0]['status'] ?>" class="form-control" placeholder="Status" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" value="<?= $donate[0]['alamat'] ?>" class="form-control" placeholder="Alamat Donatur" required>
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
                            <input type="hidden" name="id_donatur" value="<?php echo $donate[0]['id_donatur']; ?>">
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