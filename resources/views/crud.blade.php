<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{asset('template/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}
.css-serial {
 counter-reset: serial-number; /* Set the serial number counter to 0 */
}
.css-serial td:first-child:before {
 counter-increment: serial-number; /* Increment the serial number counter */
 content: counter(serial-number); /* Display the counter */
}
table {
  counter-reset: row-num-1;
}
table tr {
  counter-increment: row-num;
}
table tr td:first-child::before {
    content: counter(row-num);
}	
</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
	<div class="table-responsive shadow">
		<div class="table-wrapper">
			<div class="table-title bg-light">
				<div class="row">
					<div class="col-sm-6">
						<!-- <select class="form-control" id="tanda_tangan" name="tanda_tangan" style="max-width:130px">
							<option value="" selected disabled hidden>Pilih Tahun</option>
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
							<option>2022</option>
                        </select> -->
					</div>
					<div class="col-sm-6">
						<a href="#addCOAModal" class="btn btn-success" data-toggle="modal"><i class="nav-icon fas fa-plus-circle"></i>Tambah COA</a>
                        
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>ID COA</th>
						<th>Anggaran</th>
						<th>Terealisasi</th>
						<th>Belum Terealisasi</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($coa as $item)
					<tr>
						<td></td>
						<td>{{$item->nama_coa}}<br/>{{$item->id_coa}}</td>
						<td>Rp.{{number_format($item->anggaran,0,',','.')}}</td>
						<td>Rp.{{number_format($item->realisasi,0,',','.')}}</td>
						<td>Rp.{{number_format($item->belum,0,',','.')}}</td>
						<td>
							@if($item->belum==0 && $item->realisasi==0)
							<a href="#editCOAModal" class="edit" data-toggle="modal" data-target="#editCOAModal{{$item->id}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteCOAModal" class="delete" data-toggle="modal" data-target="#deleteCOAModal{{$item->id}}"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							@else
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!--PAGINATION-->
			<?php 
				$total = $coa->total();
				$page = $coa->perPage();
				$current = $coa->currentPage();
				$totalpage = ceil($total / $page);
			?>
			<div class="clearfix">
				<div class="hint-text">Showing <b>{{$coa->count()}}</b> out of <b>{{ $coa->total() }}</b> entries</div>
				<ul class="pagination">
					@if ($coa->onFirstPage())
					@else
					<li class="page-item"><a href="{{$coa->previousPageUrl()}}" class="page-link">Previous</a></li>
					@endif
					@for($i=1 ; $i <= $totalpage ; $i++)
					@if ($i == $current)
					<li class="page-item active"><a href="{{$coa->url($i)}}" class="page-link">{{$i}}</a></li>	
					@else
					<li class="page-item"><a href="{{$coa->url($i)}}" class="page-link">{{$i}}</a></li>
					@endif
					@endfor
					@if ($coa->hasMorePages())
					<li class="page-item"><a href="{{$coa->nextPageUrl()}}" class="page-link">Next</a></li>
					@else
					@endif
				</ul>
			</div>
		</div>
	</div>        

<!-- Add Modal HTML -->
<div id="addCOAModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/createcoa" method="post">
			{{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Tambah COA</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <div class="form-group">
						<label>Kepentingan Pihak</label>
						<select class="form-control" id="prodi" name="prodi" required>
							<option value="" selected disabled hidden>Choose here</option>
							<option value="FTI">Fakultas TI</option>
							<option value="SI">Prodi Sistem Informasi</option>
							<option value="TI">Prodi Informatika</option>
                        </select>
					</div>	
					<div class="form-group">
						<label>Tahun</label>
						<input type="number" class="form-control" id="tahun" name="tahun" required>
					</div>				
					<div class="form-group">
						<label>ID COA</label>
						<input type="text" class="form-control" id="id_coa" name="id_coa" required>
					</div>
					<div class="form-group">
						<label>Nama COA</label>
						<input type="text" class="form-control" id="nama_coa" name="nama_coa" required>
					</div>
					<div class="form-group">
						<label>Nama Kegiatan</label>
						<textarea class="form-control" id="ket_keg" name="ket_keg" required></textarea>
					</div>
					<div class="form-group">
						<label>Anggaran</label>
						<input type="number" class="form-control" id="anggaran" name="anggaran" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
@foreach($coa as $item)
<div id="editCOAModal{{$item->id}}" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ url('updatecoa',$item->id) }}" method="post">
			{{ csrf_field() }}
				<div class="modal-header">						
					<h4 class="modal-title">Edit COA</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
				<div class="form-group">
						<label>Kepentingan Pihak</label>
						<select class="form-control" id="prodi" name="prodi" required>
							<option value="" selected disabled hidden>Choose here</option>
							<option value="FTI" <?php if($item->prodi=="FTI") echo 'selected="selected"'; ?>>Fakultas TI</option>
							<option value="SI" <?php if($item->prodi=="SI") echo 'selected="selected"'; ?>>Prodi Sistem Informasi</option>
							<option value="TI" <?php if($item->prodi=="TI") echo 'selected="selected"'; ?>>Prodi Informatika</option>
                        </select>
					</div>	
					<div class="form-group">
						<label>Tahun</label>
						<input type="number" class="form-control" id="tahun" name="tahun" value="{{$item->tahun}}"required>
					</div>				
					<div class="form-group">
						<label>ID COA</label>
						<input type="text" class="form-control" id="id_coa" name="id_coa" value="{{$item->id_coa}}" required>
					</div>
					<div class="form-group">
						<label>Nama COA</label>
						<input type="text" class="form-control" id="nama_coa" name="nama_coa" value="{{$item->nama_coa}}" required>
					</div>
					<div class="form-group">
						<label>Nama Kegiatan</label>
						<textarea class="form-control" id="ket_keg" name="ket_keg" required>{{$item->ket_keg}}</textarea>
					</div>
					<div class="form-group">
						<label>Anggaran</label>
						<input type="number" class="form-control" id="anggaran" name="anggaran" value="{{$item->anggaran}}" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
<!-- Delete Modal HTML -->
@foreach($coa as $item)
<div id="deleteCOAModal{{$item->id}}" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ url('deletecoa',$item->id) }}" method="post">
			@method('delete')
			@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Delete COA</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
@include('sweetalert::alert')
</body>
</html>