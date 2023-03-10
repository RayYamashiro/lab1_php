<?php


require_once 'vendor/autoload.php';

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Validation;

class User
{

    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public DateTime  $userCreateDateTime;
    public function __construct($id, $name, $email, $password, $userCreateDateTime)
    {
        $tempFlag = true;

        //ID
        $validator = Validation::createValidator();
        $validID = $validator->validate($id, [
            new Positive(), new NotBlank(),
        ]);
        if (count($validID) !== 0)
        {
            $tempFlag = false;
            foreach ($validID as $value)
                echo $value->getMessage(). "error in ID\n";
        }

        //Name
        $validator = Validation::createValidator();
        $validName = $validator->validate($name, [
             new NotBlank(), new Length(["min" =>1 , "max"=>50 ]) , new Regex("/^[A-Z]{1}[a-z]{0,}$/"),
        ]);
        if (count($validName) !== 0)
        {
            $tempFlag = false;
            foreach ($validName as $value)
                echo $value->getMessage(). "error in Name\n";
        }

        //Email
        $validator = Validation::createValidator();
        $validEmail = $validator->validate($email, [
            new NotBlank(), new Length(["min" =>5 , "max"=>100 ]) , new Regex("/^[a-zA-Z]{1,}[@]{1}[A-Z,a-z]{1,}[.]{1}[a-zA-Z]{1,}$/"),
        ]);
        if (count($validEmail) !== 0)
        {
            $tempFlag = false;
            foreach ($validEmail as $value)
                echo $value->getMessage(). "error in Email\n";
        }

        //Date
        $validator = Validation::createValidator();
        $validDate = $validator->validate($userCreateDateTime, [
            new NotBlank(),
        ]);
        if (count($validDate) !== 0)
        {
            $tempFlag = false;
            foreach ($validDate as $value)
                echo $value->getMessage(). "error in Date\n";
        }

        //Password
        $validator = Validation::createValidator();
        $validPass = $validator->validate($password, [
            new NotBlank(), new Length(['min' =>5 , 'max'=>50,
            "maxMessage"=> "Ваш пароль не должен превышать {{ limit }} символов", "minMessage"=> "Ваш пароль не должен быть меньше {{ limit }} символов_\n",
            ]) ,
        ]);
        if (count($validPass) !== 0)
        {
            $tempFlag = false;
            foreach ($validPass as $value)
                echo $value->getMessage(). "error in Password\n";
        }

        if($tempFlag) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->userCreateDateTime = $userCreateDateTime;
        }
    }
}

