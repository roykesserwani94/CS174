<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Leagues</title>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <style type="text/css">
            html, body { height: 100%; }
        </style>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.jqueryui.css"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/history_style.css"/>


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
         <?php
    
    $username = "root";
      $password = "";
      $host = "localhost";

      $connector = mysql_connect($host,$username,$password)
          or die("Unable to connect");
        //echo "Connections are made successfully::";
      $selected = mysql_select_db("fantasyfootball", $connector)
        or die("Unable to connect");
      $result = mysql_query("SELECT title, entries,fee, prize FROM leagues");

        ?>

        <section class="main">
          <div class="container main-container">
            <div class="fill-draft">
                <div class="row">
                </div>
             </div>
          </div>
        </section>

<div class="container">
    <div class="row">
            <div class="col-lg-12">
                <p></p>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Leagues</li>
                </ol>     
            </div>
    </div>

<div class="row">
<div class="col-lg-12">
    <h1 align="center">My Lineups</h1>
    <hr class = "style1">
    
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title" align="right">Press the filter button below to filter your search</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Leagues" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Fees" disabled></th>
                        <th><input type="text" class="form-control" placeholder="1st Place Payout" disabled></th>
                        <th><input type="text" class="form-control" placeholder="2nd Place Payout" disabled></th>
                        <th><input type="text" class="form-control" placeholder="3rd Place Payout" disabled></th>
                    </tr>
                </thead>
        
                    </tr>
                </tbody>
                 <tbody>
                
          <?php
          $a = 1;
          while( $row = mysql_fetch_assoc( $result ) ){

    $payout1 = ($row['entries'] * $row['prize']) * .60;
    $payout2 = $row['entries'] * $row['prize'] * .30;
    $payout3 = $row['entries'] * $row['prize'] * .10;
    echo "<tr>";
    echo "<td>" . $a . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . "$" . $row['fee'] . "</td>";
    echo "<td>" . "$" . $payout1 . "</td>";
    echo "<td>" . "$" . $payout2 . "</td>";
    echo "<td>" . "$" . $payout3 . "</td>";
   
    echo "</tr>\n";
    $a++;
          }
        ?>

      </tbody>
            </table>
        </div>
    </div>
</div>

<? php include 'footer.php'; ?>

</body>


<script type="text/javascript">
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>

</html>