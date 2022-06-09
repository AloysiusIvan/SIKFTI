
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="https://i.ibb.co/ydBXmSt/sik.png">        
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIK-FTI</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/adminlte/dist/css/adminlte.min.css')}}">
</head>
<body style="background-color:#f4f6f9;">
<div class="container mt-5">
<div class="card card-primary shadow">
    <div class="card-header">
        <h3 class="card-title">Pengajuan Pencairan Dana</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/createpengajuan" method="post">
    {{ csrf_field() }}
        <div class="card-body">
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                    <div class="form-group">
                        <input type="hidden" id="id_user" name="id_user" value="{{auth()->user()->id}}">
                        <input type="hidden" id="username" name="username" value="{{auth()->user()->name}}">
                    </div>
                    <select class="form-control" id="prodi" name="prodi" required>
                        <option value="" selected disabled hidden>Choose here</option>
                        <option value="FTI">Fakultas TI</option>
                        <option value="SI">Prodi Sistem Informasi</option>
                        <option value="TI">Prodi Informatika</option>
                    </select>
            </div>
            <div class="list_wrapper">
                <div class="delete">
                    <hr/>
                    <div class="form-group">
                        <label for="id_coa">COA</label>
                        <select class="form-control" id="id_coa" name="id_coa[]" required>
                            <option value="" selected disabled hidden>Choose here</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan[]" required>
                    </div>
                    <div class="form-group">
                        <label>Biaya</label>
                        <input type="number" class="form-control" id="biaya" name="biaya[]" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary list_add_button" type="button">+</button>
                    </div>
                </div>
            </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="/pengajuan" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
var fti = '<option value="" selected disabled hidden>Choose here</option> @foreach ($coaf as $item) <option value="{{$item->id}}">{{$item->nama_coa}} ({{$item->id_coa}})</option> @endforeach';
var ti = '<option value="" selected disabled hidden>Choose here</option> @foreach ($coat as $item) <option value="{{$item->id}}">{{$item->nama_coa}} ({{$item->id_coa}})</option> @endforeach';
var si = '<option value="" selected disabled hidden>Choose here</option> @foreach ($coas as $item) <option value="{{$item->id}}">{{$item->nama_coa}} ({{$item->id_coa}})</option> @endforeach';
$(document).ready(function() {
    $("#prodi").change(function(){
        var val = $(this).val();
        if (val == "FTI") {
            $("#id_coa").html(fti);
        } else if (val == "SI") {
            $("#id_coa").html(si);
        } else if (val == "TI") {
            $("#id_coa").html(ti);
        }
    });
});

$(document).ready(function(){
    $("#prodi").change(function(){
        var val = $(this).val();
        if (val == "FTI") {
            $('.list_add_button').click(function(){
                var list_fieldHTML = '<div class="delete"><hr/><div class="form-group"><label for="id_coa">COA</label><select class="form-control" id="id_coa" name="id_coa[]" required><option value="" selected disabled hidden>Choose here</option> @foreach ($coaf as $item) <option value="{{$item->id}}">{{$item->nama_coa}} ({{$item->id_coa}})</option> @endforeach</select></div><div class="form-group"><label>Kegiatan</label><input type="text" class="form-control" id="kegiatan" name="kegiatan[]" required></div><div class="form-group"><label>Biaya</label><input type="number" class="form-control" id="biaya" name="biaya[]" required></div><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div></div>'; //New input field html 
                $('.list_wrapper').append(list_fieldHTML);
            });
        } else if (val == "SI") {
            $('.list_add_button').click(function(){
                var list_fieldHTML = '<div class="delete"><hr/><div class="form-group"><label for="id_coa">COA</label><select class="form-control" id="id_coa" name="id_coa[]" required><option value="" selected disabled hidden>Choose here</option> @foreach ($coas as $item) <option value="{{$item->id}}">{{$item->nama_coa}} ({{$item->id_coa}})</option> @endforeach</select></div><div class="form-group"><label>Kegiatan</label><input type="text" class="form-control" id="kegiatan" name="kegiatan[]" required></div><div class="form-group"><label>Biaya</label><input type="number" class="form-control" id="biaya" name="biaya[]" required></div><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div></div>'; //New input field html 
                $('.list_wrapper').append(list_fieldHTML);
            });
        } else if (val == "TI") {
            $('.list_add_button').click(function(){
                var list_fieldHTML = '<div class="delete"><hr/><div class="form-group"><label for="id_coa">COA</label><select class="form-control" id="id_coa" name="id_coa[]" required><option value="" selected disabled hidden>Choose here</option> @foreach ($coat as $item) <option value="{{$item->id}}">{{$item->nama_coa}} ({{$item->id_coa}})</option> @endforeach</select></div><div class="form-group"><label>Kegiatan</label><input type="text" class="form-control" id="kegiatan" name="kegiatan[]" required></div><div class="form-group"><label>Biaya</label><input type="number" class="form-control" id="biaya" name="biaya[]" required></div><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div></div>'; //New input field html 
                $('.list_wrapper').append(list_fieldHTML);
            });
        }
    });
    //Once remove button is clicked
    $('.list_wrapper').on('click', '.list_remove_button', function(){
        $(this).closest('div.delete').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

<!-- jQuery -->
<script src="{{asset('template/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/adminlte/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
