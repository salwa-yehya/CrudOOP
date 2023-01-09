<?php 
/* DATABASE CONNECTION */
class Model{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'CRUD';
    private $conn ;
    
    function __construct(){
        $this->conn = new mysqli($this->servername ,$this->username ,$this->password,$this->dbname );
        if($this->conn->connect_error){
            echo 'Connection Failed';
        }else{
          return $this->conn;
        }
    }//constructor close

    /*fuction definefor insert records*/
    public function insertRecord($post){
    $name = $post['name'];
    $email = $post['email'];
    $sql ="INSERT INTO users(name,email)VALUES('$name','$email')";
    $result = $this->conn->query($sql);
     if($result){
        header('location:index.php?msg=ins');
     }else{
        echo "Error".$sql."<br>".$this->conn->error;
     }
    }//insert record function close 
    
    public function displayRecord(){
    $sql ="SELECT * From users  ";
    $result = $this->conn->query($sql);
    if($result->num_rows>0){
        while($row =$result-> fetch_assoc()){
           $data[]=$row ;
        }//while close 
        return $data;
    }// if close 
    }//displayRecord close

}//class close



?>