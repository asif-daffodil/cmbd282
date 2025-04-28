<?php
require_once './components/header.php';

if (!isset($_SESSION['iUserInfo'])) {
    header("Location: ./sign-in.php");
    exit();
}

$genderList = ["Male", "Female", "Others"];

$userId = $_SESSION['iUserInfo']->id;
$userInfo = $conn->query("SELECT * FROM `users` WHERE `id` = $userId")->fetch_object();

if (isset($_POST['updateProfile'])) {
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $gender = isset($_POST['gender']) ? sanitize($_POST['gender']) : null;
    $address = sanitize($_POST['address']);

    if (empty($name)) {
        $errName = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z. ]*$/", $name)) {
        $errName = "Only letters and white space allowed";
    } else {
        $crrName = $conn->real_escape_string($name);
    }

    if (empty($email)) {
        $errEmail = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email format";
    } else {
        $crrEmail = $conn->real_escape_string($email);
    }

    if (empty($gender)) {
        $errGender = "Please select your gender";
    } elseif (!in_array($gender, $genderList)) {
        $errGender = "Invalid Gender";
    } else {
        $crrGender = $conn->real_escape_string($gender);
    }

    if (empty($address)) {
        $errAddress = "Address is required";
    } else {
        $crrAddress = $conn->real_escape_string($address);
    }

    if(isset($crrName) && isset($crrEmail) && isset($crrGender) && isset($crrAddress)){
        $sql = "UPDATE `users` SET `name`='$crrName',`email`='$crrEmail',`gender`='$crrGender',`address`='$crrAddress' WHERE `id` = $userId";
        if ($conn->query($sql)) {
            $_SESSION['iUserInfo'] = $conn->query("SELECT * FROM `users` WHERE `id` = $userId")->fetch_object();
            echo "<script>toastr.success('Profile updated successfully');</script>";
        } else {
            echo "<script>toastr.error('Failed to update profile');</script>";
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto my-5 border rounded shadow p-4">
            <h1>My Profile</h1>
            <form action="" method="post">
                <!-- name section -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control <?= isset($errName) ? "is-invalid" : null ?>" name="name"
                        value="<?= $name ?? $userInfo->name ?? null ?>">
                    <div class="invalid-feedback">
                        <?= isset($errName) ? $errName : null ?>
                    </div>
                </div>
                <!-- email section -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control <?= isset($errEmail) ? "is-invalid" : null ?>" name="email"
                        value="<?=
                            $email ?? $userInfo->email ?? null ?>">
                    <div class="invalid-feedback">
                        <?= isset($errEmail) ? $errEmail : null ?>
                    </div>
                </div>
                <!-- gender section -->
                <div class="mb-3">
                    <label for="" class="form-label">Gender :</label>
                    <div class="position-relative p-2">
                        <input type="text"
                            class="form-control position-absolute top-0 start-0 z-n1 bg-white <?= isset($errGender) ? "is-invalid" : null ?>"
                            disabled>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="male" value="Male" name="gender"
                                <?= $userInfo->gender === "Male" ? "checked" : (isset($gender) && $gender === "Male" ? "checked" : null) ?>>
                            <label for="male" class="form-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="female" value="Female" name="gender"
                                <?= $userInfo->gender === "Female" ? "checked" : (isset($gender) && $gender === "Female" ? "checked" : null) ?>>
                            <label for="female" class="form-label">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="others" value="Others" name="gender"
                                <?= $userInfo->gender === "Others" ? "checked" : null ?>>
                            <label for="others" class="form-label">Others</label>
                        </div>
                        <div class="invalid-feedback">
                            <?= isset($errGender) ? $errGender : null ?>
                        </div>
                    </div>
                </div>
                <!-- address section -->
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <!-- Hidden textarea to store the Quill content -->
                    <textarea class="form-control <?= isset($errAddress) ? "is-invalid" : null ?>" name="address"
                        rows="3" style="display: none;" id="hiddenAddress">
        <?= htmlspecialchars_decode($address ?? $userInfo->address ?? '') ?>
    </textarea>
                    <!-- Quill editor container -->
                    <div id="editor" class="<?= isset($errAddress) ? "border border-danger":null ?>">
                        <?= htmlspecialchars_decode($address ?? $userInfo->address ?? '') ?>
                    </div>
                    <div class="invalid-feedback">
                        <?= isset($errAddress) ? $errAddress : null ?>
                    </div>
                </div>

                <!-- submit button -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="updateProfile">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    const quill = new Quill('#editor', {
        theme: 'snow',
    });
    $('#editor').on('keyup', function () {
        const html = quill.root.innerHTML;
        $('#hiddenAddress').val(html);
    });
</script>

<?php
require_once './components/footer.php';
?>