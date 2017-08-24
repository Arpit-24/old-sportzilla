     
     <div class="footer">

            <div class="pull-right">
               technical issues <strong>@</strong> 9929039385 , 7737436200.
            </div>
            <div>
                <strong>Copyright</strong> <a href="https://www.facebook.com/codingclubpilani?fref=ts" target="_blank">coding club</a>, BITS Pilani &copy; <?php echo date('Y')?>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="modal inmodal in" id="instructionsModal" tabindex="-1" role="dialog" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <!-- <i class="fa fa-laptop modal-icon"></i> -->
                <h4 class="modal-title">Instructions</h4>
                <small class="font-bold"></small>
            </div>
           
            <div  class="modal-body">
            <p>You can only proceed to the next question after solving the present question. </p>
            <p>Answers are not case sensitive.</p>
            <p>Answers should be submitted without any spaces. For eg: Hello World should be submitted as helloworld</p>
            <p>You will be rewarded 100 points on answering a question correctly.</p>
            <p>You can use the skip question option. They will be limited and 50 Points will be deducted from your credits. </p>
            <p>The one with the top position in the Leader Board will be the winner!</p>
            <p>Hints will be provided on the Coding Club page on Facebook. </p>
            </div>
           
           
        </div>
    </div>
</div>
    <!-- Mainly scripts -->
    <script src="<?php echo BASE_URI."templates/"?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo BASE_URI."templates/"?>js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/flot/jquery.flot.pie.js"></script>
     <!-- jQuery UI -->
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/jquery-ui/jquery-ui.min.js"></script>
    
     <!-- Custom and plugin javascript -->
    <script src="<?php echo BASE_URI."templates/"?>js/inspinia.js"></script>
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/pace/pace.min.js"></script>

    <!-- Peity -->
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo BASE_URI."templates/"?>js/demo/peity-demo.js"></script>

   
   <!-- GITTER -->
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo BASE_URI."templates/"?>js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/toastr/toastr.min.js"></script>
    
    

    <script>
   
/*
            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#464f88"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            var doughnutData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 50,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 100,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var doughnutOptions = {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                percentageInnerCutout: 45, // This is 0 for Pie charts
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false
            };

            var ctx = document.getElementById("doughnutChart").getContext("2d");
            var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

            var polarData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 140,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 200,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var polarOptions = {
                scaleShowLabelBackdrop: true,
                scaleBackdropColor: "rgba(255,255,255,0.75)",
                scaleBeginAtZero: true,
                scaleBackdropPaddingY: 1,
                scaleBackdropPaddingX: 1,
                scaleShowLine: true,
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false
            };
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

        });
*/    </script>
</body>
</html>
