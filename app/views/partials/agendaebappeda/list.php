<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
 <style>
 
        body {
        
        background:#1C6DD0;
        background-size: auto;
        }
        
        .jarak {
            padding-top: 35px;
        }
        .jarak_table {
            margin-top: 10px;
        }
        h1 {
            font:Sans-serif;
            font-weight:bold;
            font-size:50px;
        }
        
        
    </style>




<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="">
        <div class="container-fluid">
            <div class="row ">
             <div class="col-md-2 ">
                 <br> </br>
                 <img src= "/agenda_bappeda/media/logo/logoheader.png" width="250px" hight= "125">
                 <br> </br>
                                <div>
                                     <center>
                                         <style>
                                        body {
                                            font-family: tahoma;
                                            color: #fff;
                                        }
                                        h2 {
                                           margin: 20px 10%;
                                           font-size: 40px;
                                           letter-spacing: 10px;
                                           font: arial Black;
                                        }
                                        .jam-digital {
                                           width: 100%;
                                           margin: 1% 1%;
                                        }
                                        #jam span {
                                           float: left;
                                           text-align: center;
                                           font-size: 20 px;
                                           margin: 0 2.5%;
                                           padding: 20px;
                                           width: 20%;
                                           border-radius: 10px;
                                           box-sizing: border-box;
                                        }
                                        #jam span:nth-child(1) {
                                           background: #a70c0c;
                                        }
                                        #jam span:nth-child(2) {
                                           background: #f6ab29;
                                        }
                                        #jam span:nth-child(3) {
                                           background: #298f19;
                                        }
                                        #jam::after {
                                           content: "";
                                           display: block;
                                           clear: both;
                                        }
                                        #unit span {
                                           float: left;
                                           width: 25%;
                                           text-align: center;
                                           text-transform: uppercase;
                                           letter-spacing: 1px;
                                           font-size: 15 px;
                                           text-shadow: 1px 1px 1px rgba(10, 10, 10, 0.7)
                                        }
                                        span.turn {
                                           animation: turn 0.7s ease;
                                        }
                                        @keyframes turn {
                                           0% {transform: rotateX(0deg)}
                                           100% {transform: rotateX(360deg)}
                                        }
                                        @media screen and (max-width: 720px){
                                           #jam span {
                                              float: center;
                                              text-align: center;
                                              font-size: 10px;
                                              margin: 0 1.5%;
                                              padding: 1px;
                                              width: 20%;
                                           }
                                           h2 {
                                              margin: 20px 5%;
                                           }
                                           .jam-digital {
                                              width: 10%;
                                              margin: 1% 1%;
                                           }
                                           #unit span {
                                              width: 23%;
                                           }
                                        }
                                </style>
                       <html>
                            <body>
                                 
                                
                                    
                                   <div id="jam"></div>
                                   <div id="unit">
                                         <span>Jam</span>
                                         <span>Menit</span>
                                         <span>Detik</span>
                                    </div>
                                 
                                <script>
                                    function animation(span) {
                                       span.className = "turn";
                                       setTimeout(function () {
                                          span.className = ""
                                       }, 700);
                                    }
                                    
                                    function jam() {
                                       setInterval(function () {
                                    
                                          var waktu = new Date();
                                          var jam   = document.getElementById('jam');
                                          var hours = waktu.getHours();
                                          var minutes = waktu.getMinutes();
                                          var seconds = waktu.getSeconds();
                                    
                                          if (waktu.getHours() < 10)
                                          {
                                             hours = '0' + waktu.getHours();
                                          }
                                          if (waktu.getMinutes() < 10)
                                          {
                                             minutes = '0' + waktu.getMinutes();
                                          }
                                          if (waktu.getSeconds() < 10)
                                          {
                                             seconds = '0' + waktu.getSeconds();
                                          }
                                          jam.innerHTML  = '<span>' + hours + '</span>'
                                                         + '<span>' + minutes + '</span>'
                                                         + '<span>' + seconds +'</span>';
                                    
                                          var spans      = jam.getElementsByTagName('span');
                                          animation(spans[2]);
                                          if (seconds == 0) animation(spans[1]);
                                          if (minutes == 0 && seconds == 0) animation(spans[0]);
                                    
                                       }, 1000);
                                    }
                                    
                                    jam();
                                </script>
                            </body>
                        </html>
                        </center>
                    </div>
                    
                    </div>
                <div class="col-md-8">
                    <div class="">
                    <div>
                         <br> </br> 
                        <center>
                            <b><b><h1 style="color:#fff;" class="record-title">AGENDA BAPPEDA KABUPATEN WONOSOBO</h1></b></b>
                        </center>
                    </div>
                    </div>
                    <div class=""><div>
                    <center>
                        <h3 style="color:#fff;"><b> Tanggal :
                            <?php
                            function tgl_indo($tanggal){
                            $bulan = array (
                            1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                            );
                            $pecahkan = explode('-', $tanggal);
                            // variabel pecahkan 0 = tanggal
                            // variabel pecahkan 1 = bulan
                            // variabel pecahkan 2 = tahun
                            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                            }
                            echo tgl_indo(date('Y-m-d'));
                            ?>
                        </b>
                        </h3>
                        <div>
                    <br><marquee width="1000" height="120"><h4 style="color:#fff";><b>Jam Kerja Bappeda : Senin- Kamis = 07.30 - 16.00 | Jumat 07.30-11.00</b></h4></marquee></br>
                </div>
                    </center> 
                </div>
                
                </div><div class="">

            </div>
        </div>
        <div class="col-md-2 ">
            <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                 <br> </br> 
                <div class="card mb-2">
                    <div class="card-header h6 h6">Agenda Hari Ini</div>
                    <div class="p-2">
                        <input class="form-control datepicker"  value="<?php echo $this->set_field_value('tb_agenda_Tanggal') ?>" type="datetime"  name="v_agenda_Tanggal" placeholder="" data-enable-time="" data-date-format="Y-m-d" data-alt-format="M j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                        </div>
                    </div>
                    <hr />
                    <div class="form-group text-center">
                        <button class="btn btn-primary">pilih</button>
                    </div>
                </form>
            </div>
                
                
        </div>
    </div>
