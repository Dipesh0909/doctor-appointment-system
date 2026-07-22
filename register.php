<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php

include "config/database.php";

if (isset($_POST['register'])) {

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    // Hash the password for security
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($_POST['password'] != $confirm_password) {

        echo "<script>alert('Passwords do not match!');</script>";

    } else {

        $sql = "INSERT INTO patients
        (full_name, email, password, phone, gender, date_of_birth, address)
        VALUES
        ('$full_name', '$email', '$password', '$phone', '$gender', '$dob', '$address')";

        if(mysqli_query($conn, $sql)){

            echo "<script>alert('Registration Successful!');</script>";

        }else{

            echo "<script>alert('Something went wrong!');</script>";

        }

    }

}
?>

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h3 class="text-center">Patient Registration</h3>
                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Gender</label>

                            <select name="gender" class="form-select">

                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>

                            </select>

                        </div>

                        <div class="mb-3">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100" name="register">
                            Register
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include "includes/footer.php"; ?>