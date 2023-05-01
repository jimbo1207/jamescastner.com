<?php include "top.php";
function getData($field)
{
	if (!isset($_POST[$field])) {
		$data = "";
	} else {
		$data = trim($_POST[$field]);
		$data = htmlspecialchars($data);
	}
	return $data;
}

function verifyAlphaNum($testString)
{
	// Check for letters, numbers and dash, period, space and single quote only.
	// added & ; and # as a single quote sanitized with html entities will have 
	// this in it bob's will be come bob's
	return (preg_match("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}


// Initialize vars
$errorMessage = '';
$message = '';
$dataIsGood = true;
$isSyrupHealthy = '';
$favoriteSyrupColor = array(0, 0, 0, 0);
$firstName = '';
$lastName = '';
$email = '';

if($_SERVER["REQUEST_METHOD"] == 'POST') {
	print PHP_EOL . '<!-- ************ Start Sanitization ************ -->' . PHP_EOL;
	$isSyrupHealthy = getData('radUnhealthySyrup');
	$favoriteSyrupColor = array((int)getData('chkGolden'), (int)getData('chkAmber'), (int)getData('chkDark'), (int)getData('chkVeryDark'));
	$firstName = getData('txtFirstName');
	$lastName = getData('txtLastName');
	$email = getData('txtEmail');

	print PHP_EOL . '<!-- ************ Start Validation ************ -->' . PHP_EOL;
	// Validate radio buttons
	if ($isSyrupHealthy == '') {
		$errorMessage .= '<p class="mistake">Decide if you think syrup is healthy or not</p>';
		$dataIsGood = false;
	} elseif ($isSyrupHealthy != 'yes' and $isSyrupHealthy != 'no' and $isSyrupHealthy != 'maybe') {
		$errorMessage .= '<p class="mistake">Tricky tricky, decide if you think syrup is healthy</p>';
		$dataIsGood = false;
	}

	// Make sure at least one box is checked
	$isABoxChecked = false;
	for ($i = 0; $i < count($favoriteSyrupColor); $i++) {
		if ($favoriteSyrupColor[$i] == 1) {
			$isABoxChecked = true;
			break;
		} else { // If not 1 only allowed to be a 0
			$favoriteSyrupColor[$i] == 0;
		}
	}
	if ($isABoxChecked == false) {
		$errorMessage .= '<p class="mistake">Make sure you choose at least one grade of syrup</p>';
		$dataIsGood = false;
	}

	// Validate first and last name
	if ($firstName == '') {
		$errorMessage .= '<p class="mistake">Enter a first name</p>';
		$dataIsGood = false;
	} elseif (!verifyAlphaNum($firstName)) {
		$errorMessage .= '<p class="mistake">First name contains invalid characters</p>';
		$dataIsGood = false;
	}

	if ($lastName == '') {
		$errorMessage .= '<p class="mistake">Enter a last name</p>';
		$dataIsGood = false;
	} elseif (!verifyAlphaNum($lastName)) {
		$errorMessage .= '<p class="mistake">Last name contains invalid characters</p>';
		$dataIsGood = false;
	}

	// Validate email
	if ($email == '') {
		$errorMessage .= '<p class="mistake">Please type in your email address.</p>';
		$dataIsGood = false;
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errorMessage .= '<p class="mistake">Your email address contains invalid characters</p>';
		$dataIsGood = false;
	}
	
	// If data is valid prepare the sql
	if ($dataIsGood) {
		print PHP_EOL . '<!-- ************ Start Saving ************ -->' . PHP_EOL;
		$sql = 'INSERT INTO `tblSyrupSurvey`(`fldUnhealthySyrup`, `fldGolden`, `fldAmber`, `fldDark`, `fldVeryDark`, `fldFirstName`, `fldLastName`, `fldEmail`) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$data = array($isSyrupHealthy, $favoriteSyrupColor[0], $favoriteSyrupColor[1], $favoriteSyrupColor[2], $favoriteSyrupColor[3], $firstName, $lastName, $email);
		
		try {
			$statement = $pdo->prepare($sql);
			if($statement->execute($data)) {
				$message .= '<h2>Thank you!</h2>';
				$message .= '<p>Your answers were recorded</p>';
			} else {
				$message .= '<p>Record was not successfully saved</p>';
			}
		} catch(PDOException $e) {
			$message .= '<p>Couldnt insert record. Please contact sys admin</p>';
			$message .= $e;
		} 
	}
}
?>
<!-- ************ Start of Main Content ************ -->
<main>
	<!-- Not sure exactly how this should be laid out... if you want the form in the sections below or whatnot 
				but Im going to just include it here -->
	<?php
	print $errorMessage;
	print $message;

	print '<p>Post Array:</p><pre>';
	print_r($_POST);
	print '</pre>'
	?>
	<section class="flex-container no-padding">
		<form action="#" method="POST">
			<fieldset>
				<legend>Is maple syrup unhealthy?</legend>
				<section class="input-wrapper">
					<p>
						<input type="radio" name="radUnhealthySyrup" id="yesUnhealthy" value="yes"
						<?php if($isSyrupHealthy == 'yes') print 'checked' ?> tabindex="0">
						<label for="yesUnhealthy">Yes</label><br>
					</p>
					<p>
						<input type="radio" name="radUnhealthySyrup" id="noUnhealthy" value="no"
						<?php if($isSyrupHealthy == 'no') print 'checked' ?> tabindex="1">
						<label for="noUnhealthy">No</label><br>
					</p>
					<p>
						<input type="radio" name="radUnhealthySyrup" id="maybeUnhealthy" value="maybe"
						<?php if($isSyrupHealthy == 'maybe') print 'checked' ?> tabindex="2">
						<label for="maybeUnhealthy">Maybe</label><br>
					</p>
				</section>
			</fieldset>
			<fieldset>
				<legend>Favorite grade(s) of Syrup</legend>
				<section class="flex-container">
					<figure class="small no-margin">
						<img alt="Different Grades of Syrup Image" src="../images/SyrupGrades.png">
						<figcaption>Different grades of syrup<br>
							<cite><a href="https://vermontmaple.org/how-maple-syrup-is-made">Photo Source</a></cite>
						</figcaption>
					</figure>
					<section class="input-wrapper">
						<p>
							<input type="checkbox" name="chkGolden" id="golden" value="1"
							<?php if($favoriteSyrupColor[0] == 1) print 'checked' ?> tabindex="3">
							<label class="golden" for="golden">Golden</label><br>
						</p>
						<p>
							<input type="checkbox" name="chkAmber" id="amber" value="1"
							<?php if($favoriteSyrupColor[1] == 1) print 'checked' ?> tabindex="4">
							<label class="amber" for="amber">Amber</label><br>
						</p>
						<p>
							<input type="checkbox" name="chkDark" id="dark" value="1"
							<?php if($favoriteSyrupColor[2] == 1) print 'checked' ?> tabindex="5">
							<label class="dark" for="dark">Dark</label><br>
						</p>
						<p>
							<input type="checkbox" name="chkVeryDark" id="vdark" value="1"
							<?php if($favoriteSyrupColor[3] == 1) print 'checked' ?> tabindex="6">
							<label class="very-dark" for="vdark">Very dark</label><br>
						</p>
					</section>
				</section>
			</fieldset>
			<fieldset>
				<legend>Contact Information</legend>
				<section class="input-wrapper">
					<p>
						<label for="txtFirstName">First Name:</label>
						<br>
						<input type="text" name="txtFirstName" id="txtFirstName"
						 value="<?php print $firstName; ?>" tabindex="7" maxlength="30" required>
					</p>
					<p>
						<label for="txtLastName">Last Name:</label>
						<br>
						<input type="text" name="txtLastName" id="txtLastName"
						 value="<?php print $lastName; ?>" tabindex="8" maxlength="30" required>
					</p>
					<p>
						<label for="txtEmail">Email:</label>
						<br>
						<input type="email" name="txtEmail" id="txtEmail" 
						value="<?php print $email; ?>" tabindex="9" maxlength="50" required>
					</p>
				</section>
			</fieldset>
			<fieldset>
				<p>
					<input type="submit">
				</p>
			</fieldset>
		</form>
	</section>
</main>

<?php include "footer.php"; ?>
</body>

</html>