<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('assets/plugins/side-menu/sidemenu.js')}}"></script>
<script src="{{URL::asset('assets/js/custom.js')}}"></script><!-- Left-menu js-->
  <!--Internal  index js -->
<script src="{{ URL::asset('assets/js/index.js') }}"></script>
<script src="{{URL::asset('assets/libs/chart.js')}}"></script><!-- Left-menu js-->


@yield('js')