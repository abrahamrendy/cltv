        @include('header')

    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  style="background-color: #004C2E;">
        <!-- begin:: Page -->
        <style type="text/css">

            .left-side-bg {
                 background-position: center; 
                 background-size: 80%; 
                 background-color: #453939;
                 background-repeat: no-repeat;
            }

            #submit-btn:hover {
                background-color: #453939;
                border-color: #453939;
            }

            .alert-warning {
                color: #856404 !important;
                background-color: #fff3cd !important;
                border-color: #ffeeba !important;
            }

            .bg-info, footer {
                background-color: #004C2E !important;
            }

            .text-muted {
                color: white !important;
            }

            .form-control {
                background-color: white !important;
            }

            .btn-primary {
                background-color: #D6B261 !important;
                border-color: #D6B261 !important;
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
            <div class="content-wrapper d-flex align-items-center text-center error-page bg-info">
              <div class="row flex-grow">
                <div class="col-lg-7 mx-auto text-white">
                  <div class="row align-items-center d-flex flex-row">
                    <div class="col-lg-12 error-page-divider text-lg-center pl-lg-4">
                        <img src="{{asset('images/logo/Logo White Gold.png')}}" alt="logo" width="12%"/>
                        <div class="col-lg-12 mt-3">
                            <img src="{{asset('images/logo/VerificatorG.png')}}" alt="logo" width="93%"/>
                        </div>
                        <h2>{{$material}}</h2>
                    </div>
                  </div>
                   @if($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible col-lg-8 mx-auto" role="alert" style="margin-top: 1 rem; font-size: 1.2rem">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <strong>Success!</strong> <?php echo $message;?>
                        </div>
                    @endif
                    @if($message = Session::get('fail'))
                        <div class="alert alert-danger alert-dismissible col-lg-8 mx-auto" role="alert" style="margin-top: 1rem; font-size: 1.2rem">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <strong>Fail!</strong> <?php echo $message;?>
                        </div>
                    @endif

                    <form id="verificator" class="m-login__form m-form" action="{{ route('verify') }}" method="POST">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-lg-8 mx-auto text-white">
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-lg" placeholder="Code" name="qr_code" autofocus >
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3 mx-auto text-white">
                              <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-primary btn-block enter-btn">SUBMIT</button>
                              </div>
                            </div>
                        </div>
                    </form>

                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center">
                          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Cultivate Hub {{ date('Y') }}</span>
                        </div>
                    </footer>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
          </div>
          <!-- page-body-wrapper ends -->
        </div>
        <!-- end:: Page -->
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();

            $('#verificator').submit(function(e){
                $(this).find('#registration_code').prop('readonly',true);
                $(this).find('#submit-btn').prop('disabled', true);
                var inp = $('#registration_code').val();
                console.log(inp.length);
                if (inp.length > 24) {
                    console.log('sad');
                    alert("Mohon hanya melakukan scan sekali saja. Silakan coba lagi.");
                    e.preventDefault();
                    location.reload();
                }
            });
        } );
    </script>
</html>
            
        