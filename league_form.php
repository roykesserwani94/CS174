<?php session_start();
		 require('connection.php');
	if(isset($_GET['leagueform']) && isset($_GET['contestname']) && isset($_GET['entries']) && isset($_GET['fee']) && isset($_GET['date'])){
		$contestname = $_GET['contestname'];
		$entries = $_GET['entries'];
		$fee = $_GET['fee'];
		$prize = $entries * $fee;
		$dateString = $_GET['date'];
		$date = $dateString;
		$query = "INSERT INTO LEAGUES VALUES(NULL, {$_SESSION['profile_id']}, '{$contestname}', {$entries}, {$fee}, {$prize}, STR_TO_DATE('$date', '%m/%d/%Y'));";
		$result = mysqli_query($mysqli, $query) or die(mysql_error());
		$leagueCreated = true;
	}



 ?>

<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Sign Up Form</title>
			<link rel="stylesheet" href="css/normalize.css">
			<link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/style3.css">
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css"/>
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.jqueryui.css"/>
			<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css"/>
			<link rel="stylesheet" type="text/css" href="css/style3.css"/>

			<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.jqueryui.js"></script>
			<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
	</head>
	<style>


body {
  font-family: 'Nunito', sans-serif;
	background-image:url('images/formbackground.jpg');
	background-size:100% 100%;
}

form {
	opacity:.9;
  width: 750px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

#form-div {

    position:absolute;
    left:0;
    right:0;
    margin-left:auto;
    margin-right:auto;
		margin-top:150px;

}
input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #4bc970;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

@media screen and (min-width: 480px) {


}
</style>
<?php include 'header2.php'; ?>

	<body style="height:1100px;">


		<br/>
		<br/>
		<br/>
		<form id="form-div" action="league_form.php" method="get">

			<h1>League</h1>
			<?php if(isset($leagueCreated)) { echo "<h3 style='text-align:center;color:red;'>League Created</h3>"; } ?>
			<fieldset>
				<legend><span class="number">1</span>Basic League Info</legend>
				<label for="name">Contest Name:</label>
				<input type="text" id="name" name="contestname">

			<label for="entry-input" name="entries">Entries:</label>
			<select id="entry-input" name="entries">
				<optgroup label="Number of players">
					<option value="2">2</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="50">50</option>
					<option value="100">10</option>
					<option value="1000">1000</option>
					<option value="10000">10000</option>
				</optgroup>
			</select>

				<label>Fee:</label>
						<input id="fee-input" type="number" placeholder="$$$" name="fee">
				<label>Prize:</label>
				<h3 style="color:red;">$<span id="prize-amount">0</span></h3>


				<label>Date:</label>
				<input type="text" name="date" placeholder="MM/DD/YYYY"/>

			</fieldset>
			<input type="hidden" name="leagueform" />
			<button type="submit">Sign Up</button>
		</form>
		<br/>
		<br/>3

	</body>
	<script src="js/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#fee-input").change(function(){
				var fee = $(this).val();
				var entries = $("#entry-input").val();
				$("#prize-amount").html(Number(fee) * Number(entries));
			});
			$("#entry-input").change(function(){
				var entries = $(this).val();
				var fee = $("#fee-input").val();
				$("#prize-amount").html(Number(fee) * Number(entries));
			});
		});
	</script>
</html>
