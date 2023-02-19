<?php

namespace Model;

class User{

    public string $lname;
    public string $fname;
    public string $username;
    public string $email;   
    private string $password;

    public function addUser(string $lname, string $fname, string $username, string $email, string $password){

        $database = dbConnect();
   
        $statement = $database->prepare('INSERT INTO users(lname, fname, username, email, `password`)
                                             VALUES(:lname, :fname, :username, :email, :password)');

        $statement->execute([
                      'lname' => $lname, 
                      'fname' => $fname, 
                      'username' => $username, 
                      'email' => $email, 
                      'password' => $password]);
    }



} 