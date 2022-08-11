<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
</head>
<body>
	<div class="container">
		<br/>
		<h3>
			<b><?php echo $title; ?></b><br/>
			<small style="font-size: 14px">View Datas</small>
		</h3>
		<br/>
		<form action="" method="" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
			<div class="col-md-4">
				<label class="">Filter Datas</label>
					<input type="text" name="filter1" class="form-control" id="filter1" placeholder="Filter berdasarkan NIK, Nama ...">
				</div>
			</div>
			<a href="javascript:void(0)" class="btn btn-sm btn-primary" id="btn-filter" onclick="">Klik untuk filter </a> 
			<a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="add_posting()">Tambah Data</a>
		</form>
		<br/>
		<br/>
		<br/>
		<table class="table table-hover" id="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nik</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<tbody>
		</table>
		<!-- Modal form -->
		<div class="modal fade" id="modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="title" style="margin-bottom: 0px"></h5>
						<small class="title-small"></small>
					</div>
					<div class="modal-body">
						<form action="" method="" class="form-horizontal" encrtyp="multipart/data-type">
							<div class="form-group">
								<label class="control-label col-md-4">NIK</label>
								<div class="col-md-5">
									<input type="text" name="nik" class="form-control" placeholder="Digit Nomor Induk ...">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-4">Nama</label>
								<div class="col-md-5">
									<input type="text" name="nama" class="form-control" placeholder="Ketik Nama ...">
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="save()">Simpan</a>
						<a href="javascript:void(0)" class="btn btn-sm btn-danger" data-dismiss="modal">Cancle</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal end -->
	</div>
</body>
</html>
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
 
<script type="text/javascript">
var save_method;
var table;
$(document).ready(function(){
	table = $('#table').DataTable({
		"language": {
			searchPlaceholder: "Nama ...",
		},
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": "<?php echo site_url('welcome/ajax_list'); ?>",
			"type": "POST", 
			"data": function ( data ) {
                data.nama = $('#filter1').val();
            }
		},
		"columndefs": [
			{
				"width": "5%",
				"targets": 0,
				"orderable": false
			},
			{
				"width": "10%",
				"targets": 1,
				"orderable": false
			},
		],
	});
	$('#btn-filter').click(function(){
		table.ajax.reload();
	});
});

function reloadTable(){
	table.ajax.reload(null, false);
}

function add_posting(){
	save_method = "add";
	$('#modal').modal('show');
	$('.title').html('<h3 style="margin-bottom: 2px"><b>Tambah</b></h3>');
	$('.title-small').html('&nbsp;informations');
}

</script>
