<?php
//gp3Temperature.php
define('THIS_PAGE', basename($_SERVER['PHP_SELF'])); //figure out the name of the current page

	$temp = $_POST['Temperature'];
	$FfromC = ($temp*1.8+32);
	$KfromC = ($temp+273.15);
	$KfromF = (($temp+459.67)*5/9);
	$CfromF = (($temp-32)/1.8);
	$CfromK = ($temp-273.15);
	$FfromK = (($temp*9/5) - 459.67);
	
	echo '
        <link rel="stylesheet" href="styles.css">
        <form action="' 
		. THIS_PAGE . 
		'" method="post">
        
        <h1>Temperature Converter</h1>
        
        <body>
        <div>
		Enter Temperature: <input type="text" name="Temperature"><br><br>
		<p>Select Type:</p>
		<input type="radio" name="Units" value="c" checked>Celsius<br>
		<input type="radio" name="Units" value="f">Fahrenheit<br>
		<input type="radio" name="Units" value="k">Kelvin<br>
		<div id="button">
        <input type="submit"/>
		</div><br>
        </form>
        <div>
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
