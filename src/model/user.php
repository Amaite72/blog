<?php

namespace Model;

class User{

    public string $lname;
    public string $fname;
    public string $username;
    public string $email;   
    private string $password;
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function addUser(string $lname, string $fname, string $username, string $email, string $password){
   
        $statement = $this->pdo->prepare('INSERT INTO users(lname, fname, username, email, `password`)
                                             VALUES(:lname, :fname, :username, :email, :password)');
        
        $statement->execute([
                      'lname' => $lname, 
                      'fname' => $fname, 
                      'username' => $username, 
                      'email' => $email, 
                      'password' => $password]);
        
    }



} 