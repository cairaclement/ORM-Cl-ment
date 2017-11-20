<?php

namespace connect;

class connect
{
    protected $db;

    private $user = "root";
    private $pass ="";
    private $host = "127.0.0.1";
    private $dbname = "world";

    public function __construct ()
    {
         $connexion = null;

        $connexion = new \PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass);
        $this->db = $connexion;
    }
    public function getConnection(){
        return $this->db;
    }

}