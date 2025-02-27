<?php
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>

<style>
    .card-title {
        font-size: 40px;
        font-weight: 400;
    }
</style>
<div>
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-12 comp-grid">

        <body>
            <?php

            include "koneksi.php";
            function hitungAgenda($conn)
            {
                // Mendapatkan tanggal hari ini
                $today = date('Y-m-d');

                // Mendapatkan tanggal besok
                $tomorrow = date('Y-m-d', strtotime('+1 day'));

                // Mendapatkan tanggal awal dan akhir minggu ini (Senin - Minggu)
                $startOfWeek = date('Y-m-d', strtotime('monday this week'));
                $endOfWeek = date('Y-m-d', strtotime('sunday this week'));

                // Mendapatkan tanggal awal dan akhir bulan ini
                $startOfMonth = date('Y-m-01');
                $endOfMonth = date('Y-m-t');

                // Menghitung jumlah agenda bulan ini
                $sqlBulanIni = "SELECT COUNT(*) AS jumlah_bulan_ini FROM tb_agenda WHERE Tanggal BETWEEN '$startOfMonth' AND '$endOfMonth'";
                $resultBulanIni = $conn->query($sqlBulanIni);
                $jumlahBulanIni = $resultBulanIni->fetch_assoc()['jumlah_bulan_ini'];

                // Menghitung jumlah agenda minggu ini
                $sqlMingguIni = "SELECT COUNT(*) AS jumlah_minggu_ini FROM tb_agenda WHERE Tanggal BETWEEN '$startOfWeek' AND '$endOfWeek'";
                $resultMingguIni = $conn->query($sqlMingguIni);
                $jumlahMingguIni = $resultMingguIni->fetch_assoc()['jumlah_minggu_ini'];

                // Menghitung jumlah agenda hari ini
                $sqlHariIni = "SELECT COUNT(*) AS jumlah_hari_ini FROM tb_agenda WHERE Tanggal = '$today'";
                $resultHariIni = $conn->query($sqlHariIni);
                $jumlahHariIni = $resultHariIni->fetch_assoc()['jumlah_hari_ini'];

                // Menghitung jumlah agenda besok
                $sqlBesok = "SELECT COUNT(*) AS jumlah_besok FROM tb_agenda WHERE Tanggal = '$tomorrow'";
                $resultBesok = $conn->query($sqlBesok);
                $jumlahBesok = $resultBesok->fetch_assoc()['jumlah_besok'];

                // Mengembalikan hasil
                return [
                    'bulan_ini' => $jumlahBulanIni,
                    'minggu_ini' => $jumlahMingguIni,
                    'hari_ini' => $jumlahHariIni,
                    'besok' => $jumlahBesok
                ];
            }

            // Memanggil fungsi dan menampilkan hasil
            $jumlahAgenda = hitungAgenda($conn);

            $conn->close();
            ?>

            <div class="container mt-5">
                <h4 class="text-center">Dashboard Agenda Bappeda Kab. Wonosobo</h4>
                <div class="row text-center mt-4">
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-header"> Jumlah Agenda Bulan Ini</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $jumlahAgenda['bulan_ini'] ?></h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Jumlah Agenda Minggu Ini</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $jumlahAgenda['minggu_ini'] ?></h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Jumlah Agenda Hari Ini</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $jumlahAgenda['hari_ini'] ?></h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Jumlah Agenda Besok</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $jumlahAgenda['besok'] ?></h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS and dependencies -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
    </div>
</div>