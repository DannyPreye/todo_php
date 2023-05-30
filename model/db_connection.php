<?php

require_once("../utils/index.php");


class Connect_Database{
    private $password;
    private $dbname;
    private $server_name;
    private $username;
    public $tableName;
    private $conn;

    function __construct($server_name, $dbname, $username, $password){
        $this->dbname = $dbname;
        $this->server_name = $server_name;
        $this->password = $password;
        $this->username = $username;

    // This will connect to the database
        try{
            // Connect to the database
            $this->conn = new PDO("mysql:host=$this->server_name;dbname=$this->dbname",
         $this->username, $this->password);

        //  set the exception string
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $error){
            echo "Connection Failed " .$error->getMessage();
        }
    }


    function create_user_table(){
       try{
             
            $sqlUserQuery = "
            CREATE TABLE IF NOT EXISTS users (
                id INT(100) PRIMARY KEY AUTO_INCREMENT,
                username VARCHAR(20) UNIQUE NOT NULL,
                email VARCHAR(40) UNIQUE NOT NULL,
                password VARCHAR(100) NOT NULL
            )
        ";

            $this->conn->exec($sqlUserQuery);

       

            $sqlTodoQuery = "
             CREATE TABLE IF NOT EXISTS todo (
                id INT(100) PRIMARY KEY AUTO_INCREMENT,
      			userId INT NOT NULL,
                title VARCHAR(100) NOT NULL,
                content VARCHAR(200) NOT NULL,
                completed BOOLEAN DEFAULT FALSE,
                created_date DATE,
      			FOREIGN KEY (userID) REFERENCES users(id)
            )
            
            ";

            $this->conn->exec($sqlTodoQuery);

       }catch(PDOException $error){

        echo "Table could not be created ".$error->getMessage() .$error->getLine();

       }
    }

    function register_user($email,$password,$username){

        $hashPassword = hash_password($password);

      try{
          $statement = $this->conn->prepare("
            INSERT INTO users(username, email, password) VALUES(:username, :email, :password)
        ");

        $statement->bindParam(":username", $username);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $hashPassword);

            $result = $statement->execute();
            return $result;

      }catch(PDOException $error){
            echo "Something went wrong " . $error->getMessage();
      }
    }

    function login_user($username_or_email, $password){
        try {
            //code...

            $check_password_statement = $this->conn->prepare("
                SELECT password FROM users Where username = '$username_or_email' OR email='$username_or_email'
            ");
            $check_password_statement->execute();
            
            $checkUser= $check_password_statement->fetch();

            $existing_password = $checkUser['password'];

            echo $username_or_email;


            if(verify_password($password, $existing_password)){
                $get_user_information = $this->conn->prepare("
                    SELECT username, email,id FROM users Where email = '$username_or_email' OR username='$username_or_email'
                ");

                $get_user_information->execute();

                $user_data = $get_user_information->fetch();
                
                return $user_data;
            }else{
                return false;
            }


        } catch (PDOException $error) {
            echo "Something went wrong " . $error->getMessage();
        }
    }

    function forgot_password($username_or_email){
        try {
           
             $check_user = $this->conn->prepare("
                SELECT password FROM users Where username = '$username_or_email' OR email='$username_or_email'
            ");
            $result = $check_user->execute();

            if($result){
                return true;
            }else{
                return false;
            }

        } catch (PDOException $error) {
            echo "Something went wrong " . $error->getMessage();
        }
    }

    

    function add_todo($userId,$title, $content, ){
        $date_created = date("y-m-d");
        try {
            //code...
            $statement = $this->conn->prepare("
                INSERT INTO todo(userId, title, content, created_date) VALUES(:user, :title, :content, :created_date)
            ");

            $statement->bindParam(":user", $userId);
            $statement->bindParam(":content", $content);
            $statement->bindParam(":title", $title);
            $statement->bindParam(':created_date', $date_created);

            $result = $statement->execute();
            if($result){
                return true;
            }
        } catch (PDOException $err) {
            //throw $th;

            echo "Something went wrong " . $err->getMessage();
        }
    }

    function update_todo($todoId,$userId, $content, $completed){
        try {

            $statemtnt = $this->conn->prepare("
                UPDATE todo set content=$content, completed=$completed
                WHERE id=$todoId && user=$userId
            ");

            $result = $statemtnt->execute();

        } catch (PDOException $err) {
            //throw $th;
            echo "Something went wrong" . $err->getMessage();
        }
    }

    function get_single_todo($todoId, $userId){
        try {
            //code...
            $statement = $this->conn->prepare("
                SELECT content, completed, created_date FROM todo WHERE id=$todoId && user=$userId
            ");

            $statement->execute();

        } catch (PDOException $err) {
            //throw $th;

            echo "Something went wrong " . $err->getMessage();
        }
    }

    function get_all_todo($userId){
        try {
            //code...
            $statement = $this->conn->prepare("
                SELECT completed, content, title, id FROM todo WHERE userId= $userId ORDER BY created_date ASC
            ");
            $result = $statement->execute();
            if($result){
                return $statement->fetchAll();
            }
        } catch (PDOException $err) {
            //throw $th;

            echo "Something went wrong " . $err->getMessage();
        }
    }

    function delete_todo($todoId, $userId){
        try {
            //code...
            $statement = $this->conn->prepare("
                DELETE FROM todo WHERE id=$todoId && user=$userId
            ");
            $statement->execute();
        } catch (PDOException $err) {
            //throw $th;
            echo "Something went wrong " . $err->getMessage();
        }
    }

    function __destruct(){
        $this->conn = null;
    }

}