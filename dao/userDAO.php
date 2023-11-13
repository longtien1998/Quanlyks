<?php 
function getAllUser() {
    $sql = "SELECT * FROM user";
    $data = getData($sql);
    return $data;
}

function getUserById($id) {
    $sql = "SELECT * FROM user WHERE id=:id";
    $data = getDataWidthParams($sql, ["id"=>$id]);
    return $data;
}

function getUserByName($name) {
    $sql = "SELECT * FROM user WHERE name=:name";
    $data = getDataWidthParams($sql, ["name"=>$name]);
    return $data;
}

function deleteUser($id) {
    $sql = "DELETE FROM user WHERE id=:id";
    $data = executeCUD($sql, ["id"=>$id]);
    var_dump($data);
}

?>