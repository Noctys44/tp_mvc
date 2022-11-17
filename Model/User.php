<?php

class User 
{
    private $id, $nom, $prenom, $tel, $email, $erreurs = [];

    const NOM_INVALIDE = 1; 
    const PRENOM_INVALIDE = 2; 
    const EMAIL_INVALIDE = 3; 
    const TEL_INVALIDE = 4;

    public function __construct($data)
    {
        if(!empty($data))
        {
            $this->assignement($data);
        }
    }

    public function assignement($data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    // SETTERS
    public function setNom($n)
    {
        if(empty($n) || !is_string($n)){
            $this->erreur[] = self::NOM_INVALIDE;
        } else {
            $this->nom = $n;
        }
    }

    public function setPrenom($p)
    {
        if(empty($p) || !is_string($p)){
            $this->erreur[] = self::PRENOM_INVALIDE;
        } else {
            $this->prenom = $p;
        }
    }

    public function setTel($t)
    {
        if(empty($t) || !is_string($t)){
            $this->erreur[] = self::TEL_INVALIDE;
        } else {
            $this->tel = $t;
        }
    }

    public function setEmail($e)
    {
        if(!filter_var($e, FILTER_VALIDATE_EMAIL)){
            $this->erreur[] = self::EMAIL_INVALIDE;
        } else {
            $this->email = $e;
        }
    }

    public function setErreurs($erreurs)
    {
        $this->erreurs = $erreurs;
        return $this;
    }

    // GETTERS
    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getErreurs()
    {
        return $this->erreurs;
    }

    public function isUserValid()
    {
        return !(empty($this->nom) || empty($this->prenom) || empty($this->email));
    }
}