<?php

namespace App;

class Validator{


    private $data;
    protected $errors = [];
    
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }
    /*
    * verified data form
    * return array || bool
    *
    */
    public function validates(array $data)
    {
        $this->errors = [];
        $this->data = $data;
        return $this->errors;
    }
    /*
    * verified field of data
    * return bool
    *
    */
    public function validate(string $field, string $method, ...$parameters):bool
    {
        if(!isset($this->data[$field])){
            $this->errors[$field] = 'Le champ '.$field.' n\'est pas rempli';
            return false;
        }else{
            return call_user_func([$this, $method], $field, ...$parameters);
        }
    }
    /*
    * verified min lenght of field form
    * return bool
    *
    */
    public function minLenght(string $field, int $lenght):bool
    {
        if(mb_strlen($field) < $lenght){
            $this->errors[$field] = 'Le champ doit avoir plus de '.$lenght.' caractères';
            return false;
        }
        return true;
    }

}