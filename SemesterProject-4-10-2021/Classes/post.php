<?php
 class Post{
     private $error = "";
     public function create_post($userid,$data){
         if(!empty($data['post_text'])){
            $post = addslashes($data['post_text']);
            $postid = $this->create_postid();
            
            $query = "insert into posts (userid,postid,post) values ('$userid','$postid','$post')";
            $DB = new Database();
            $DB->save($query);
        }
         elseif(empty($data['post_text'])){
            $this->error = "Please submit a valid post.";
         }
         return $this->error;
     }
     public function get_posts($id){
        $query = "select * from posts where userid = '$id' order by id asc";//order by latest posts on top
        $DB = new Database();
        $result = $DB->read($query);

        if($result){
            return $result;
        }
        else{
            return false;
        }
     }
    
     public function create_postid(){
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