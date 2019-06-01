@extends('layout.master')
@section('title','Import file')
@section('title2','Quản lý thành viên')
@section('title3','Thêm file Excel chứa danh sách thành viên')
@section('main')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Import file</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  @include('errors.note')
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Chọn file</label>

        <div class="col-sm-10">
          <input type="file" name="import" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select required name="khoa_thanhvien" rel="khoa" class="form-control">
            <option value="unselect" selected="">Lựa chọn khoa</option>
            @foreach($khoalist as $khoa)
            <option value="{{$khoa->id_khoa}}">{{$khoa->ten_khoa}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <select required name="nganh_thanhvien" rel="nganh" class="form-control">
          </select>
        </div>
      </div>
      <div class="col-sm-offset-2 col-sm-10">
        <b>*File danh sách mẫu</b>&nbsp&nbsp&nbsp<a href="{{ asset('lib/storage/app/report/TI26_TI27_Project.xlsx') }}"><span style="font-size: 18px;" class="glyphicon glyphicon-cloud-download"></span></a>
      </div>
    </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <a href="{{asset('thanh-vien/danh-sach')}}" class="btn btn-default">Hủy</a>
    <button type="submit" class="btn btn-info pull-right">Thêm</button>
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

    });

  });

</script>
@stop