<?php

class UserMapper{

    private static $usertype;

    public static function validateLogin($postdata){
        $dba = new PDOAgent("mysql",DBUSER,DBPASSWORD,"localhost",DB);  
        $dba->connect();
        
        $example = $_POST['textfield'];
        $example = strip_tags($example);
        $example = mysql_real_escape_string($example);
        
        
        
        $username = $postdata['username'];
        $username = strip_tags($username);
        $username =  mysql_real_escape_string($username);
        
        $password = $postdata['password'];
        $password = strip_tags($password);
        $password =  mysql_real_escape_string($password);
        
        
        //Setup the query()
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
         //Setup the bind parameters
        $bindParams = ['username' => $username, 'password' => $password];
       
        //Pull the result
        $result = $dba->query($query, $bindParams);

        return $result;
    }

    //Check if a user already exisits in our database
    public static function checkUser($postdata){

        $dba = new PDOAgent("mysql",DBUSER,DBPASSWORD,"localhost",DB);    
        $dba->connect();
        //Setup the query()
        $query = "SELECT * FROM users WHERE username = :username";

        //Setup the bind parameters
        $bindParams = ['username' => $postdata['username']];
        //Pull the resultset
        $result = $dba->query($query, $bindParams);
        $dba->disconnect();      
        if ($result){
            //Return true
            return true;
        } else {
            //Return false if the user was not logged in.
            return false;
        }
    }

    public static function insertUser($postdata){
        $dba = new PDOAgent("mysql",DBUSER,DBPASSWORD,"localhost",DB);    
        //Setup the query()
        $dba->connect();

        $query = "INSERT INTO users (username, password, type) 
        VALUES (:username, :password, :type )";

        $query2 = "INSERT INTO manufacturers (admin, mname, mdescription) 
        VALUES (:admin, :mname, :mdescription)";
        
        $username = $postdata['username'];
        $username = strip_tags($username);
        $username =  mysql_real_escape_string($username);
        
        $password = $postdata['password'];
        $password = strip_tags($password);
        $password =  mysql_real_escape_string($password);
        

        //Setup the bind parameters
        $bindParams = ['username' => $username,'password'=>$password, 'type'=>$postdata['type']];
        //Pull the resultset
        $bindParams2 = ['admin' => $username,'mname'=>$postdata['mname'], 'mdescription'=>$postdata['mdescription']];

        var_dump($bindParams2);
        $result = $dba->query($query, $bindParams);
        $result2 = $dba->query($query2, $bindParams2);   

        $dba->disconnect();
        
        //will return false if no user was added
        if ($dba->rowcount != 1)  {
            trigger_error("Something when horribly wrong!");
            return false;
            die();
           
        } else {
            echo ("<h3>User created with success</h3>");
            return true;
        }
    }
}



?>
