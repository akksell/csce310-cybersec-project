<?php

use App\Entities\UserEntity;

function sessionUser() {
  $db = db_connect();
  $session = session();
  $id = $session->get('UIN');
  if (!$id) {
    return null;
  }

  $user = new UserEntity();
  $sql = <<<SQL
    SELECT * 
      FROM user
      WHERE UIN = "$id";
  SQL;
  $query = $db->query($sql);
  $result = $query->getRowArray();
  return empty($result) ? null : (new UserEntity())->fill($result);
}