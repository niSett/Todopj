<?php  

$todoName = $_POST['todo_name'] ?? '';
$todoName = trim($todoName);

if($todoName) {
	//validate json file exist
	if(file_exists('todo.json')) {
		$json = file_get_contents('todo.json')
		$jsonArray = json_decode($json, true);
	} else {
		$jsonArray = [];
	}
	
	//enter element in the our json file 
	$jsonArray[$todoName] = ['completed' => false];
	file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT));

//file_put_content('todo.json');
}

//take optional header for enter the user on index page
header('Location: index.php');

?>