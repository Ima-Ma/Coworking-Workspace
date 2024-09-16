<?php
$conn = new mysqli ('localhost' , 'root' , '' , 'aptech_project');

if(!$conn == true){
    echo "<br> CONNECTION SUCCESSFUL!";
}
?>