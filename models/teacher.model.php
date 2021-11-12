<?php

class TeacherModel{
    public $teacherId;
    public $username;
    public $password;
    public $name;
    public $gender;
    public $birthday;
    public $phone;
    public $courseId;

    public function __construct(
        $teacherId, 
        $username, 
        $password, 
        $name, 
        $gender, 
        $birthday,
        $phone, 
        $courseId
    ){
        $this->teacherId= $teacherId;
        $this->username= $username;
        $this->password= $password;
        $this->name= $name;
        $this->gender= $gender;
        $this->birthday= $birthday;
        $this->phone= $phone;
        $this->courseId= $courseId;
    }
}