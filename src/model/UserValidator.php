<?php

namespace Model;

use App\Validator;

class UserValidator extends Validator{

    /*
    * verified data form
    * return array || bool
    *
    */
    public function validates(array $data)
    {
        parent::validates($data);
        $this->validate('fname','minLenght', 3);
        $this->validate('lname','minLenght', 3);
        $this->validate('password','minLenght', 8);
        $this->validate('passwordConfirm','minLenght', 8);
        return $this->errors;
    }

}