<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "mycustomer";

        $connection = new mysqli($servername, $username, $password, $databasename);
        $sql = "DELETE FROM customers WHERE id = $id";
        $connection->query($sql);
    }
        header("location: /php_crud_project/mycustomers/index.php");
        exit;

?>