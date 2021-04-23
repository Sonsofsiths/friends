<?php
class Login{
    private $error = "";
    public function evaluate($data){
        //addslashes escapes special characters/helps secure website
        $username = addslashes($data['username']);
        $password = addslashes($data['password']);
        
        $query = "select * from users where username = '$username' limit 1";
        
        $DB = new Database();
        $result = $DB -> read($query);

        if($result){
            //assigns first row from result to row
            $row = $result[0];

            if($password == $row['password']){
                //create session data
                $_SESSION['sharespace_id'] = $row['id'];
            }
            else{
                $this->error .= "Wrong password.<br>";
            }
        }
        else{
            $this->error .= "No email was found.<br>";
        }
        return $this->error;
        
    }
    public function check_login($id){
        if(is_numeric($id)){
            $query = "select * from users where id = '$id' limit 1";
            
            $DB = new Database();
            $result = $DB -> read($query);

            if($result){
                $user_data = $result[0];
                return $user_data;
            }
            else{
                header("Location: login.php");
                die;
            }
    }
    else{
        header("Location: login.php");
        die;
    }
        }
                    
}
?>