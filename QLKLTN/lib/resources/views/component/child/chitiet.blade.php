<div class="modal-dialog">
<!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Thông tin cá nhân</h4>
            </div>
            <div class="modal-body">
              <div class="box box-info">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{asset('lib/storage/app/avatar/'.$ct->anh)}}" alt="Ảnh đại diện">

                  <h3 class="profile-username text-center">{{$ct->ten_thanhvien}}</h3>

                  <p class="text-muted text-center">{{$ct->ma_thanhvien}}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Khoa</b> <a class="pull-right">{{$ct->khoa->ten_khoa}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Ngành</b> <a class="pull-right">{{$ct->nganh->ten_nganh}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Quyền hạn</b> <a class="pull-right">@if($ct->quyen==1) Thư kí @endif @if($ct->quyen==2) Giáo viên @endif @if($ct->quyen==3) Sinh viên @endif</a>
                    </li>
                    @if($ct->quyen == 3)
                      <li class="list-group-item">
                        <b>Trạng thái đăng ký KLTN</b> <a class="pull-right">@if($ct->trang_thai==1) Đã đăng ký @else Chưa đăng ký @endif</a>
                      </li>
                    @endif
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            </div>
          </div>
        </div>