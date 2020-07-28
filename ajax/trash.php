<?php
session_start();
if($_SERVER['REQUEST_METHOD'] ==="POST")
{
    $id=(int) $_POST["id"];
    
    if(isset($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $key=>$value)
        {
            if($key==$id)
            {
                unset($_SESSION["cart"][$key]);
            }
        }
}
    else {
        echo false;
    }

    echo true;
}
?>