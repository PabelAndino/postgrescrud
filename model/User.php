<?php
require '../app/config.php';

Class User {
    public function __construct()
    {
    }

    public function showList(){
        $sql = "select * from users";
        return executeQuery($sql);
    }

    public function saveUser($names,$description){
        $sql = "INSERT INTO users(name,description,state) VALUES ('$names','$description','Activado')";

        return executeQuery($sql);

    }
    public function editUser($iduser,$name,$description){
        $sql ="UPDATE users SET name='$name',description='$description' WHERE iduser = '$iduser'";
        return executeQuery($sql);
    }
    public function deleteUser($iduser){
        $sql = "UPDATE users SET state = 'Desactivado' WHERE iduser = '$iduser' ";
        return executeQuery($sql);
    }

    public function restoreUser($iduser){
        $sql = "UPDATE users SET state = 'Activado' WHERE iduser = '$iduser'";
        return executeQuery($sql);
    }
}
