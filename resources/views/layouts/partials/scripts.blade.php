<!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-1.11.2.min.js') }}"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="{{ URL::asset('assets/js/materialize.js') }}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{ URL::asset('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/dropify/js/dropify.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/persianDatepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/tooltip.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/alert.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/mprogress.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('assets/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ URL::asset('assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('assets/tinymce/js/tinymce/themes/modern/theme.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/print.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/ajax.js') }}"></script>
    @yield('scripts')

<script>
    tinymce.init({
      selector: '.editor',
      height: 200,
      plugins: [
      'advlist autolink lists link  charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime  table contextmenu paste code'
      ],
      toolbar: 'fontsizeselect insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | table',
      fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt',
      content_css: [
      '{{ URL::asset("assets/tinymce/js/tinymce/skins/lightgray/skin.min.css") }}'

      ]
    });
$('.dropify').dropify();

  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });

  
  </script>