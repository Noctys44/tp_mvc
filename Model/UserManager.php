<?php

require_once('User.php');

class UserManager
{
    private $dataBase;

    public function __construct(PDO $dataBase)
        {
            $this->dataBase = $dataBase;
        }

    public function insertUser(User $user)
    {
        $req = $this->dataBase->prepare("INSERT INTO membre(nom, prenom, tel, email) VALUES(:nom, :prenom, :tel, :email)");
        $req->bindValue(':nom',$user->getNom(), PDO::PARAM_STR); 
        $req->bindValue(':prenom',$user->getPrenom()); 
        $req->bindValue(':tel',$user->getTel());
        $req->bindValue(':email',$user->getEmail());
        $req->execute();       
    }

    public function getAllUsers()
    {
        $getUsers = $this->dataBase->query("SELECT * FROM membre ORDER BY nom ASC");
        return $getUsers;
    }

    public function getUserById($id)
    {
        $getId = $this->dataBase;
        $idUser = $getId->query("SELECT * FROM membre WHERE id_membre = $id");
    }

    public function updateUser()
    {
        $updateUser = $this->dataBase;
        if($_POST)
        {
            $reqUpdate = $updateUser->query("UPDATE membre SET nom = '$_POST[nom]', prenom = '$_POST[prenom]', tel = '$_POST[tel]', email = '$_POST[email]'");
        }
    }

    public function deleteUser()
    {
        if($_GET['action'] = "delete")
        {
            $deleteUser = $this->dataBase;
            $del = $deleteUser->query("DELETE FROM membre WHERE id = '$_GET[id_membre]'");
        }
    }
}