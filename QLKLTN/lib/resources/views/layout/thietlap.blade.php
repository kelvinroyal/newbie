@extends('layout.master')
@section('title','Thiết lập hội đồng chấm')
@section('title2','Quản lý hội đồng chấm')
@section('title3','Tạo hội đồng chấm có sẵn')
@section('main')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Thiết lập hội đồng</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  @include('errors.note')
  <form class="form-horizontal" method="post">
    <div class="box-body">
      <div class="col-md-4">
        <div class="form-group">
          <select name="ky" class="form-control">
            <option value="unselect" selected="">Lựa chọn kỳ</option>
            <option value="1">Kỳ I</option>
            <option value="2">Kỳ II</option>
            <option value="3">Kỳ III</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <select name="nhom" class="form-control">
            <option value="unselect" selected="">Lựa chọn nhóm</option>
            <option value="1">Nhóm 1</option>
            <option value="2">Nhóm 2</option>
            <option value="3">Nhóm 3</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <select name="nam_thietlap" class="form-control">
            <option value="unselect" selected="">Lựa chọn năm</option>
            @foreach($namlist as $nam)
              <option value="{{$nam->id_nam}}">{{$nam->so_nam}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-md-5">
        <div class="form-group">
          <select name="khoatl" class="form-control" rel="khoa">
            <option value="unselect" selected="">Lựa chọn khoa</option>
            @foreach($khoalist as $khoa)
              <option value="{{$khoa->id_khoa}}">{{$khoa->ten_khoa}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <select name="nganh" class="form-control" rel="nganh">
          </select>
        </div>
      </div>
      <div class="col-md-12">
        <label>Chủ tịch</label>
        <select required="" name="hd1" class="form-control" rel="giaovien">
        </select>
        <br>
        <label>Ủy viên</label>
        <select required="" name="hd2" class="form-control" rel="giaovien">
        </select>
        <br>
        <label>Phản biện</label>
        <select required="" name="hd3" class="form-control" rel="giaovien">
        </select>
        <br>
        <label>Thư ký</label>
        <select required="" name="hd4" class="form-control" rel="giaovien">
        </select>
      </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="reset" name="reset" class="btn btn-default">Làm mới</button>
      <button type="submit" class="btn btn-info pull-right">Thiết lập</button>
    </div>
    <!-- /.box-footer -->
    {{csrf_field()}}
  </form>
</div>
@stop

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('[rel="khoa"]').change(function(){
      var id = $(this).val();
      $.ajax({
        url: "{{ url('/ajax/nganh') }}",
        data: { idkhoa: id }
      }).done(function(data){
        $('[rel="nganh"]').html(data)
      });


      $('[rel="nganh"]').change(function(){
      var id2 = $(this).val();
      $.ajax({
        url: "{{ url('/ajax/giaovien') }}",
        data: { idnganh: id2 }
      }).done(function(data){
        $('[rel="giaovien"]').html(data)
      });

    });
    });

    

  });

</script>
@stop