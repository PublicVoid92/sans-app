@include('header')
@include('sidebar')
@include('topnav')



<!-- /top navigation -->

<!-- page content -->

<!-- top tiles -->

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><h5><i class="fa fa-user"></i> Schools Summary</h5>
      </li>
        <li class="list-group-item"><h6><i class="fa fa-user"></i> {{$student_count}} Total Students</h6>
      </li>

        <li class="list-group-item"><h6><i class="fa fa-clock-o"></i> {{$grade_count}} Grade Level</h6>
     </li>

        <li class="list-group-item"> <h6><i class="fa fa-user"></i> {{$lecturer_count}} Total Teachers</h6>
      </li>

      <li class="list-group-item"><h6><i class="fa fa-user"></i> {{$male_count}} Total Male Students</h6>
      </li>

      <li class="list-group-item"><h6><i class="fa fa-user"></i> {{$female_count}} Total Female Students</h6>
     </li>

      </ul>
    </div>
  </div>
  <div class="col-md-6">
    
 <div class="x_panel tile fixed_height_320 overflow_hidden">
      <div class="x_title">
        <h2>Today Attendance Summary</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Settings 1</a>
              <a class="dropdown-item" href="#">Settings 2</a>
            </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="" style="width:100%">
          <tr>
            <th style="width:37%;">
            <!--   <p>Top 5</p> -->
            </th>
            <th>
              <div class="col-lg-7 col-md-7 col-sm-7 ">
                <p class="">Status</p>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 ">
                <p class="">Percentage</p>
              </div>
            </th>
          </tr>
          <tr>
            <td>
              <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
            </td>
            <td>
              <table class="tile_info">
                <tr>
                  <td>
                    <p><i class="fa fa-square green"></i>Presents </p>
                  </td>
                  <td>40%</td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square orange"></i>Tardy </p>
                  </td>
                  <td>10%</td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square red"></i>Absent </p>
                  </td>
                  <td>20%</td>
                </tr>
                
              </table>
            </td>
          </tr>
        </table>
      </div>
    </div>

  </div>


</div>

<!--  -->
<!--  -->
<!-- /top tiles -->

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    
  </div>

</div>
<br />

<div class="row">


  <div class="col-md-3 col-sm-4 ">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>Early Years</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Settings 1</a>
              <a class="dropdown-item" href="#">Settings 2</a>
            </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        @foreach($early_year as $key => $value)
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>{{$value['class_name']}}</span>
          </div>
          <div class="w_center w_55">
            <div class="progress">
              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(($value['count'] /25) * 100).'%' }};">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="w_right w_20">
            <span>{{$value['count']}}</span>
          </div>
          <div class="clearfix"></div>
        </div>
        @endforeach


  

      </div>
    </div>
  </div>
   <div class="col-md-3 col-sm-4 ">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>Elementary School</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Settings 1</a>
              <a class="dropdown-item" href="#">Settings 2</a>
            </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

     

 
         @foreach($elementary as $key => $value)
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>{{$value['class_name']}}</span>
          </div>
          <div class="w_center w_55">
            <div class="progress">
              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(($value['count'] /25) * 100).'%' }};">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="w_right w_20">
            <span>{{$value['count']}}</span>
          </div>
          <div class="clearfix"></div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
   <div class="col-md-3 col-sm-4 ">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>Junior High School (JHS)</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Settings 1</a>
              <a class="dropdown-item" href="#">Settings 2</a>
            </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        
    
        @foreach($jhs as $key => $value)
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>{{$value['class_name']}}</span>
          </div>
          <div class="w_center w_55">
            <div class="progress">
              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(($value['count'] /25) * 100).'%' }};">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="w_right w_20">
            <span>{{$value['count']}}</span>
          </div>
          <div class="clearfix"></div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
   <div class="col-md-3 col-sm-4 ">
    <div class="x_panel tile">
      <div class="x_title">
        <h2>High School</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Settings 1</a>
              <a class="dropdown-item" href="#">Settings 2</a>
            </div>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        
       

     
  
        @foreach($hs as $key => $value)
        <div class="widget_summary">
          <div class="w_left w_25">
            <span>{{$value['class_name']}}</span>
          </div>
          <div class="w_center w_55">
            <div class="progress">
              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{(($value['count'] /25) * 100).'%' }};">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
          </div>
          <div class="w_right w_20">
            <span>{{$value['count']}}</span>
          </div>
          <div class="clearfix"></div>
        </div>
        @endforeach

      </div>
    </div>
  </div>

  




</div>


<div class="row">
  


</div>


@include('footer')



<script>
  
  $( document ).ready(function() {
     if (typeof (Chart) === 'undefined') { return; }

    console.log('init_chart_doughnut');

    if ($('.canvasDoughnut').length) {

        var chart_doughnut_settings = {
            type: 'doughnut',
            tooltipFillColor: "rgba(51, 51, 51, 0.55)",
            data: {
                labels: [
                    "Tardy",
                    "Absent",
                    "Present"
                ],
                datasets: [{
                    data: [15, 20, 30],
                    backgroundColor: [
                        "#ffbb33",
                        "#ff4444",
                         "#00C851"
                   
                    ],
                    hoverBackgroundColor: [
                        "#FF8800",
                        "#CC0000",
                       
                             "#007E33"
                    ]
                }]
            },
            options: {
                legend: false,
                responsive: false
            }
        }

        $('.canvasDoughnut').each(function () {

            var chart_element = $(this);
            var chart_doughnut = new Chart(chart_element, chart_doughnut_settings);

        });

    }
});

</script>