<?php
session_start();
if (!isset($_SESSION["is_admin"])) {
    header("location: ../login.php");
}
include("../../backend/config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('./user_components/header_links.php'); ?>
    <title>Manage Categories</title>

    <style>
        .tags {
            list-style: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
        }

        .tags li {
            float: left;
        }

        .tag {
            background: #eee;
            border-radius: 3px 0 0 3px;
            color: #999;
            display: inline-block;
            height: 26px;
            line-height: 26px;
            padding: 0 20px 0 23px;
            position: relative;
            margin: 0 10px 10px 0;
            text-decoration: none;
            -webkit-transition: color 0.2s;

            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .overflow_style2 {
            max-width: 100px !important;
            overflow-x: auto;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .overflow_style2::-webkit-scrollbar {
            display: none;
        }

        .tag::before {
            background: #fff;
            border-radius: 10px;
            box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
            content: '';
            height: 6px;
            left: 10px;
            position: absolute;
            width: 6px;
            top: 10px;
        }

        .tag::after {
            background: #fff;
            border-bottom: 13px solid transparent;
            border-left: 10px solid #eee;
            border-top: 13px solid transparent;
            content: '';
            position: absolute;
            right: 0;
            top: 0;
        }

        .tag:hover {
            background-color: blue;
            color: white;
        }

        .tag:hover::after {
            border-left-color: blue;
        }
    </style>

</head>

<body>
    <div id="loader" class="center"></div>

    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <?php require('./user_components/side_bar.php'); ?>


        <!-- Add Modaal -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../..//backend/user/new_service.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="text" name="service_name" class="form-control " required id="" placeholder="Enter Category Name">
                            <div class="mb-2">
                                <label class="form-label" for="file">Category image</label>
                                <input type="file" accept=".png,.jpg,.jpeg/*" class="form-control" name="document" id="file">
                                <p class="text-danger">Only .png,.jpg,.jpeg,type file formate and less than 5 mb file is supportted.</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Analytics</h1>
                            </div>
                            <!-- Actions -->
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="text-center">Pie Chart</h2>
                            <div id="piechart" style="width: 500px; height: 500px"></div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center">Curve Chart</h2>
                            <div id="curve_chart" style="width: 500px; height: 500px"></div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center">Bar Chart</h2>
                            <div id="barchart_values" style="width: 500px; height: 500px"></div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center">Column Chart</h2>
                            <div id="columnchart_values" style="width: 500px; height: 500px"></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php require('./user_components/scripts.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Task", "Hours per Day"],
                ["Work", 12],
                ["Eat", 1],
                ["Commute", 2],
                ["Watch TV", 4],
                ["Sleep", 5],
            ]);

            var options = {
                title: "My Daily Activities",
            };

            var chart = new google.visualization.PieChart(
                document.getElementById("piechart")
            );

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Year", "Sales", "Expenses"],
                ["2004", 1000, 400],
                ["2005", 1170, 460],
                ["2006", 660, 1120],
                ["2007", 1030, 540],
            ]);

            var options = {
                title: "Company Performance",
                curveType: "function",
                legend: {
                    position: "bottom"
                },
            };

            var chart = new google.visualization.LineChart(
                document.getElementById("curve_chart")
            );

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Density", {
                    role: "style"
                }],
                ["Copper", 8.94, "#b87333"],
                ["Silver", 10.49, "silver"],
                ["Gold", 19.3, "gold"],
                ["Platinum", 21.45, "color: #e5e4e2"],
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([
                0,
                1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation",
                },
                2,
            ]);

            var options = {
                title: "Density of Precious Metals, in g/cm^3",
                width: 600,
                height: 400,
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.BarChart(
                document.getElementById("barchart_values")
            );
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Density", {
                    role: "style"
                }],
                ["Copper", 8.94, "#b87333"],
                ["Silver", 10.49, "silver"],
                ["Gold", 19.3, "gold"],
                ["Platinum", 21.45, "color: #e5e4e2"],
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([
                0,
                1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation",
                },
                2,
            ]);

            var options = {
                title: "Density of Precious Metals, in g/cm^3",
                width: 600,
                height: 400,
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.ColumnChart(
                document.getElementById("columnchart_values")
            );
            chart.draw(view, options);
        }
    </script>
    <script>
        function confirm_delete() {
            var confirm_del = confirm("Are you sure ?");
            if (confirm_del == true) {
                document.querySelector(
                    "body").style.visibility = "hidden";
                document.querySelector(
                    "#loader").style.visibility = "visible";
                document.querySelector(
                    "#loader").style.zIndex = "2";
                return true;

            } else {
                return false;
            }
        }
    </script>


</body>

</html>