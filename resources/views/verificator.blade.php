        @include('header')

    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
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
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-login m-login--singin  m-login--5" id="m_login" >
                <div class="m-login__wrapper-2 m-portlet-full-height">
                    <div class="m-login__contanier">
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">
                                    <b>PERTEMUAN PENGERJA <br><?php echo date('d/m Y', strtotime('now'))?></b><br>ACTIVATOR
                                </h3>
                                <h4 class="text-center">
                                </h4>
                                <h4 class="text-center">
                                </h4>
                            </div>
                            @if($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: 2rem; margin-bottom: -2rem; font-size: 1.5rem">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                  <strong>Success!</strong> <?php echo $message;?>
                                </div>
                            @endif
                            @if($message = Session::get('double'))
                                <div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 2rem; margin-bottom: -2rem; font-size: 1.5rem">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                  <strong>Success!</strong> <?php echo $message;?>
                                </div>
                            @endif
                            @if($message = Session::get('fail'))
                                <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 2rem; margin-bottom: -2rem; font-size: 1.5rem">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                  <strong>Fail!</strong> <?php echo $message;?>
                                </div>
                            @endif
                            @if($message = Session::get('wrong'))
                                <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 2rem; margin-bottom: -2rem; font-size: 1.5rem">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                  <strong>Fail!</strong> <?php echo $message;?>
                                </div>
                            @endif

                            <form id="verificator" class="m-login__form m-form" action="#" method="POST">
                                @csrf
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" id="registration_code" type="text" placeholder="CODE" name="registration_code" required autofocus >
                                </div>
                                <div class="m-login__form-action">
                                    <button type ="submit" id="submit-btn" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air" style="font-weight: 400">
                                        SUBMIT
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-scroller">
          <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center text-center error-page bg-info">
              <div class="row flex-grow">
                <div class="col-lg-7 mx-auto text-white">
                  <div class="row align-items-center d-flex flex-row">
                    <div class="col-lg-12 error-page-divider text-lg-center pl-lg-4">
                      <h2>VERIFICATOR</h2>
                      <!-- <h3 class="font-weight-light">Internal server error!</h3> -->
                    </div>
                  </div>
                    <div class="row mt-5">
                        <div class="col-lg-8 mx-auto text-white">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-lg" placeholder="Code" name="registration_code" aria-label="Username">
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
                  <!-- <div class="row mt-5">
                    <div class="col-12 mt-xl-2">
                      <p class="text-white font-weight-medium text-center">Copyright &copy; 2020 All rights reserved.</p>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
          </div>
          <!-- page-body-wrapper ends -->
        </div>
        <!-- end:: Page -->
    </body>
    @include('footer')
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
            
        