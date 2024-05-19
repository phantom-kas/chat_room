<?php
header('Content-Type: application/json; charset=utf-8');

require_once '../commons/mysql.php';
if (!isset($_GET['route'])) {
  echo json_encode(['message' => 'unkown request', 'status' => 'error'], true);
  die();
}
$route = $_GET['route'];

if ($route == 'sendmessage') {
  $data = $_POST;
  if (!isset($data['uid'])) {
    echo json_encode(['message' => 'User id not sepcified', 'status' => 'error'], true);
    die();
  }
  if (!isset($data['room_id'])) {
    echo json_encode(['message' => 'Room_id  not sepcified', 'status' => 'error'], true);
    die();
  }

  $res = $Db->query("INSERT INTO room_messages ( from_user, room_id, messages)
 VALUES (?,?,?)", [$data['uid'], $data['room_id'], $data['message']])->lastId();
  if ($res) {
    echo json_encode(['message' => 'success', 'status' => 'success', 'data' => $res], true);
    die();
  }
  echo json_encode(['message' => 'Unknown error', 'status' => 'error'], true);
  die();
} else {
  echo json_encode(['message' => 'unkown request', 'status' => 'error'], true);
  die();
}
