<?php
class SignUp{
    private $error = "";
    public function evaluate($data){
        foreach($data as $key => $value){
            if(empty($value)){
               $this-> error .= $key . " is empty. Please fill out the form completely.<br>";
            }
            if($key == "email"){
               if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)){
                $this-> error .= $key . " is invalid. Please enter a valid email.";
               } 
             }
        }
        if($this->error == ""){
            //no error so create user
            $this->create_user($data);
        }
        else{
            return $this->error;
        }
    }
    public function create_user($data){
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password_1'];
        //create these
        $id = $this->create_id();

        $query = "insert into users (id, username, email, password) values ('$id', '$username', '$email', '$password')";
        
        $DB = new Database();
        $DB -> save($query);
    }
    private function create_id(){
        $length = rand(4,11);
        $number = "";
        for($i=0;$i < $length; $i++){
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }
    }
?>