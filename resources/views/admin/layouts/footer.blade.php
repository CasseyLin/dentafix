<footer class="footer">
    <div class="w-100 clearfix">
        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2022 Dentafix. All Rights Reserved.</span>
        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Developed with <i class="fa fa-heart text-danger"></i> by Cassey</a></span>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="{{asset('template/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('template/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('template/plugins/screenfull/dist/screenfull.js')}}"></script>
<script src="{{asset('template/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('template/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('template/plugins/moment/moment.js')}}"></script>
<script src="{{asset('template/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('template/plugins/d3/dist/d3.min.js')}}"></script>
<script src="{{asset('template/plugins/c3/c3.min.js')}}"></script>
<script src="{{asset('template/js/tables.js')}}"></script>
<script src="{{asset('template/js/widgets.js')}}"></script>
<script src="{{asset('template/js/charts.js')}}"></script>
<script src="{{asset('template/dist/js/theme.min.js')}}"></script>

<script type="text/javascript">
$(document).ready(function(){
$("#datepicker").datetimepicker({
    format:'YYYY-MM-DD'
})
})
</script>

<script>
    var botmanWidget = {
        aboutText: 'Developed with❤️ by Cassey',
        introMessage: "✋ Hi! I am Cassey, your assistant chatbot from DentaFix~",
        title:"DentaFix Chatbot",
        placeholderText: 'Ask Cassey Something...',
        bubbleBackground: '#FFFFFF',
        mainColor:'#80E2FF',
        aboutText:'Developed with ❤️ by Cassey',
        aboutLink:'https://drive.google.com/file/d/1Pc8pRFxdSyBHazol4EZkqf_WS0raKh1g/view?usp=sharing',
        bubbleAvatarUrl:'/chatbot/chatbot.jpg'
    };
</script>

<script src="{{asset('js/app.js')}}"defer></script>