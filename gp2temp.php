<?php
//gp2Temp.php
define('THIS_PAGE', basename($_SERVER['PHP_SELF'])); //figure out the name of the current page
	$temp = $_POST['Temperature'];
	$FfromC = ($temp*1.8+32);
	$KfromC = ($temp+273.15);
	$KfromF = (($temp+459.67)*5/9);
	$CfromF = (($temp-32)/1.8);
	$CfromK = ($temp-273.15);
	$FfromK = (($temp*9/5) - 459.67);

//<link rel="stylesheet" href="styles.css">
	echo '
	<head>
	  <!-- Required meta tags -->
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	  <!-- Bootstrap CSS -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	  <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
	  <link rel="stylesheet" href="styles.css">
	  <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
	</head>

        <form action="'
		. THIS_PAGE .
		'" method="post" class="brow">

        <h1>Temperature Converter</h1>

		<body class="container bod">
		<div class="form-group row">
		     <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Temperature</label>
		     <div class="col-sm-10">
		         <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="Temperature" placeholder="Place Temperature here">
		     </div>
		</div>
		<div class="form-check">
		    <label class="form-check-label">
		      <input class="form-check-input" type="radio" name="Units" id="Units1" value="c" checked>
		      Celsius
		    </label>
		  </div>
		  <div class="form-check">
		    <label class="form-check-label">
		      <input class="form-check-input" type="radio" name="Units" id="Units2" value="f">
		      Fahrenheit
		    </label>
		  </div>
		  <div class="form-check">
		    <label class="form-check-label">
		      <input class="form-check-input" type="radio" name="Units" id="Units3" value="k">
		      Kelvin
		    </label>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>

		    <!-- jQuery first, then Tether, then Bootstrap JS. -->
		    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		  </body>';

	if(isset($_POST['Temperature']))
	{
	//check to see if the temperature input is a valid number if not show error and ask question again
	if(is_numeric ($temp)){
		//convert temperature based on the radio button units
		switch ($_POST['Units']){
			case 'c':
				echo '<p>Celsius: ' . number_format($temp, 2) . '</p>';
				echo '<p>Fahrenheit: ' . number_format($FfromC, 2) . '</p>';
				echo '<p>Kelvin: ' . number_format($KfromC, 2) . '</p>';
				break;
			case 'f':
				echo '<p>Celsius: ' . number_format($CfromF, 2) . '</p>';
				echo '<p>Fahrenheit: ' . number_format($temp, 2) . '</p>';
				echo '<p>Kelvin: ' . number_format($KfromF, 2) . '</p>';
				break;
			case 'k':
				echo '<p>Celsius: ' . number_format($CfromK, 2) . '</p>';
				echo '<p>Fahrenheit: ' . number_format($FfromK, 2) . '</p>';
				echo '<p>Kelvin: ' . number_format($temp, 2) . '</p>';
				break;
		}

	}else{
		echo '<p>Invalid entry, Try again.</p>';
	}

}
