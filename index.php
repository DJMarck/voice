<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	//$text = $json->	->parameters->text;
/*
	switch ($text) {
		case 'Kaas':
			$speech = "Kaas is toegevoegd";
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}
*/
	//$speech = "Kaas is toegevoegd";
	
	$response = new \stdClass();
	$response->speech = "Kaas is toegevoegd";
	$response->displayText = "Kaas is toegevoegd";
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
