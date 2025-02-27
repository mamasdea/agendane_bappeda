<html>

<head>
    <title>Agendane Bappeda</title>
    <link href="/agendane/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&family=Raleway:wght@300;500;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/agendane/icon bappeda.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Skranji:wght@700&display=swap" rel="stylesheet">

</head>

<body>

    <?php
    include "koneksi.php";
    $tgl = date("Y-m-d");

    // Function to display room bookings based on criteria
    function displayRoomBookings($conn, $tgl, $tempat_rr, $title_id)
    {
        $query_rr = mysqli_prepare($conn, "SELECT * FROM tb_rr WHERE tanggal_rr = ? AND tempat_rr = ?");
        mysqli_stmt_bind_param($query_rr, "ss", $tgl, $tempat_rr);
        mysqli_stmt_execute($query_rr);
        $result_rr = mysqli_stmt_get_result($query_rr);
        $jumlah_data_rr = mysqli_num_rows($result_rr);

        echo '<table>';
        echo '<thead><tr><th><h6 class="ruang-rapat-2" id="' . $title_id . '"><b>' . $title_id . ' </b></h6></th></tr></thead>';
        echo '<tbody>';

        $no = 0;
        while ($row_rr = mysqli_fetch_array($result_rr)) {
            $no++;
    ?>
            <tr>
                <td class="acara2">
                    <acara><?php echo $row_rr['acara_rr'] ?></acara><br>
                    <keterangan><b>Jam</b> : <?php echo $row_rr['jam_rr'] ?> <b>Penyelenggara</b> : <?php echo $row_rr['bidang_rr'] ?></keterangan>
                </td>
            </tr>
    <?php
        }

        echo '</tbody>';
        echo '</table>';

        if ($jumlah_data_rr == 0) {
            echo '<script>document.getElementById("' . $title_id . '").style.display = "none";</script>';
        }
    }

    // Function to convert date to Indonesian format
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>

    <div class="hero wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="">
                                <h1 class="judul">AGENDA BAPPEDA HARI INI</h1>
                            </div>
                            <div class="judul-tanggal">
                                <h2 class="judul-tanggal">Tanggal : <?php echo tgl_indo(date('Y-m-d')); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="logo-row">
                        <div class="Logo">
                            <img src="/agendane/logoheader.png" alt="">
                        </div>
                        <div class="Logo">
                            <img src="/agendane/logo-1.png" alt="">
                        </div>
                        <div class="logo">
                            <div class="box-jam">
                                <div class="jam-analog">
                                    <p class="wib">Waktu Indonesia Bappeda</p>
                                    <p id="clock"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th width="5%">NO</th>
                            <th>AGENDA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_agenda = mysqli_prepare($conn, "SELECT * FROM v_agenda WHERE Tanggal = ?");
                        mysqli_stmt_bind_param($query_agenda, "s", $tgl);
                        mysqli_stmt_execute($query_agenda);
                        $result_agenda = mysqli_stmt_get_result($query_agenda);
                        $jumlah_data_agenda = mysqli_num_rows($result_agenda);

                        $no = 0;
                        while ($row_agenda = mysqli_fetch_array($result_agenda)) {
                            $no++;
                        ?>
                            <tr>
                                <td class="nomor">
                                    <h1><?php echo $no ?></h1>
                                </td>
                                <td class="acara">
                                    <acara><?php echo $row_agenda['Acara'] ?></acara><br>
                                    <keterangan><b>Tempat</b> : <?php echo $row_agenda['Tempat'] ?> <b>Jam</b> : <?php echo $row_agenda['Jam'] ?> <b>Disposisi</b> : <?php echo $row_agenda['Keterangan'] ?></keterangan>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">
                                <p>Jumlah data : <?php echo $jumlah_data_agenda; ?></p>
                            </th>
                        </tr>
                    </tfoot>
                </table>
                <?php
                if ($jumlah_data_agenda == 0) {
                ?>
                    <h4 class="data-kosong">
                        <i class="fa fa-ban"></i> &nbsp; Hari Ini Tidak Ada Agenda
                    </h4>
                <?php
                }
                ?>
            </div>

            <div class="col-md-4 col-sm-12 rapat">
                <div class="row">
                    <label class="judul_rr">Pemakaian Ruang Rapat Hari Ini </label>

                    <div class="col-md-12 col-sm-12">
                        <table class="">
                            <th>
                                <h6 class="ruang-rapat" id="rr-utama-title"><b>RUANG RAPAT UTAMA </b></h6>
                            </th>

                            <?php
                            $ambildata1 = mysqli_query($conn, "SELECT * FROM tb_rr WHERE tanggal_rr='$tgl' AND tempat_rr='RR Utama'");
                            $no = 0;
                            $isRrUtamaKosong = true;
                            while ($tampil1 = mysqli_fetch_array($ambildata1)) {
                                $no++;
                                $isRrUtamaKosong = false;
                            ?>
                                <tr>
                                    <td class="acara2">
                                        <acara><?php echo $tampil1['acara_rr'] ?> </acara></br>
                                        <keterangan><b>Jam</b> : <?php echo $tampil1['jam_rr'] ?> <b>Penyelenggara</b> : <?php echo $tampil1['bidang_rr'] ?> </keterangan>
                                    </td>
                                </tr>
                            <?php
                            }
                            if ($isRrUtamaKosong) {
                                echo '<script>document.getElementById("rr-utama-title").style.display = "none";</script>';
                            }
                            ?>
                        </table>

                        <table class="">
                            <th>
                                <h6 class="ruang-rapat-2" id="rr-atas-title"><b>RUANG RAPAT ATAS </b></h6>
                            </th>

                            <?php
                            $ambildata2 = mysqli_query($conn, "SELECT * FROM tb_rr WHERE tanggal_rr='$tgl' AND tempat_rr='RR Atas'");
                            $no = 0;
                            $isRrAtasKosong = true;
                            while ($tampil2 = mysqli_fetch_array($ambildata2)) {
                                $no++;
                                $isRrAtasKosong = false;
                            ?>
                                <tr>
                                    <td class="acara2">
                                        <acara><?php echo $tampil2['acara_rr'] ?> </acara></br>
                                        <keterangan><b>Jam</b> : <?php echo $tampil2['jam_rr'] ?> <b>Penyelenggara</b> : <?php echo $tampil2['bidang_rr'] ?></keterangan>
                                    </td>
                                </tr>
                            <?php
                            }
                            if ($isRrAtasKosong) {
                                echo '<script>document.getElementById("rr-atas-title").style.display = "none";</script>';
                            }
                            ?>
                        </table>

                        <table class="">
                            <th>
                                <h6 class="ruang-rapat-2" id="rr-pojok-title"><b>RUANG RAPAT POJOK </b></h6>
                            </th>

                            <?php
                            $ambildata3 = mysqli_query($conn, "SELECT * FROM tb_rr WHERE tanggal_rr='$tgl' AND tempat_rr='RR Pojok'");
                            $no = 0;
                            $isRrPojokKosong = true;
                            while ($tampil3 = mysqli_fetch_array($ambildata3)) {
                                $no++;
                                $isRrPojokKosong = false;
                            ?>
                                <tr>
                                    <td class="acara2">
                                        <acara><?php echo $tampil3['acara_rr'] ?> </acara></br>
                                        <keterangan><b>Jam</b> : <?php echo $tampil3['jam_rr'] ?> <b>Penyelenggara</b> : <?php echo $tampil3['bidang_rr'] ?></keterangan>
                                    </td>
                                </tr>
                            <?php
                            }
                            if ($isRrPojokKosong) {
                                echo '<script>document.getElementById("rr-pojok-title").style.display = "none";</script>';
                            }
                            ?>
                        </table>

                        <?php
                        if ($isRrUtamaKosong && $isRrAtasKosong && $isRrPojokKosong) {
                        ?>
                            <h4 class="data-kosong">
                                <i class="fa fa-ban"></i> &nbsp; Tidak Ada Jadwal
                            </h4>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 rapat">
                    <center><label class="judul_rr jadwal">Jadwal Pemakaian Ruang Rapat </label> </center>
                    <table class="styled-table1">
                        <thead>
                            <th width="5%">
                                NO
                            </th>
                            <th>
                                AGENDA
                            </th>
                        </thead>


                        <?php
                        $ambildata = mysqli_query($conn, "select * from tb_rr WHERE tanggal_rr > '$tgl' ");
                        $jumlah_data1 = mysqli_num_rows($ambildata);
                        $no = 0;
                        while ($tampil = mysqli_fetch_array($ambildata)) {
                            $no++

                        ?>

                            <tr>
                                <td class="nomor1">
                                    <h2><?php echo $no ?></h2>
                                </td>
                                <td class="acara1">
                                    <acara><?php echo $tampil['acara_rr'] ?> &nbsp; (<?php echo $tampil['bidang_rr'] ?>) </acara></br>
                                    <keterangan><b>Hari</b> : <?php echo $tampil['hari_tgl_rr'] ?> <b>Tempat</b> : <?php echo $tampil['tempat_rr'] ?> <b>Jam</b> : <?php echo $tampil['jam_rr'] ?> <b>Peserta</b> : <?php echo $tampil['ket_rr'] ?></keterangan>
                                </td>
                            </tr>
                            <?php
                            if (empty($tampil)) {
                            ?>
                                <h4 class="data-kosong">
                                    <i class="fa fa-ban"></i>- Tidak Ada Jadwal -
                                </h4>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>

                        <tfoot height="5px">
                            <th colspan="2">
                                <p> Jumlah data : <?php echo $jumlah_data1; ?></p>
                            </th>
                        </tfoot>


                    </table>
                </div>

            </div>


        </div>
    </div>

    <div id="footer">
        <p>© Bappeda Wonosobo - ( 2023 - <?php echo date('Y') ?> ) by <b>Dea Aldy Alfian</b></p>
    </div>

    <!-- Include your JavaScript for clock here -->
    <script>
        function addZero(i) {
            if (i < 10) {
                i = "0" + i
            }
            return i;
        }

        setInterval(customClock, 500);

        function customClock() {
            var time = new Date();
            var hrs = addZero(time.getHours());
            var min = addZero(time.getMinutes());
            var sec = addZero(time.getSeconds());

            document.getElementById('clock').innerHTML = hrs + ":" + min + ":" + sec;
        }
    </script>

</body>

</html>

<?php
// Close prepared statements and database connection
mysqli_stmt_close($query_agenda);
mysqli_close($conn);
?>

</html>