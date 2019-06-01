<div class="col-md-6">
  <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Hoàn thành báo cáo</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <div id="piechart0"></div>
      
      <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    // Draw the chart and set the chart values
                    function drawChart() {
                      var data = google.visualization.arrayToDataTable([
                        ['Thống kê', 'Báo cáo'],
                        @php $c=0; @endphp
                        @php $d=0; @endphp
                        @if($row > 0)
                        @foreach($tk as $tks)
                          @if($tks->bao_cao != null)
                            @php $c=$c+1; @endphp
                          @else
                            @php $d=$d+1; @endphp
                          @endif
                        @endforeach
                          @elseif(isset($row3))
                          @foreach($tk3 as $tks)
                            @if($tks->bao_cao != null)
                              @php $c=$c+1; @endphp
                            @else
                              @php $d=$d+1; @endphp
                            @endif
                          @endforeach
                            @elseif(isset($row2))
                            @foreach($tk2 as $tks)
                              @if($tks->bao_cao != null)
                                @php $c=$c+1; @endphp
                              @else
                                @php $d=$d+1; @endphp
                              @endif
                            @endforeach
                              @elseif(isset($row1))
                              @foreach($tk1 as $tks)
                                @if($tks->bao_cao != null)
                                  @php $c=$c+1; @endphp
                                @else
                                  @php $d=$d+1; @endphp
                                @endif
                              @endforeach
                        @endif
                        ['Hoàn thành', {{$c}}],
                        ['Không hoàn thành', {{$d}}]
                        ]);

                      // Optional; add a title and set the width and height of the chart
                      var options = {'width':500, 'height':300};

                      // Display the chart inside the <div> element with id="piechart"
                      var chart = new google.visualization.PieChart(document.getElementById('piechart0'));
                      chart.draw(data, options);
                    }
                  </script>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Điểm</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <div id="piechart"></div>

                  <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    // Draw the chart and set the chart values
                    function drawChart() {
                      var data = google.visualization.arrayToDataTable([
                        ['Thống kê', 'Điểm'],
                        @php $a=0; @endphp
                        @php $b=0; @endphp
                        @if($row > 0)
                        @foreach($tk as $tks)
                        @if(isset($tks->diem1) && isset($tks->diem2) && isset($tks->diem3) && isset($tks->diem4))
                          @if($tks->diem1*($tks->ts1/100)+$tks->diem2*($tks->ts2/100)+$tks->diem3*($tks->ts3/100)+$tks->diem4*($tks->ts4/100) >= 5)
                            @php $a=$a+1; @endphp
                          @else
                            @php $b=$b+1; @endphp
                          @endif
                        @endif
                        @endforeach
                          @elseif(isset($row3))
                          @foreach($tk3 as $tks)
                          @if(isset($tks->diem1) && isset($tks->diem2) && isset($tks->diem3) && isset($tks->diem4))
                            @if($tks->diem1*($tks->ts1/100)+$tks->diem2*($tks->ts2/100)+$tks->diem3*($tks->ts3/100)+$tks->diem4*($tks->ts4/100) >= 5)
                              @php $a=$a+1; @endphp
                            @else
                              @php $b=$b+1; @endphp
                            @endif
                          @endif
                          @endforeach
                            @elseif(isset($row2))
                            @foreach($tk2 as $tks)
                            @if(isset($tks->diem1) && isset($tks->diem2) && isset($tks->diem3) && isset($tks->diem4))
                              @if($tks->diem1*($tks->ts1/100)+$tks->diem2*($tks->ts2/100)+$tks->diem3*($tks->ts3/100)+$tks->diem4*($tks->ts4/100) >= 5)
                                @php $a=$a+1; @endphp
                              @else
                                @php $b=$b+1; @endphp
                              @endif
                            @endif
                            @endforeach
                              @elseif(isset($row1))
                              @foreach($tk1 as $tks)
                              @if(isset($tks->diem1) && isset($tks->diem2) && isset($tks->diem3) && isset($tks->diem4))
                                @if($tks->diem1*($tks->ts1/100)+$tks->diem2*($tks->ts2/100)+$tks->diem3*($tks->ts3/100)+$tks->diem4*($tks->ts4/100) >= 5)
                                  @php $a=$a+1; @endphp
                                @else
                                  @php $b=$b+1; @endphp
                                @endif
                              @endif
                              @endforeach
                        @endif
                        ['Trên trung bình', {{$a}}],
                        ['Dưới trung bình', {{$b}}]
                        ]);

                      // Optional; add a title and set the width and height of the chart
                      var options = {'width':500, 'height':300};

                      // Display the chart inside the <div> element with id="piechart"
                      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                      chart.draw(data, options);
                    }
                  </script>
                </div>
                <!-- /.box-body -->
              </div>
            </div>