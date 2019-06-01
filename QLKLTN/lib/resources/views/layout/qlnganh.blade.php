@extends('layout.master')
@section('title','Quản lý ngành')
@section('title2','Quản lý ngành')
@section('title3','Ngành thuộc khoa')
@section('main')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Thêm ngành mới</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  @include('errors.note')
  <form role="form" method="post">
    <div class="box-body">
      <select name="khoa_nganh" class="form-control" required="">
        <option value="unselect">Lựa chọn khoa</option>
        @foreach($khoalist as $khoa)
        <option value="{{$khoa->id_khoa}}">{{$khoa->ten_khoa}}</option>
        @endforeach
      </select>
      <input required="" name="ten_nganh" type="text" class="form-control" placeholder="Nhập tên ngành mới">
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Thêm</button>
      <button type="reset" name="reset" class="btn btn-default">Làm mới</button>
    </div>
    {{csrf_field()}}
  </form>
</div>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Các ngành hiện có</h3>
  </div>
  <div class="row" id="select">
    <div class="col-md-2">
      <div class="form-group">
        <select name="khoa_nganh" rel="khoa" class="form-control">
          <option value="unselect" selected="">Lựa chọn khoa</option>
          @foreach($khoalist as $khoa)
          <option value="{{$khoa->id_khoa}}">{{$khoa->ten_khoa}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-1">
      <button type="submit" rel="submit" class="btn bg-purple">Lọc</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding" rel="indulieu">
    <table class="table table-striped">
      <thead><tr>
        <th>Ngành</th>
        <th>Thuộc khoa</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody >
      @foreach($nganhlist as $nganh)
      <tr>
        <td>{{$nganh->ten_nganh}}</td>
        <td>{{$nganh->ten_khoa}}</td>
        <td><a href="{{asset('nganh/edit/'.$nganh->id_nganh)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
        <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('nganh/delete/'.$nganh->id_nganh)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td>
      </tr>
      @endforeach
    </tbody></table>
    <div class="box-footer clearfix">
      <ul class="pagination pagination-sm no-margin pull-right">
        {{$nganhlist->links()}}
      </ul>
    </div>
  </div>
  <!-- /.box-body -->
  
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
        url: "{{ url('/ajax/khoa') }}",
        data: obj
      }).done(function(data){
        $('[rel="indulieu"]').html(data);
      });

    });

  });

</script>
@stop