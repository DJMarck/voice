<?php 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	
$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	//$text = $json->queryResult->parameters->product;	
	$text =  $json->results->metadata->addtolist;
	
	$.ajax({
          type: "GET",
          url: 'https://hooks.zapier.com/hooks/catch/1737846/c2eid5/?text=KAAS',
          success: function(data){
            //alert(data);
          }
       });
	
	
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
	$speech = $text;
	
	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
