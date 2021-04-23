<?php
 class User{
     public function get_data($id){
        $query = "select * from users where id = '$id' limit 1";
        $DB = new Database();
        $result = $DB->read($query);

        if($result){
            $row = $result[0];
            return $row;
        }
        else{
            return false;
        }
     }
     public function get_user($id){
         $query = "select * from users where id = '$id' limit 1";
         $DB = new Database();
         $result = $DB->read($query);

         if($result){
             return $result;
         }
         else{
             return false;
         }
     }
     public function get_username($username){
        $query = "select username from users where username = '$username'";
        $DB = new Database();
        $result_username = $DB->read($query);

        if($result_username){
            return $result_username;
        }
        else{
            return false;
        }
     }
 }
?>