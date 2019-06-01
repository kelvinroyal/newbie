@extends('layout.master')
@section('title','Trang chủ')
@section('main')
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$kl}}</h3>

        <p>Khóa luận</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{asset('khoa-luan/danh-sach')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        @php $c=0; @endphp
        @php $d=0; @endphp
        @foreach($tk as $tks)
        @if($tks->bao_cao != null)
        @php $c=$c+1; @endphp
        @else
        @php $d=$d+1; @endphp
        @endif
        @endforeach
        <h3>{{(int)(100/($c+$d)*$c)}}<sup style="font-size: 20px">%</sup></h3>

        <p>Hoàn thành báo cáo</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{asset('bao-cao')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$tv}}</h3>

        <p>Sinh viên</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{asset('thanh-vien/danh-sach')}}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>65</h3>

        <p>Đã tốt nghiệp</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>


<div class="box box-solid bg-green-gradient" style="position: relative; left: 0px; top: 0px;">
  <div class="box-header ui-sortable-handle" style="cursor: move;">
    <i class="fa fa-calendar"></i>

    <h3 class="box-title">Calendar</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <!-- button with a dropdown -->
      <div class="btn-group">
        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bars"></i></button>
          <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="#">Add new event</a></li>
            <li><a href="#">Clear events</a></li>
            <li class="divider"></li>
            <li><a href="#">View calendar</a></li>
          </ul>
        </div>
        <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
        </button>
      </div>
      <!-- /. tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <!--The calendar -->
      <div id="calendar" style="width: 100%"><div class="datepicker datepicker-inline"><div class="datepicker-days" style="display: block;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">April 2018</th><th class="next" style="visibility: visible;">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day">25</td><td class="old day">26</td><td class="old day">27</td><td class="old day">28</td><td class="old day">29</td><td class="old day">30</td><td class="old day">31</td></tr><tr><td class="day">1</td><td class="day">2</td><td class="day">3</td><td class="day">4</td><td class="day">5</td><td class="day">6</td><td class="day">7</td></tr><tr><td class="day">8</td><td class="day">9</td><td class="day">10</td><td class="day">11</td><td class="day">12</td><td class="day">13</td><td class="day">14</td></tr><tr><td class="day">15</td><td class="day">16</td><td class="day">17</td><td class="day">18</td><td class="day">19</td><td class="day">20</td><td class="day">21</td></tr><tr><td class="day">22</td><td class="day">23</td><td class="day">24</td><td class="day">25</td><td class="day">26</td><td class="day">27</td><td class="day">28</td></tr><tr><td class="day">29</td><td class="day">30</td><td class="new day">1</td><td class="new day">2</td><td class="new day">3</td><td class="new day">4</td><td class="new day">5</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2018</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2010-2019</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year new">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-black">
      <div class="row">
        <div class="col-sm-6">
          <!-- Progress bars -->
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h4 class="box-title">Lịch bảo vệ hôm nay</h4>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @foreach($kla as $kls)
              @if(date('Y-m-d', strtotime($kls->thoi_gian)) == $l)
              <p>{{$kls->de_tai}} | {{$kls->thanhvien->ten_thanhvien}} | {{$kls->phong}} | {{date('H:i', strtotime($kls->thoi_gian))}} | {{$kls->khoa->ten_khoa}}</p>
              @endif
              @endforeach
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h4 class="box-title">Lịch bảo vệ ngày mai</h4>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @foreach($kla as $kls)
              @if(date('Y-m-d', strtotime($kls->thoi_gian)) == $r)
              <p>{{$kls->de_tai}} | {{$kls->thanhvien->ten_thanhvien}} | {{$kls->phong}} | {{date('H:i', strtotime($kls->thoi_gian))}} | {{$kls->khoa->ten_khoa}}</p>
              @endif
              @endforeach
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>
  @stop