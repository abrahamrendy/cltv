        @include('header')
            
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <!-- begin:: Page -->
        <style type="text/css">

            .hide {
                display: none !important;
            }

            .m-login.m-login--5 {
                height: auto;
            }

            .left-side-bg {
                 background-position: center; 
                 background-size: 80%; 
                 background-color: #453939;
                 background-repeat: no-repeat;
            }

            #submit-btn:hover {
                background-color: #0C0D13;
                border-color: #0C0D13;
            }

            .datepicker {
                width: 100%;
            }

            select.form-control:not([size]):not([multiple]) {
                height: auto;
            }

            @media (max-width: 768px) {
                .left-side-bg {
                     background-position: center; 
                     background-size: 50%; 
                     background-color: #453939;
                     background-repeat: no-repeat;
                     height: 60vw;
                }
            }

              input[type="date"]:before {
                content: attr(placeholder) !important;
                color: #aaa;
                margin-right: 0.5em;
              }
              input[type="date"]:focus:before,
              input[type="date"]:valid:before {
                content: "";
              }
        </style>

        <div class="container-scroller">
          <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
              <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">
                <div class="card col-lg-4 mx-auto">
                  <div class="card-body px-4 py-4">
                    @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <strong>Success!</strong> {{ $message }}
                            </div>
                        @endif

                        @if($message = Session::get('fail'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <strong>Sorry.</strong> {{ $message }}
                            </div>
                        @endif
                    <div class="sidebar-brand-wrapper brand-logo d-lg-flex align-items-center justify-content-center text-center mb-1">
                        <a class="sidebar-brand mx-auto" href="{{route('tracker')}}"><img src="{{asset('images/logo/Logo White Gold.png')}}" alt="logo" /></a>
                    </div>
                    <!-- <h2 class="card-title text-left mb-3">Cultivate Tracker</h2> -->
                    <h3 class="card-title text-center mb-3">Login</h3>
                    <form action="{{ route('login_user') }}" method="POST">
                        @csrf
                      <div class="form-group">
                        <label>Cultivate Code *</label>
                        <input type="text" class="form-control p_input" name="qr_code" required>
                      </div>
                      <div class="form-group">
                        <label>Password *</label>
                        <input type="password" class="form-control p_input" name="password" required>
                      </div>
                      <!-- <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"> Remember me </label>
                        </div>
                        <a href="#" class="forgot-pass">Forgot password</a>
                      </div> -->
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
          </div>
          <!-- page-body-wrapper ends -->
        </div>
        <!-- end:: Page -->
        @include('footer')
    </body>
</html>
            
        