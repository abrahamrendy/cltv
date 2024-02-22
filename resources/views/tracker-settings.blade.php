        @include('header')
    <body>
    <style type="text/css">
        .form-control:disabled {
          color: initial;
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
    
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Settings </h3>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Member Details</h4>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left col-lg-12">
                        <form class="forms-sample" method="POST" action="{{ route('tracker_settings_submit') }}">
                          @csrf
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Cultivate Code</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="qr_code" placeholder="Cultivate Code" value="{{ session('currUser')->qr_code }}" disabled>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="name" placeholder="Name" value="{{ session('currUser')->name }}" disabled>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                  <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ session('currUser')->email }}">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. HP</label>
                                <div class="col-sm-9">
                                  <input type="number" class="form-control" name="no_hp" placeholder="no. hp" value="{{ session('currUser')->no_hp }}">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputConfirmPassword1">New Password</label>
                            <input type="password" class="form-control" name="new_password" placeholder="New Password">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Confirm New Password</label>
                            <input type="password" class="form-control" name="confirm_new_password" placeholder="Confirm New Password">
                          </div>

                          <div class="row">
                            <div class="col-md-3 mx-auto">
                              <button type="submit" class="btn btn-lg btn-info mr-2">Change Settings</button>
                            </div>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
    @include('footer')

    <script>
    </script>
  </body>
</html>
            
        