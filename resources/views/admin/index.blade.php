@extends('admin.template.master')
@section('title')
    Trang quản trị
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Trang thống kê</h1>
    </div>
</div>
<div class="row row m-t-25">
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="text">
                        <h2>{{ $orderInDay }}</h2>
                        <span>Tổng tiền trong ngày</span>
                    </div>
                </div>
                <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="widgetChart2" height="143" width="250" class="chartjs-render-monitor" style="display: block; height: 115px; width: 200px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="text">
                        <h2>{{ number_format($orderInMonth) }}</h2>
                        <span>Tổng tiền trong tháng</span>
                    </div>
                </div>
                <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="widgetChart1" height="162" width="250" class="chartjs-render-monitor" style="display: block; height: 130px; width: 200px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="text">
                        <h2>{{ $orderNotAcp }}<span style="float: right; margin-top: 10px;"><a style="color: rebeccapurple" href="{{route('listOrder')}}">Xem</a></span></h2>
                        <span>Đơn hàng chưa duyệt</span>

                    </div>
                </div>
                <div class="overview-chart"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <canvas id="widgetChart3" height="143" width="250" class="chartjs-render-monitor" style="display: block; height: 115px; width: 200px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="au-card recent-report">
            <div class="au-card-inner">
                <h3 class="title-2">Thống kê theo tháng</h3>
                <div class="recent-report__chart">
                    <canvas id="recent-rep-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@push('thong-ke')
    <script>
        // Recent Report
    const brandProduct = 'rgba(0,181,233,0.8)'
    const brandService = 'rgba(0,173,95,0.8)'

    var elements = 10
    var data1 = [@foreach ($totalArr as $item)
                    {{ $item }},
                @endforeach]
    // var data2 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

    var ctx = document.getElementById("recent-rep-chart");
    if (ctx) {
      ctx.height = 250;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
          datasets: [
            {
              label: 'My First dataset',
              backgroundColor: brandService,
              borderColor: 'transparent',
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data1

            },
            // {
            //   label: 'My Second dataset',
            //   backgroundColor: brandProduct,
            //   borderColor: 'transparent',
            //   pointHoverBackgroundColor: '#fff',
            //   borderWidth: 0,
            //   data: data2

            // }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                drawOnChartArea: true,
                color: '#f2f2f2'
              },
              ticks: {
                fontFamily: "Poppins",
                fontSize: 12
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                maxTicksLimit: 5,
                stepSize: 50,
                max: 150,
                fontFamily: "Poppins",
                fontSize: 12
              },
              gridLines: {
                display: true,
                color: '#f2f2f2'

              }
            }]
          },
          elements: {
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4,
              hoverBorderWidth: 3
            }
          }


        }
      });
    }
    </script>
@endpush
@endsection
