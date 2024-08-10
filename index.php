<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Renewal Customers</h2>
        <a class="btn btn-success" href="/php_crud_project/mycustomers/create.php" role="button">New Customer</a>
        <br><br>

        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Company Name</td>
                    <td>Contact Person</td>
                    <td>Phone</td>
                    <td>Website Plan</td>
                    <td>Renew Year</td>
                    <td>Annual Fees</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $databasename = "mycustomer";

                    $connection = new mysqli($servername, $username, $password, $databasename);

                    if($connection->connect_error){
                        die("Connection Failed" . $connection->connect_error);
                    }

                    $sql = "SELECT * FROM customers";
                    $result = $connection->query($sql);

                    if(!$result){
                        die("Invaild query" . $connection->connect_error);
                    }
                    while($row = $result->fetch_assoc()){
                        echo"
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[company_name]</td>
                                <td>$row[contact_person]</td>
                                <td>$row[phone]</td>
                                <td>$row[plan]</td>
                                <td>$row[renew_year]</td>
                                <td>$row[annual_fees]</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='/php_crud_project/mycustomers/edit.php?id=$row[id]'>Edit</a>
                                    <a class='btn btn-danger btn-sm' href='/php_crud_project/mycustomers/delete.php?id=$row[id]'>Delete</a>
                                    
                                </td>
                            </tr>
                        ";
                
                        }
                ?>
                
                
            </tbody>
        </table>

    </div>
</body>
</html>