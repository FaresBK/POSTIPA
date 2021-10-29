<?php
 header("Access-Control-Allow-Origin:*"); //  لتبادل المعلومات من مواقع مختلفة
 header("Content-Type:application/json;charset=UTF-8");
 header("Access-Control-Max-Age:3600");
 header("Access-Control-Allow-Headers:Content-type,Access-Control-Allow-Headers,Authorization,X-Requested-With");
 header("Access-Control-Allow-Methods:POST");

 $data=file_get_contents("php://input");
 $data=json_decode($data);
 if(isset($data->nom) && isset($data->prenom) && isset($data->age)){  
 $user="root";
 $password="";
 $database=new PDO("mysql:host=localhost;dbname=users;charset=utf8",$user,$password);
 $adduser=$database->prepare("INSERT INTO user1 (nom,prenom,age) VALUES (:name,:lastname,:date)");
 $adduser->bindParam("name",$data->nom);
 $adduser->bindParam("lastname",$data->prenom );
 $adduser->bindParam("date",$data->age);
 if($adduser->execute()){
    print_r(json_encode(["coract"=>"insert coracct"])); 
 }else{
     var_dump($adduser->errorInfo());
    print_r(json_encode(["errour"=>"eurrooor"])); 
 }
 }else{
    print_r(json_encode(["error"=>"eurror"]));
 }


 



?>