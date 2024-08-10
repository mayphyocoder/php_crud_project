<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "mycustomer";

$connection = new mysqli($servername, $username, $password, $databasename);


$company_name = "";
$contact_person = "";
$phone = "";
$plan = "";
$renew_year = "";
$annual_fees = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $company_name = $_POST["company_name"];
    $contact_person = $_POST["contact_person"];
    $phone = $_POST["phone"];
    $plan = $_POST["plan"];
    $renew_year = $_POST["renew_year"];
    $annual_fees = $_POST["annual_fees"];
}
do {
    if (empty($company_name) || empty($contact_person) || empty($phone) || empty($plan) || empty($renew_year) || empty($annual_fees)) {
        $errorMessage = "All the fields are required";
        break;
    }

    $sql = "INSERT INTO customers(company_name, contact_person, phone, plan, renew_year, annual_fees)" . "VALUES('$company_name', '$contact_person', '$phone', '$plan', '$renew_year', '$annual_fees')";
    $result = $connection->query($sql);

    if (!$result) {
        $errorMessage = "Invaid Query" . $connection->error;
        break;
    }

    $company_name = "";
    $contact_person = "";
    $phone = "";
    $plan = "";
    $renew_year = "";
    $annual_fees = "";

    $successMessage = "Customers add currently";
    
    header("location: /php_crud_project/mycustomers/index.php");
    exit; 

    
} while (true);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Customers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <hr>
        <?php
        if (!empty($errorMessage)) {
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong> 
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                    </button>
                </div>
                
                ";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Company Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="company_name" value="<?php echo $company_name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact Person</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="contact_person" value="<?php echo $contact_person;?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Website Plan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="plan" value="<?php echo $plan;?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Renewal Year</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="renew_year" value="<?php echo $renew_year;?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Annual Fees</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="annual_fees" value="<?php echo $annual_fees;?>">
                </div>
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
                    <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong> 
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                        </button>
                    </div>
                    </div>
                    </div>
                    
                    ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/php_crud_project/mycustomers/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>