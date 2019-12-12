<?php
  include_once('../database/db_chat.php');
  // Current time
  $timestamp = time();

  // Get last_id
  $last_id = $_GET['last_id'];
  

  if (isset($_GET['recetor']) && isset($_GET['text'])) {
    // GET username and text
    $recetor = $_GET['recetor'];
    $remetente= $_GET['remetente'];
    $text = $_GET['text'];

    sendMessage($recetor,$remetente,$date,$text);
  }

  // Retrieve new messages
  $messages= getNewMessages($last_id,$remetente,$recetor);

  // In order to get the most recent messages we have to reverse twice
  $messages = array_reverse($messages);

  // Add a time field to each message
  foreach ($messages as $index => $message) {
    $time = date('h:i:s', $message['date']);
    $messages[$index]['time'] = $time;
  }

  // JSON encode
  echo json_encode($messages);
?>
