<label>Chọn hội đồng chấm: </label><br>
      <label>Chủ tịch</label>
      <select name="hd1" class="form-control">
        <option value="{{$tl->hd1}}">{{$tl->thanhvien1->ten_thanhvien}}</option>
      </select>
      <label>Ủy viên</label>
      <select name="hd2" class="form-control">
        <option value="{{$tl->hd2}}" selected="">{{$tl->thanhvien2->ten_thanhvien}}</option>
      </select>
      <br>
      <label>Phản biện</label>
      <select name="hd3" class="form-control">
        <option value="{{$tl->hd3}}" selected="">{{$tl->thanhvien3->ten_thanhvien}}</option>
      </select>
      <label>Thư ký</label>
      <select name="hd4" class="form-control">
        <option value="{{$tl->hd4}}" selected="">{{$tl->thanhvien4->ten_thanhvien}}</option>
      </select>