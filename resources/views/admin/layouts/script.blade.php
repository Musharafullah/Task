<script src="https://s3bits.com/capitalcity/assets/js/app.js" type="text/javascript"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<!-- end of global js -->

<!-- pusher js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var user_id = "1";

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('9f8f059b91665e879a4c', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('push-notification');
    channel.bind('push-notification-event', function(data) {
        if (data.id == user_id) {
            //alert(JSON.stringify(data));
            toastr.options = {
                "positionClass": "toast-top-right"
            }
            toastr.warning('<a href="https://youtube.com">' + data.link + '</a>');
        }
    });

    var open_notification = pusher.subscribe('open-reminder');
    open_notification.bind('open-reminder-event', function(data) {
        if (data.id == user_id) {
            //alert(JSON.stringify(data));
            toastr.options = {
                "positionClass": "toast-top-right"
            }
            toastr.warning(data.text);
        }
    });

    var course_logbook = pusher.subscribe('course-logbook');
    course_logbook.bind('course-logbook-event', function(data) {
        if (data.id == user_id) {
            //alert(JSON.stringify(data));
            toastr.options = {
                "positionClass": "toast-top-right"
            }
            toastr.warning(data.text);
        }
    });
</script>
<!-- pusher js end -->

<!-- begin page level js -->
<script type="text/javascript" src="https://s3bits.com/capitalcity/assets/vendors/moment/js/moment.min.js"></script>
<script type="text/javascript"
    src="https://s3bits.com/capitalcity/assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- EASY PIE CHART JS -->
<script src="https://s3bits.com/capitalcity/assets/vendors/bower-jquery-easyPieChart/js/easypiechart.min.js"></script>
<script src="https://s3bits.com/capitalcity/assets/vendors/bower-jquery-easyPieChart/js/jquery.easypiechart.min.js">
</script>
<script src="https://s3bits.com/capitalcity/assets/vendors/bower-jquery-easyPieChart/js/jquery.easingpie.js"></script>
<!--for calendar-->
<script src="https://s3bits.com/capitalcity/assets/vendors/moment/js/moment.min.js" type="text/javascript"></script>
<script src="https://s3bits.com/capitalcity/assets/vendors/fullcalendar/js/fullcalendar.min.js" type="text/javascript">
</script>
<!--   Realtime Server Load  -->
<script src="https://s3bits.com/capitalcity/assets/vendors/flotchart/js/jquery.flot.js" type="text/javascript"></script>
<script src="https://s3bits.com/capitalcity/assets/vendors/flotchart/js/jquery.flot.resize.js" type="text/javascript">
</script>
<!--Sparkline Chart-->
<script src="https://s3bits.com/capitalcity/assets/vendors/sparklinecharts/jquery.sparkline.js"></script>
<!-- Back to Top-->
<script type="text/javascript" src="https://s3bits.com/capitalcity/assets/vendors/countUp_js/js/countUp.js"></script>
<!--   maps -->
<script src="https://s3bits.com/capitalcity/assets/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="https://s3bits.com/capitalcity/assets/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js">
</script>
<!--  todolist-->
<script src="https://s3bits.com/capitalcity/assets/js/pages/todolist.js"></script>
<script src="https://s3bits.com/capitalcity/assets/js/pages/dashboard.js" type="text/javascript"></script>

<!-- Charts -->
<script language="javascript" type="text/javascript"
    src="https://s3bits.com/capitalcity/assets/vendors/flotchart/js/jquery.flot.time.js"></script>
<script language="javascript" type="text/javascript"
    src="https://s3bits.com/capitalcity/assets/vendors/flotchart/js/jquery.flot.selection.js"></script>
<script language="javascript" type="text/javascript"
    src="https://s3bits.com/capitalcity/assets/vendors/flotchart/js/jquery.flot.symbol.js"></script>
<script language="javascript" type="text/javascript"
    src="https://s3bits.com/capitalcity/assets/vendors/flotchart/js/jquery.flot.resize.js"></script>
<script language="javascript" type="text/javascript"
    src="https://s3bits.com/capitalcity/assets/vendors/flotchart/js/jquery.flot.categories.js"></script>
<script language="javascript" type="text/javascript"
    src="https://s3bits.com/capitalcity/assets/vendors/splinecharts/jquery.flot.spline.js"></script>
<script language="javascript" type="text/javascript"
    src="https://s3bits.com/capitalcity/assets/vendors/flot_tooltip/js/jquery.flot.tooltip.js"></script>

<script>
    //start bar chart
    var d1 = [
        ["1", 100],
        ["2", 80],
        ["3", 66],
        ["4", 48],
        ["5", 68],
        ["6", 48],
        ["7", 66],
        ["8", 80],
        ["9", 64],
        ["10", 48],
        ["11", 64],
        ["12", 100]
    ];
    $.plot("#bar-chart", [{
        data: d1,
        label: "Project",
        color: "#F89A14"
    }], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#ddd",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: true,
        tooltipOpts: {
            content: '%s: %y'
        },

        xaxis: {
            tickColor: "#ddd",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#ddd"
        },
        shadowSize: 0
    });
    //end bar chart



    //start line chart

    var s1 = [
        ["Jan", 70],
        ["Feb", 100],
        ["Mar", 80],
        ["Apr", 100],
        ["May", 80],
        ["Jun", 90],
        ["Jul", 80]
    ];

    $.plot("#spline-chart", [{
        data: s1,
        label: " Product 1",
        color: "#01bc8c"
    }], {
        series: {
            lines: {
                show: !1
            },
            splines: {
                show: !0,
                tension: .4,
                lineWidth: 2,
                fill: 0
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#fafafa",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#fafafa",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#fafafa"
        },
        shadowSize: 0
    });

    //end spline chart
</script>
