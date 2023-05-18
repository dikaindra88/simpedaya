<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dana Masuk <?php echo date('F Y') ?>.pdf</title>
    <link rel="icon" href="<?= base_url('img/logo1.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    th {
        width: 100%;
        border: 1px solid #000;
        padding: 8px;

        font-family: Arial, Helvetica, sans-serif;
    }
</style>
<style>
    @media print {
        @page {
            margin-top: 20px;
            size: potrait;
        }

        .btn,
        footer,
        a#debug-icon-link {
            display: none;
        }
    }

    table {

        border-collapse: collapse;
    }
</style>
<script>
    window.print()
</script>

<body>
    <img src="<?= base_url('img/logo.png') ?>" style="width:100px; height:auto; position:absolute;margin-top:1%;">
    <!-- <img src="assets/img/soetta.jpg" style="width:auto; height:60px; position:absolute; margin-left:88%;">
     -->
    <table width="100%">
        <tr>
            <td align="center">
                <span style="margin-left:5%;line-height:1.6; color:blue; font-size:24pt; font-weight:bold;font-family:Arial, Helvetica, sans-serif;">
                    YAYASAN CAHAYA BUANA NYIUR <br>
                </span>
                <span style="margin-left:5%;font-size:8pt;font-family:Arial, Helvetica, sans-serif;">
                    Kp. Wates Rt. 001/012 Ds. Kp. Melayu Timur Kec. Teluknaga Kab. Tangerang-Banten 15510 <br> Hp. 082112414688/087889175528 email : lpkcbn22@gmail.com <br>SK Nomor : AHU-0019429.AH.01.12. TAHUN 2022 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NPWP : 60.359.757.6-418.000
                </span>
            </td>
        </tr>
    </table>

    <hr />
    <p style="font-weight:bold;font-size:12pt;font-family:Arial, Helvetica, sans-serif;" align="center">REPORT DATA DANA MASUK</p>
    <span style="font-size:10pt;font-family:Arial, Helvetica, sans-serif;" align="left">Tanggal Data : <?php echo $first_date . ' s/d ' . $end_date ?></span>
    <table style="border:1px solid #000;border-collapse: collapse;" width="100%" cellpadding="0">
        <thead>
            <tr class="bg-secondary text-center" style=" font-size: 8pt; background-color:#999; color:white;border:1px solid #000;">
                <th style="width: 1%;">No</th>
                <th style="width: 10%;">Approval</th>
                <th style="width: 15%;">Tanggal Masuk</th>
                <th style="width: 25%;">Nama Donatur</th>
                <th style="width: 12%;">Jenis Dana</th>
                <th style="width: 8%;">Satuan</th>
                <th style="width: 15%;">Keterangan</th>
                <th style="width: 20%;">Dana Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>

            <?php foreach ($in  as $rows) : ?>
                <tr class="text-center" style="width: 100%; font-size: 8pt;
        border:1px solid #000;
        padding: 8px;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;">
                    <td style="border:1px solid #000;padding: 2px;"><?php echo $nomor++ ?>.</td>
                    <td style="border:1px solid #000;padding: 2px;"><?php
                                                                    if ($rows['id_approve'] == '1') {
                                                                    ?>
                            Approved
                        <?php } elseif ($rows['id_approve'] == '2') {
                        ?>
                            Progress
                        <?php } else { ?>
                            Not Approved
                        <?php } ?>
                    </td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['tgl_masuk'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['nama_donatur'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['jenis'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['satuan'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['keterangan'] ?></td>
                    <td style="border:1px solid #000;padding: 2px;"><?= $rows['dana_masuk'] ?></td>


                    </div>
                </tr>
            <?php endforeach ?>
            <tr class="text-center" style="width: 100%; font-size: 8pt;
        border:1px solid #000;
        padding: 8px;
        color: #000;
        font-family: Arial, Helvetica, sans-serif;">
                <td style="border:1px solid #000;padding: 2px;" colspan="7">Total Dana Masuk</td>
                <td><?= $sum[0]['dana_masuk'] ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>