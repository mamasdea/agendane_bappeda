<!DOCTYPE html>
<html>

<head>
	<title><?php echo $this->report_title; ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<style>
		@page {
			margin: 0px;
			font-family: "Poppins", sans-serif;
			font-weight: 200;
			font-style: normal;
		}

		body,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			margin: 0px;
			padding: 0px;
			font-family: "Poppins", sans-serif;
		}

		small {
			font-size: 12px;
			color: #888;
		}

		.ajax-page-load-indicator {
			display: none;
			visibility: hidden;
		}

		#report-header {
			position: relative;
			border-top: 2px solid #0066cc;
			border-bottom: 5px solid #0066cc;
			background: #fafafa;
			padding: 10px;
		}

		#report-header table {
			margin: 0;
		}

		#report-header .sub-title {
			font-size: small;
			color: #888;
		}

		#report-header img {
			height: 50px;
			width: 50px;
		}

		#report-title {
			background: #fafafa;
			margin-top: 20px;
			margin-bottom: 20px;
			padding: 10px 20px;
			font-size: 24px;
		}

		#report-body {
			padding: 20px;
		}

		#report-footer {
			padding: 10px;
			background: #fafafa;
			border-top: 2px solid #0066cc;
			position: absolute;
			bottom: 0;
			left: 0;
			width: 98%;
			overflow: hidden;
			margin: 0 auto;
		}

		#report-footer table {
			margin: 0;
			overflow: hidden;
		}

		table,
		.table {
			width: 100%;
			max-width: 100%;
			margin-bottom: 1rem;
			border-collapse: collapse;
		}

		.table th,
		.table td {
			padding: 0.75rem;
			vertical-align: top;
			border-top: 1px solid #eceeef;
		}

		.table thead th {
			vertical-align: bottom;
			border-bottom: 2px solid #eceeef;
		}

		.table tbody+tbody {
			border-top: 2px solid #eceeef;
		}

		.table .table {
			background-color: #fff;
		}

		.table-sm th,
		.table-sm td {
			padding: 0.3rem;
		}

		.table-bordered {
			border: 1px solid #eceeef;
		}

		.table-bordered th,
		.table-bordered td {
			border: 1px solid #eceeef;
		}

		.table-bordered thead th,
		.table-bordered thead td {
			border-bottom-width: 2px;
		}

		.table-striped tbody tr:nth-of-type(odd) {
			background-color: rgba(0, 0, 0, 0.05);
		}

		.table-hover tbody tr:hover {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-active,
		.table-active>th,
		.table-active>td {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-hover .table-active:hover {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-hover .table-active:hover>td,
		.table-hover .table-active:hover>th {
			background-color: rgba(0, 0, 0, 0.075);
		}

		.table-success,
		.table-success>th,
		.table-success>td {
			background-color: #dff0d8;
		}

		.table-hover .table-success:hover {
			background-color: #d0e9c6;
		}

		.table-hover .table-success:hover>td,
		.table-hover .table-success:hover>th {
			background-color: #d0e9c6;
		}

		.table-info,
		.table-info>th,
		.table-info>td {
			background-color: #d9edf7;
		}

		.table-hover .table-info:hover {
			background-color: #c4e3f3;
		}

		.table-hover .table-info:hover>td,
		.table-hover .table-info:hover>th {
			background-color: #c4e3f3;
		}

		.table-warning,
		.table-warning>th,
		.table-warning>td {
			background-color: #fcf8e3;
		}

		.table-hover .table-warning:hover {
			background-color: #faf2cc;
		}

		.table-hover .table-warning:hover>td,
		.table-hover .table-warning:hover>th {
			background-color: #faf2cc;
		}

		.table-danger,
		.table-danger>th,
		.table-danger>td {
			background-color: #f2dede;
		}

		.table-hover .table-danger:hover {
			background-color: #ebcccc;
		}

		.table-hover .table-danger:hover>td,
		.table-hover .table-danger:hover>th {
			background-color: #ebcccc;
		}

		.thead-inverse th {
			color: #fff;
			background-color: #292b2c;
		}

		.thead-default th {
			color: #464a4c;
			background-color: #eceeef;
		}

		.table-inverse {
			color: #fff;
			background-color: #292b2c;
		}

		.table-inverse th,
		.table-inverse td,
		.table-inverse thead th {
			border-color: #fff;
		}

		.table-inverse.table-bordered {
			border: 0;
		}

		.table-responsive {
			display: block;
			width: 100%;
			overflow-x: auto;
			-ms-overflow-style: -ms-autohiding-scrollbar;
		}

		.table-responsive.table-bordered {
			border: 0;
		}

		.logo {
			width: 150px;
			height: 65px;
			margin-left: 15px;
			margin-top: 15px;
		}

		.company-info {
			font-size: 12px;
			line-height: 14px;
			margin-right: 15px;
			margin-top: 15px;
		}

		.sub-title {
			font-size: 10px;

		}

		.footer-title {
			font-size: 10px;

		}
	</style>
</head>
<?php
function tgl_indo($tanggal)
{
	$bulan = array(
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

	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>

<body>
	<div id="">
		<table class="table table-sm">
			<tr>
				<th align="left" valign="middle">
					<img class="logo" src="assets/images/logo-1.png" width="1500px" height="650px" />
				</th>

				<th align="right" valign="middle">
					<div class="company-info">
						<div>Telephone: <span class="sub-title">(0286) 321050</span></div>
						<div>Email: <span class="sub-title">bappeda@wonosobokab.go.id</span></div>
						<div>Web: <span class="sub-title">bappeda.wonosobokab.go.id</span></div>
					</div>
				</th>
			</tr>
		</table>
	</div>

	<div id="report-title"><br>
		<CENTER>AGENDA BAPPEDA KABUPATEN WONOSOBO</CENTER></br>
		<br>
		<center><?php echo tgl_indo(date('Y-m-d', strtotime("+1 day", strtotime(date("Y-m-d"))))); ?></br></center>
	</div>
	<div id="report-body">
		<?php
		$this->render_body();
		?>


	</div>
	<div id="report-footer">
		<table class="table table-sm">
			<tr>
				<td align="left" valign="middle">
					<div class="footer-title"> Bappeda Wonosobo - ( 2023 - <?php echo date('Y') ?> ) by Dea Aldy Alfian</div>
				</td>
				<td align="right" valign="middle">
					Dicetak pada tanggal : <?php echo tgl_indo(date('Y-m-d')); ?>
				</td>
			</tr>
		</table>
	</div>



</body>

</html>