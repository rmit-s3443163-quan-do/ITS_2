<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:40 PM
 */
?>

<div class="admin-main">
    <div class="row">
        <div class="question col-xs-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Pre-Test Result
                </div>
                <div class="panel-body">
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <canvas id="chart-area-pre"/>

                        </div>

                    </div>
                    <div class="row text-center">
                        <ul class="legend-list list-unstyled list-inline">
                            <li><span class="leg leg-hd">&nbsp;</span> HD: 4</li>
                            <li><span class="leg leg-di">&nbsp;</span> DI: 0</li>
                            <li><span class="leg leg-cr">&nbsp;</span> CR: 4</li>
                            <li><span class="leg leg-pa">&nbsp;</span> PA: 2</li>
                            <li><span class="leg leg-nn">&nbsp;</span> NN: 12</li>
                        </ul>
                        Average Result: <span class="label label-danger">
                        NN</span> (43.4%)
                    </div>
                </div>
                <div class="panel-footer">Footer</div>
            </div>
        </div>
        <div class="question col-xs-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Post-Test Result
                </div>
                <div class="panel-body">
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <canvas id="chart-area-post"/>
                        </div>
                    </div>
                    <div class="row text-center">
                        <ul class="legend-list list-unstyled list-inline">
                            <li><span class="leg leg-hd">&nbsp;</span> HD: 9</li>
                            <li><span class="leg leg-di">&nbsp;</span> DI: 0</li>
                            <li><span class="leg leg-cr">&nbsp;</span> CR: 4</li>
                            <li><span class="leg leg-pa">&nbsp;</span> PA: 0</li>
                            <li><span class="leg leg-nn">&nbsp;</span> NN: 4</li>
                        </ul>
                        Average Result: <span class="label label-success">
                        CR</span> (60.0%)
                    </div>
                </div>
                <div class="panel-footer">Footer</div>
            </div>
        </div>

        <div class="question col-xs-12">
            <div class="panel panel-info">

                <div class="panel-heading">
                    Survey Result
                </div>

                <div class="panel-body">
                    Body
                </div>

                <div class="panel-footer">
                    Footer
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>
<script>
    var pieData1 = [
        {
            value: 4,
            color: "#3A89CC",
            label: "HD"
        },
        {
            value: 0,
            color: "#3FAACA",
            label: "DI"
        },
        {
            value: 4,
            color: "#3F9C3F",
            label: "CR"
        },
        {
            value: 2,
            color: "#FCC270",
            label: "PA"
        },
        {
            value: 12,
            color: "#F5716D",
            label: "NN"
        }

    ];
    var pieData2 = [
        {
            value: 9,
            color: "#3A89CC",
            label: "HD"
        },
        {
            value: 0,
            color: "#3FAACA",
            label: "DI"
        },
        {
            value: 4,
            color: "#3F9C3F",
            label: "CR"
        },
        {
            value: 0,
            color: "#FCC270",
            label: "PA"
        },
        {
            value: 4,
            color: "#F5716D",
            label: "NN"
        }

    ];

    window.onload = function () {
        var ctx = document.getElementById("chart-area-pre").getContext("2d");
        window.myPie1 = new Chart(ctx).Pie(pieData1);

        ctx = document.getElementById("chart-area-post").getContext("2d");
        window.myPie2 = new Chart(ctx).Pie(pieData2);
    };
</script>
