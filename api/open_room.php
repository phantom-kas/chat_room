<?php
header('Content-Type: application/json; charset=utf-8');
require_once '../commons/mysql.php';
$uid = $_POST['user_id'];
$role = $Db->query("SELECT role from users where id = ? ",[$uid])->getRows()[0]['role'];

if(count($Db->query("SELECT id from rooms where id = ? and created_by = ?",[$_POST['id'],$uid])->getRows()) < 1){

  if($role != 'admin' || $role == 'superadmin'){
    echo json_encode(['message' => 'Access denied', 'status' => 'error'], true);
    die();
  }
}

$num_aff = $Db->query("UPDATE rooms set isclosed = 0 where id = ?",[$_POST['id']])->numAffectedRows();
if($num_aff ){
  echo json_encode(['message' => 'Room opened successfully', 'status' => 'success'], true);
  die();
}
echo json_encode(['message' => 'open Error', 'status' => 'error'], true);
die()
;
?>