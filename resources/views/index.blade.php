        @include('header')
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
    </style> 
    <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Doctrine </h3>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Summary</h4>
                    <canvas id="transaction-history" class="transaction-chart"></canvas>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Batch</h6>
                        <p class="text-muted mb-0">29 Feb 2024 - 15 Aug 2024</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">#1</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
              <div class="col-12">
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
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td> 1 </div>
                            </td>
                            <td> Abc </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success" style="width: 85px">Attended</div>
                            </td>
                          </tr>
                          <tr>
                            <td> 2 </div>
                            </td>
                            <td> Study Case of Henry Klein </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-warning" style="width: 85px">Unattended</div>
                            </td>
                          </tr>
                          <tr>
                            <td> 3 </div>
                            </td>
                            <td> Henry Klein </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success" style="width: 85px">Attended</div>
                            </td>
                          </tr>
                          <tr>
                            <td> 1 </div>
                            </td>
                            <td> Abc </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Attended</div>
                            </td>
                          </tr>
                          <tr>
                            <td> 2 </div>
                            </td>
                            <td> Study Case of Henry Klein </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Attended</div>
                            </td>
                          </tr>
                          <tr>
                            <td> 3 </div>
                            </td>
                            <td> Henry Klein </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Attended</div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
  </body>
</html>
            
        