</div>
<?php
}
?>
<div  class="bg-#FFA500">
    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="col-md-8 comp-grid">
                <?php $this :: display_page_errors(); ?>
                <div  class="card animated fadeIn page-content">
                    <div id="v_agenda-list-records">
                        <div id="page-report-body" class="table-fixed">
                            <table class="table  table-striped table-hover text-center">
                                <thead class="table-header header-tabel text-info">
                                    <tr>
                                        <th class="td-sno">No</th>
                                        <th  style="width:35%" class="td-Acara"> Agenda</th>
                                        <th style="width:20%" class="td-Penyelenggara"> Penyelenggara</th>
                                        <th style="width:10%" class="td-Jam"> Jam</th>
                                        <th style="width:10%" class="td-Tempat"> Tempat</th>
                                        <th style="width:15%" class="td-Keterangan"> Keterangan</th>
                                    </tr>
                                </thead>
                                <?php
                                if(!empty($records)){
                                ?>
                                <tbody  id="page-data-<?php echo $page_element_id; ?>">
                                    <!--record-->
                                    <?php
                                    $counter = 0;
                                    foreach($records as $data){
                                    $rec_id = (!empty($data['']) ? urlencode($data['']) : null);
                                    $counter++;
                                    ?>
                                    <tr>
                                        <td class="td-sno"><?php echo $counter; ?></td>
                                        <td align="left" class="td-Acara"> <?php echo $data['Acara']; ?></td>
                                        <td class="td-Penyelenggara"> <?php echo $data['Penyelenggara']; ?></td>
                                        <td class="td-Jam"> <?php echo $data['Jam']; ?></td>
                                        <td class="td-Tempat"> <?php echo $data['Tempat']; ?></td>
                                        <td align="left" class="td-Keterangan"> <?php echo $data['Keterangan']; ?></td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                    <!--endrecord-->
                                </tbody>
                                <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                <?php
                                }
                                ?>
                            </table>
                            <?php 
                            if(empty($records)){
                            ?>
                            <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                <i class="fa fa-ban"></i> No record found
                            </h4>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                        if( $show_footer && !empty($records)){
                        ?>
                        <div class=" border-top mt-2">
                            <div class="row justify-content-center">    
                                <div class="col-md-auto justify-content-center">    
                                    <div class="p-3 d-flex justify-content-between">    
                                    </div>
                                </div>
                                <div class="col">   
                                    <?php
                                    if($show_pagination == true){
                                    $pager = new Pagination($total_records, $record_count);
                                    $pager->route = $this->route;
                                    $pager->show_page_count = true;
                                    $pager->show_record_count = true;
                                    $pager->show_page_limit =true;
                                    $pager->limit_count = $this->limit_count;
                                    $pager->show_page_number_list = true;
                                    $pager->pager_link_range=5;
                                    $pager->render();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-4 comp-grid ">
                <div class="row g-0" 
                <div class="row">
                <div class="col-md-6 comp-grid">
                 <div class=""><div>
                    <center> 
                        <h5 style="color:#fff;"> <b> Ruang Rapat Utama </b> </h5>
                         <h6 style="color:#ffd700;"> <b> ( Hari Ini ) </b></h6>
                    </center>
                    <!DOCTYPE html>
                    <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <style>
                                        th, td {
                                        Width: 600px;
                                        }
                                    </style>
                                </head>
                                <body>
                                    <table>
                                        <?php
                                        $servername = "localhost";
                                        $database = "u1567219_agendabappeda";
                                        $username = "u1567219_agenda";
                                        $password = "Diponegoro_8";
                                        $conn = mysqli_connect($servername, $username, $password, $database);
                                        $ambildata = mysqli_query($conn,"select * from tb_rrutama");
                                        while($tampil = mysqli_fetch_array($ambildata)){
                                        echo "
                                        
                                        <tr>
                                            <th bgcolor='#ffd700'><center>Acara</center></th>
                                        </tr>
                                        <tr>
                                            <td style='color:#fff'><center>$tampil[acara_utama1]</center></td>
                                        </tr>
                                        <tr>
                                            <th bgcolor='#ffd700'><center>Jam</center></th>
                                        </tr>
                                        <tr>
                                            <td style='color:#fff'><center>$tampil[jam_utama1]</center></td>
                                        </tr>
                                        <tr>
                                            <td style='color:#fff'><center>______________________________</center></td>
                                        </tr>";
                                        }
                                        ?>
                                    </table>
                                </body>
                            </html>
                            </div>
                        </div>
                        </div>
                    
                    
                    <div class="col-md-6 comp-grid">
                     <div class=""><div>    
                            <center> 
                                <h5 style="color:#fff;"><b> Ruang Rapat Atas </b></h5>
                                 <h6 style="color:#ffd700;"> <b> ( Hari Ini ) </b></h6>
                            </center>
                            <!DOCTYPE html>
                            <html lang="en">
                                <head>
                                    <meta charset="UTF-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                            
                                            <style>
                                                th, td {
                                                Width: 600px;
                                                }
                                            </style>
                                        </head>
                                        <body>
                                            <table>
                                                <?php
                                                 $servername = "localhost";
                                            $database = "u1567219_agendabappeda";
                                        $username = "u1567219_agenda";
                                        $password = "Diponegoro_8";
                                                $conn = mysqli_connect($servername, $username, $password, $database);
                                                $ambildata = mysqli_query($conn,"select * from tb_rratas");
                                                while($tampil = mysqli_fetch_array($ambildata)){
                                                echo "
                                                
                                                <tr>
                                                    <th bgcolor='#ffd700'><center>Acara</center></th>
                                                </tr>
                                                <tr>
                                                    <td style='color:#fff'><center>$tampil[acara_atas1]</center></td>
                                                </tr>
                                                <tr>
                                                    <th bgcolor='#ffd700'><center>Jam</center></th>
                                                </tr>
                                                <tr>
                                                    <td style='color:#fff'><center>$tampil[jam_atas1]</center></td>
                                                </tr>
                                                <tr>
                                                    <td style='color:#fff'><center>______________________________</center></tr>
                                                </td>";
                                                }
                                                ?>
                                            </table>
                                        </body>
                                    </html>
                                </div>
                            </div>
                            </div>
                        </div>
                     
                    <div class="col-md-12 comp-grid">
                        <div class="jarak"><div>    
                            <center> 
                                <h1>    </h1>
                                <h5 style="color:#fff;"><b> Jadwal Pemakaian Ruang Rapat </b></h5>
                                 
                            </center>
                            <div  class="bg-#FFA500">
    <div class="col-md-12 comp-grid">
        <div class="row align-items-start">
            <?php $this :: display_page_errors(); ?>
                <div  class="card animated fadeIn page-content jarak_table">
                    <div id="tb_rr_tanggal_rr-list-records">
                        <div id="page-report-body" class="table-fixed">
                             <table style=bg-#FFA500 class=" table  table-striped table-hover text-center">
                            <thead class="table-header header-tabel text-info">
                            <tr>
                            <th style="width:5%">No</th>
                            <th>Agenda</th>
            
                            </tr>
                            </thead>
                                   <?php
                                                 
                                    $servername = "localhost";
                                        $database = "u1567219_agendabappeda";
                                        $username = "u1567219_agenda";
                                        $password = "Diponegoro_8";
                                    $nomer=1;
                                    $conn = mysqli_connect($servername, $username, $password, $database);
                                                $ambildata = mysqli_query($conn,"select * from tb_rr");
                                                while($tampil = mysqli_fetch_array($ambildata)){
                                                echo "
                                               
                                    <tr>
                                                
                                    <td>$nomer</td>
                                    <td> <b> $tampil[acara_rr]  ($tampil[bidang_rr]) </b> <br/> Hari/Tgl : <b> $tampil[hari_tgl_rr] </b> Jam:<b> $tampil[jam_rr] </b> Peserta : <b> $tampil[tempat_rr] $tampil[ket_rr]   </b> 
                                    </td>
                                        
                                    </tr>
                                               
                                    ";
                                    $nomer++;
                                    }
                                    ?>

            </table>
                                            </div>
                            </div>
                        </div>

                    </div>
                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    </div>  
                </div>
             </div>
        </div>
                <div  class="">
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-12 comp-grid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
