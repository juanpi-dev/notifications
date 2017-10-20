<?php
  require __DIR__ . '/vendor/autoload.php';
  include(__DIR__ . '/credentials/pusher.php');
  include(__DIR__ . '/credentials/database.php');

  $client = new MongoDB\Client("mongodb://localhost:27017");
  $collection = $client->tests->torrents;


  $data['data'] = $_REQUEST;
  $pusher->trigger('my-channel', 'my-event', $data);

  if(isset($link)){
    $query = "INSERT INTO notifications (`datetime`, `data`, `status`)
		VALUES (NOW(), '" . json_encode($data) . "','1')";
    $result = mysqli_query($link, $query);
  }

//  $data['timestamp'] = array("$date" => time());
  //$data['timestamp'] = (new DateTime())->format('Y-m-d H:i:s');
  $result = $collection->insertOne($data);

  echo "Inserted with Object ID '{$result->getInsertedId()}'";

?>

