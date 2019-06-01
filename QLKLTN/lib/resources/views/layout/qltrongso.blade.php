@extends('layout.master')
@section('title','Quản lý trọng số')
@section('title2','Quản lý trọng số')
@section('title3','Trọng số thành viên hội đồng chấm')
@section('main')
<div class="row" id="select">
  <div class="col-md-2">
    <div class="form-group">
      <select name="khoa" rel="khoa" class="form-control">
        <option value="unselect" selected="">Lựa chọn khoa</option>
        @foreach($khoalist as $khoa)
          <option value="{{$khoa->id_khoa}}">{{$khoa->ten_khoa}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <select name="nganh" rel="nganh" class="form-control">
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <select name="ky" class="form-control">
        <option value="unselect" selected="">Lựa chọn kỳ</option>
        <option value="1">Kỳ I</option>
        <option value="2">Kỳ II</option>
        <option value="3">Kỳ III</option>
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <select name="nhom" class="form-control">
        <option value="unselect" selected="">Lựa chọn nhóm</option>
        <option value="1">Nhóm 1</option>
        <option value="2">Nhóm 2</option>
        <option value="3">Nhóm 3</option>
      </select>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <select name="nam_hoidong" class="form-control">
        <option value="unselect" selected="">Lựa chọn năm</option>
        @foreach($namlist as $nam)
          <option value="{{$nam->id_nam}}">{{$nam->so_nam}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-md-1">
    <button type="submit" rel="submit" class="btn bg-purple">Lọc</button>
  </div>
</div>
<div class="row">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Danh sách hội đồng chấm</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body" rel="indulieu">
          
        <img width="100%" height="100%" src="{{asset('lib/storage/app/avatar/rong-tlu.jpg')}}">
    </div>
    <!-- /.box-body -->
  </div>
</div>
@stop

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('[rel="submit"]').click(function(){

      var select = $('#select select');
      var obj = {};
      for(var i = 0; i < select.length; i++){
          obj[$(select[i]).attr('name')] = $(select[i]).val();
      }

      $.ajax({
        url: "{{ url('/ajax/trongso') }}",
        data: obj
      }).done(function(data){
        $('[rel="indulieu"]').html(data);
      });

    });




    $('[rel="khoa"]').change(function(){
      var id = $(this).val();
      $.ajax({
        url: "{{ url('/ajax/nganh') }}",
        data: { idkhoa: id }
      }).done(function(data){
        $('[rel="nganh"]').html(data)
        console.log(data);
      });

    });

  });

</script>
@stop