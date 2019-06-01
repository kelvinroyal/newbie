<div class="box-body">
  @if(Auth::user()->quyen != 3)
  <table class="table table-bordered">
    <tbody><tr>
      <th>Mã cá nhân</th>
      <th>Tên</th>
      <th style="width: 60px">Sửa</th>
      <th style="width: 60px">Xem</th>
      <th style="width: 60px">Quyền</th>
      @if(Auth::user()->quyen == 1) <th style="width: 60px">Xóa</th> @endif
    </tr>
    @if($row > 0)
    @foreach($tvlist as $tv)
    <tr>
      <td>{{$tv->ma_thanhvien}}</td>
      <td>{{$tv->ten_thanhvien}}</td>
      <td><a href="{{asset('thanh-vien/edit/'.$tv->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
      <td><span class="glyphicon glyphicon-search" data-id="{{ $tv->id }}" rel="chi-tiet"></span></td>
      <td><span class="badge bg-green" >Sinh viên</span></td>
      @if(Auth::user()->quyen == 1) <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('thanh-vien/delete/'.$tv->id)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td> @endif
    </tr>
    @endforeach
    @elseif(isset($row1))
    @foreach($tvlist1 as $tv)
    <tr>
      <td>{{$tv->ma_thanhvien}}</td>
      <td>{{$tv->ten_thanhvien}}</td>
      <td><a href="{{asset('thanh-vien/edit/'.$tv->id)}}"><span class="glyphicon glyphicon-pencil"></span></a></td>
      <td><span class="glyphicon glyphicon-search" data-id="{{ $tv->id }}" rel="chi-tiet"></span></td>
      <td><span class="badge bg-green" >Sinh viên</span></td>
      @if(Auth::user()->quyen == 1) <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')" href="{{asset('thanh-vien/delete/'.$tv->id)}}"><span class="glyphicon glyphicon-remove" style=""></span></a></td> @endif
    </tr>
    @endforeach
    @endif
  </tbody></table>
  @endif
  @if(Auth::user()->quyen == 3)
  <table class="table table-bordered">
    <tbody><tr>
      <th>Mã cá nhân</th>
      <th>Tên</th>
      <th style="width: 60px">Xem</th>
      <th style="width: 60px">Quyền</th>
    </tr>
    @if($row > 0)
    @foreach($tvlist as $tv)
    <tr>
      <td>{{$tv->ma_thanhvien}}</td>
      <td>{{$tv->ten_thanhvien}}</td>
      <td><span class="glyphicon glyphicon-search" data-id="{{ $tv->id }}" rel="chi-tiet"></span></td>
      <td><span class="badge bg-green" >Sinh viên </span></td>
    </tr>
    @endforeach
    @elseif(isset($row1))
    @foreach($tvlist1 as $tv)
    <tr>
      <td>{{$tv->ma_thanhvien}}</td>
      <td>{{$tv->ten_thanhvien}}</td>
      <td><span class="glyphicon glyphicon-search" data-id="{{ $tv->id }}" rel="chi-tiet"></span></td>
      <td><span class="badge bg-green" >Sinh viên </span></td>
    </tr>
    @endforeach
    @endif
  </tbody></table>
  @endif
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
  </div>
</div>
<!-- /.box-body -->
  {{-- <div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
      {{$tvlist->links()}}
    </ul>
  </div> --}}

  @section('script')
  <script type="text/javascript">
    $(document).ready(function(){

      $('[rel="chi-tiet"]').click(function(){

        let id = $(this).data('id');

        $.ajax({
          url: "{{ url('/ajax/chi-tiet') }}",
          data: { id: id }
        }).done(function(data){
          console.log(data)
          $('#myModal').html(data);
          $('#myModal').modal('show');
        });

      });
    });
  </script>