<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>@yield('title')</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="{{asset('backend/img/fav-icon.png')}}" type="image/x-icon"/>
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{asset('backend/css/theme-default.css')}}"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <!-- EOF CSS INCLUDE -->     
        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css"> 
        @stack('styles')                           
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            @include('backend.layouts._sidebar')
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                @include('backend.layouts._header')
                <!-- END X-NAVIGATION VERTICAL -->  

              
                    @yield('content')
            
                
            </div>
        <!-- END PAGE CONTAINER -->
        

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right" style="display:flex; gap:10px;">
                            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-lg">Yes</button>
                            </form>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="{{asset('backend/js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="{{asset('backend/js/plugins/icheck/icheck.min.js')}}"></script>        
        <script type="text/javascript" src="{{asset('backend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('backend/js/plugins/morris/raphael-min.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/plugins/morris/morris.min.js')}}"></script>       
        <script type="text/javascript" src="{{asset('backend/js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('backend/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>                
        <script type='text/javascript' src="{{asset('backend/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>                
        <script type="text/javascript" src="{{asset('backend/js/plugins/owl/owl.carousel.min.js')}}"></script>                 
        
        <script type="text/javascript" src="{{asset('backend/js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('backend/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        {{-- <script type="text/javascript" src="{{asset('backend/js/settings.js')}}"></script> --}}
        
        <script type="text/javascript" src="{{asset('backend/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{asset('backend/js/actions.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('backend/js/demo_dashboard.js')}}"></script>
        <!-- Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function(){
                $('.selectpicker').selectpicker();
            });
        </script>
        <!-- END TEMPLATE -->
        <!-- END SCRIPTS --> 
        @yield('scripts') 
        @stack('scripts')
    </body>
</html>






