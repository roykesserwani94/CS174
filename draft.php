<?php session_start(); ?>
<html>
    <head>
        <title>Draft</title>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <style type="text/css">
            html, body { height: 100%; }
            h1{
              display: block;
    font-size: 2em;
    -webkit-margin-before: 0.67em;
    -webkit-margin-after: 0.67em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
    font-weight: bold;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.jqueryui.css"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/draft_style.css"/>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.jqueryui.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
        <link href="css/navbar.css" rel="stylesheet">

    </head>
    <?php include 'header2.php'; ?>

    <body>
    <section class="main">
      <div class="container">
      <div class="fill-draft">
        <div class="row">
        </div>
         </div>
      </div>
    </section>
     <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
            <p></p>
            <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Draft</li>
                </ol>

                
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-7">
                <?php
                  /* require_once("config.php");
                    $conn = db2_connect($db2['db'], $db2['user'], $db2['pass']);
                    if (!$conn) {
                    echo db2_conn_error() . "<br>";
                    echo db2_conn_errormsg() . "<br>";
                    echo "Connection failed.<br>";
                    return;
                    }

                    $query = 'SELECT name1, name2, street, city, state, zip, county, db2gse.ST_X(loc) as long, db2gse.ST_Y(loc) as lat FROM school WHERE county = ?';
                    $stmt = db2_prepare($conn, $query);
                    $name = 'Solano';
                    $school_locations = array();
                    if ($stmt) {
                    db2_bind_param($stmt, 1, "name", DB2_PARAM_IN);
                    db2_execute($stmt);
                    while ($row = db2_fetch_assoc($stmt)) {
                    $school_locations[] = $row;
                    }
                    }
                    db2_close($conn); */
                  ?>
                <h1>Start Drafting</h1>
                <hr class="style1"/>
                <script type="text/javascript">
                  var dataSet = [["QB", "", "", "", ""], ["RB", "", "", "", ""], ["RB", "", "", "", ""], ["WR", "", "", "", ""], ["WR", "", "", "", ""], ["WR", "", "", "", ""], ["TE", "", "", "", ""], ["FLEX", "", "", "", ""], ["DST", "", "", "", ""]];
                  var table, lineUpTable;
                  var startingSalary = 20000;
                  var remainingSalary = startingSalary;
                  var averagePerPlayer = startingSalary / 9;
                  $(document).ready(function () {
              table = $('table.table').DataTable({
                ajax: 'arrays.txt',
                //scrollY: 450,
                scrollCollapse: true,
                //paging: false,
                //stateSave: true,
                columns: [
                  {title: "POS"},
                  {title: "PLAYER"},
                  {title: "OPP"},
                  {title: "OPRK"},
                  {title: "FPPG"},
                  {title: "Salary"},
                  {title: "",
                    width: "20px",
                    sortable: false,
                    "render": function (data, type, row, meta) {
                      if (isRoleAvailable(row[0]) !== -1 && row[5] <= remainingSalary && isPlayerAvailable(row[1])) {
                        return '<button type="button" class="btn btn-success rolloverBtn">Add</button>';
                      } else {
                        return '<button type="button" class="btn btn-success rolloverBtn" disabled>Add</button>';
                      }
                    }}
                ],
                "aoColumnDefs": [
                  {
                    "aTargets": [5],
                    mRender: function (data, type, row) {
                      return '$' + data;
                    }
                  }
                ],
                "columnDefs": [
                  {"width": "20px", "targets": 6}
                ]
              });
              table.columns([0]).search('QB').draw();
              $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                //$.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
                var target = $(e.target).attr("href");
                table.columns([0]).search(target).draw();
                table.columns.adjust();
              });

              lineUpTable = $('#example2').DataTable({
                data: dataSet,
                scrollCollapse: true,
                paging: false,
                "dom": 'lrtp',
                "bSort": false,
                columns: [
                  {title: "POS"},
                  {title: "PLAYER"},
                  {title: "OPP"},
                  {title: "FFPG"},
                  {title: "SALARY"},
                  {title: "",
                    sortable: false,
                    "render": function (data, type, row, meta) {
                      if (row[1] !== "") {
                        return '<button type="button" class="btn btn-success rolloverBtn">Remove</button>';
                      } else {
                        return '';
                      }
                    }}
                ],
                "aoColumnDefs": [
                  {
                    "aTargets": [4],
                    mRender: function (data, type, row) {
                      if (data !== "")
                        return '$' + data;
                      else
                        return data;
                    }
                  }
                ]
              });

              $('table.table').on('click', 'button', function () {
                var data = table.row($(this).parents('tr')).data();
                var index = isRoleAvailable(data[0]);
                if (index !== -1) {
                  dataSet[index] = [data[0], data[1], data[2], data[4], data[5]];
                  lineUpTable.clear();
                  lineUpTable.rows.add(dataSet);
                  lineUpTable.draw();
                  table.ajax.reload(null, false);
                  updateSalary();
                }
              });
              $('#example2 tbody').on('click', 'button', function () {
                var data = lineUpTable.row($(this).parents('tr')).data();
                clearRole(data[1]);
                lineUpTable.clear();
                lineUpTable.rows.add(dataSet);
                lineUpTable.draw();
                table.ajax.reload();
                updateSalary();
              });

              updateSalary();
              checkMobile();
            });

            function checkMobile() {
              if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                var el = document.getElementById("pTable");
                el.style.float = "none";
                el.style.width = "100%";
                el = document.getElementById("lineUpTable");
                el.style.float = "none";
                el.style.width = "100%";
                lineUpTable.columns.adjust();
              }
            }

            function isRoleAvailable(role) {
              for (var i = 0; i < dataSet.length; ++i) {
                var pos = dataSet[i];
                if (pos[0] === role && pos[1] === "")
                  return i;
              }
              return -1;
            }

            function isPlayerAvailable(player) {
              for (var i = 0; i < dataSet.length; ++i) {
                var pos = dataSet[i];
                if (pos[1] === player)
                  return false;
              }
              return true;
            }

            function clearRole(player) {
              for (var i = 0; i < dataSet.length; ++i) {
                var pos = dataSet[i];
                if (pos[1] === player) {
                  for (var j = 1; j < dataSet.length; j++) {
                    pos[j] = "";
                  }
                }
              }
            }

            function updateSalary() {
              remainingSalary = startingSalary;
              for (var i of dataSet) {
                if (i[1] !== "") {
                  remainingSalary -= i[4];
                }
              }
              averagePerPlayer = remainingSalary / getRemainingPos();
              document.getElementById('avgSalPerPl').innerHTML = 'Avg. Remaining Salary / Player: $' + Math.round(averagePerPlayer * 100) / 100;
              document.getElementById('remSal').innerHTML = 'Remaining Salary: $' + remainingSalary;
            }

            function getRemainingPos() {
              var count = 0;
              for (var i = 0; i < dataSet.length; ++i) {
                var pos = dataSet[i];
                if (pos[1] === "")
                  count++;
              }
              return count;
            }
        </script>
        <div id="pTable">
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active">
                        <a href="QB" data-toggle="tab">QB</a>
                    </li>
                    <li>
                        <a href="RB" data-toggle="tab">RB</a>
                    </li>
                    <li>
                        <a href="WR" data-toggle="tab">WR</a>
                    </li>
                    <li>
                        <a href="TE" data-toggle="tab">TE</a>
                    </li>
                    <li>
                        <a href="FLEX" data-toggle="tab">FLEX</a>
                    </li>
                    <li>
                        <a href="DST" data-toggle="tab">DST</a>
                    </li>
                    <li>
                        <a href="" data-toggle="tab">All</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-table1">
                        <table id="myTable1" class="table table-striped table-bordered" style="font-size: 12px;" cellspacing="0" width="100%">
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-5">
          <div id="lineUpTable">
            <h1>Your Current Lineup</h1>


          <hr class="style1"/>
            
            <table id="example2" class="display" width="100%"></table>
            <label class="salary" id="remSal"></label> <br/>
            <label class="salary" id="avgSalPerPl"></label>
        </div>
      </div>

            </div>
      </div>
        </div>
        <!-- /.row -->

        <hr class="style1">

        <!-- Footer -->
        <?php include 'footer.php'; ?>

    </div>
    <!-- /.container -->
    </body>

</html>
