        @include('header')
    <body>
    <style type="text/css">
        .stretch-card {
            height: 500px;
            overflow: auto;
        }

        .stretch-card::-webkit-scrollbar {
            width: 0.2em;
        }

        .stretch-card::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }

        .stretch-card::-webkit-scrollbar-thumb {
          background-color: #666B7A;
          outline: 1px solid #666B7A;
        }

        .table td {
          white-space: initial;
        }

        @media (max-width: 768px) {
          .stretch-card {
            height: 370px;
            overflow: auto;
          }
        }
    </style> 
    
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> {{ $header }} </h3>
            </div>

            <?php
              if (isset($materials)) {
            ?>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Summary</h4>
                    <canvas id="transaction-history" class="transaction-chart"></canvas>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Batch</h6>
                        <p class="text-muted mb-0">{{$materials[0]->c_date}}</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">#{{$materials[0]->c_batch}}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
              <div class="col-12 p-0">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Attendance Status</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> No. </th>
                            <th> Class Name </th>
                            <th> Start Date </th>
                            <th> Status </th>
                            <th> Resources </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ct = 1;
                                $attended = 0;
                                $unattended = 0;
                                foreach ($materials as $material) {
                            ?>
                                    <tr>
                                        <td> {{$ct}} </td>
                                        <td> {{$material->m_name}} </td>
                                        <td style="width: 110px;"> {{date("d M Y", strtotime ($material->cm_date))}} </td>
                                        <td>
                                            <?php
                                                if (in_array($material->cm_id, $attendance)) {
                                                    $attended++;
                                            ?>
                                                    <div class="badge badge-outline-success" style="width: 85px">Attended</div>
                                            <?php
                                                } else {
                                                    $unattended++;
                                            ?>
                                                    <div class="badge badge-outline-warning" style="width: 85px">Unattended</div>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td>
                                          <?php
                                                if (in_array($material->cm_id, $attendance)) {
                                            ?>
                                                    <div class="text-center ">
                                                      <!-- <i class="mdi mdi-close-circle"></i> -->
                                                      <a type="button" href= "{{ route('resource_download', $material->cm_resource)}}" class="btn btn-inverse-success btn-icon" style="height: auto; width: auto; padding: 0.35rem 0.7rem">
                                                          <i class="mdi mdi-file-powerpoint m-0"></i>
                                                      </a>
                                                    </div>
                                            <?php
                                                } else {
                                            ?>
                                                    <!-- <div class="badge badge-outline-warning" style="width: 85px">Unattended</div> -->
                                                    <div class="text-center ">
                                                      <!-- <i class="mdi mdi-close-circle"></i> -->
                                                      <div class="btn btn-inverse-danger btn-icon" style="height: auto; width: auto; padding: 0.35rem 0.7rem; cursor: not-allowed;">
                                                          <i class="mdi mdi-file-powerpoint m-0"></i>
                                                      </div>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>
                            <?php 
                                    $ct++; 
                                } 
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } else { ?>
            <div class="row">
              <div class="col-sm-6">
                <div class="card button-bordered grow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0 text-danger">Not Enrolled</h2>
                        </div>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-bookmark-remove text-danger ml-auto"></i>
                      </div>
                    </div>

                    <div class="media">
                      <div class="media-body">
                        <p class="card-text lead">You haven't enrolled in this class yet. Please join us in the next batch!</p>
                        <h4 class="card-text">See you there!</h4>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <?php } ?>
            </div>


            <!-- <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Revenue</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$32123</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Sales</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$45850</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Purchase</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$2039</h2>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
                        </div>
                        <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

          </div>
          <!-- content-wrapper ends -->
    @include('footer')

    <?php if (isset($attended)) { ?>
      <script>
          if ($("#transaction-history").length) {
            var areaData = {
              labels: ["Attended", "Unattended"],
              datasets: [{
                  data: [{{$attended}}, {{$unattended}}],
                  backgroundColor: [
                    "#00d25b","#ffab00"
                  ]
                }
              ]
            };
            var areaOptions = {
              responsive: true,
              maintainAspectRatio: true,
              segmentShowStroke: false,
              cutoutPercentage: 70,
              elements: {
                arc: {
                    borderWidth: 0
                }
              },      
              legend: {
                display: false
              },
              tooltips: {
                enabled: true
              }
            }
            var transactionhistoryChartPlugins = {
              beforeDraw: function(chart) {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx;
            
                ctx.restore();
                var fontSize = 1;
                ctx.font = fontSize + "rem sans-serif";
                ctx.textAlign = 'left';
                ctx.textBaseline = "middle";
                ctx.fillStyle = "#ffffff";
            
                // var text = "13", 
                //     textX = Math.round((width - ctx.measureText(text).width) / 2),
                //     textY = height / 2.4;
            
                // ctx.fillText(text, textX, textY);

                // ctx.restore();
                // var fontSize = 0.75;
                // ctx.font = fontSize + "rem sans-serif";
                // ctx.textAlign = 'left';
                // ctx.textBaseline = "middle";
                // ctx.fillStyle = "#6c7293";

                // var texts = "Total", 
                //     textsX = Math.round((width - ctx.measureText(text).width) / 1.93),
                //     textsY = height / 1.7;
            
                // ctx.fillText(texts, textsX, textsY);
                ctx.save();
              }
            }
            var transactionhistoryChartCanvas = $("#transaction-history").get(0).getContext("2d");
            var transactionhistoryChart = new Chart(transactionhistoryChartCanvas, {
              type: 'doughnut',
              data: areaData,
              options: areaOptions,
              plugins: transactionhistoryChartPlugins
            });
          }
      </script>
    <?php } ?>
  </body>
</html>
            
        