<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']); // Parse URL to remove special chars
$pathParts = pathInfo($phpSelf); // Breaks URL into array then grabs just the filename

// No blank lines here?
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
        <title>Liquid Gold</title>
        <meta name="author" content="James Castner">
        <meta name="description" content="An informational website about the history and process behind maple syrup">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/x-icon" href="../images/PineTreeIcon.png">
		
		<!-- Links for fonts and things --> 
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gloock&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/custom.css?version=<?php print time(); ?>">
		<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/custom-tablet.css?version=<?php print time(); ?>">
		<link rel="stylesheet" type="text/css" media="(max-width: 600px)" href="css/custom-phone.css?version=<?php print time(); ?>">
	</head>

    <?php
    print '<!-- ************ Start of body ************ -->';
    print '<body class="' . $pathParts['filename'] . '">';

    include 'connect-DB.php';
    print PHP_EOL;
    include 'header.php';
    print PHP_EOL;
    include 'nav.php';
    ?>