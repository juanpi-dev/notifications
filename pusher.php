<?php
  require __DIR__ . '/vendor/autoload.php';
  include(__DIR__ . '/credentials/pusher.php');
  include(__DIR__ . '/credentials/database.php');

  $data['message'] = 'Message received';
  $data['data'] = $_REQUEST;
  $pusher->trigger('my-channel', 'my-event', $data);

  if(isset($link)){
    $query = "INSERT INTO notifications (`datetime`, `data`, `status`)
		VALUES (NOW(), '" . json_encode($data) . "','1')";
    $result = mysqli_query($link, $query);
  }
?>

