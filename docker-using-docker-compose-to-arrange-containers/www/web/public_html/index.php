<?
    $mysqli = new mysqli("djc8mysql", "root", "djc8learndocker", "djc8db");
    $sql = "SELECT * FROM djc8learndocker";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
 
    $redis = new Redis();  
    $redis->connect('djc8redis', 6379);
    //$redis->auth('mypassword');
    if(!$redis->exists("index.php")){
        $redis ->set( "index.php" , 'this page by '.$row["author"].' | '.$row["mail"].' use redis');   
    }
    echo $redis ->get( "index.php");
     $result->free();  
     $mysqli->close(); 