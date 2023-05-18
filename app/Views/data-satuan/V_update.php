<?php echo view('Layouts/Header') ?>
<?php echo view('Layouts/Front-end') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Data Satuan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                        <li class="breadcrumb-item active">Update Data Satuan</li>
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
                    <form method="post" action="/Edit-satuan/<?= $satuan[0]['id_satuan'] ?>" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" name="satuan" value="<?= $satuan[0]['satuan'] ?>" class="form-control" placeholder="Satuan" required>
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
                            <input type="hidden" name="id_satuan" value="<?php echo $satuan[0]['id_satuan']; ?>">
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