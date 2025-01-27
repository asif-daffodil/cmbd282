<?php  

function senitize($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

$allowedGenders = ["male", "female", "others"];
$allowedSkills = ["php", "js", "python"];
$countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo (Congo-Brazzaville)", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czechia (Czech Republic)", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini (fmr. Swaziland)", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Holy See", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea (North)", "Korea (South)", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar (formerly Burma)", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia (formerly Macedonia)", "Norway", "Oman", "Pakistan", "Palau", "Palestine State", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"];

if(isset($_POST['signup'])){
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $gender = $_POST['gender'] ?? null;
    $skills = $_POST['skills'] ?? [];
    $country = $_POST['country'];
    $pass = $_POST['pass'];

    if(empty($userName)){
        $errName = "<span style='color: red'>Name is required</span>";
    }elseif(!preg_match("/^[A-Za-z.\- ]*$/", $userName)){
        $errName = "<span style='color: red'>Only letters and white space allowed</span>";
    }elseif(strlen($userName) < 3){
        $errName = "<span style='color: red'>Name must be greater than 3 characters</span>";
    }else{
        $crrName = senitize($userName);
    }

    if(empty($userEmail)){
        $errEmail = "<span style='color: red'>Email is required</span>";
    }elseif(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
        $errEmail = "<span style='color: red'>Invalid email format</span>";
    }else{
        $crrEmail = senitize($userEmail);
    }

    if(empty($gender)){
        $errGender = "<span style='color: red'>Please select your gender</span>";
    }elseif(!in_array($gender, $allowedGenders)){
        $errGender = "<span style='color: red'>Invalid Gender</span>";
    }else{
        $crrGender = senitize($gender);
    }

    if(count($skills) == 0){
        $errSkills = "<span style='color: red'>Please select at least 1 skills</span>";
    }else{
        foreach($skills as $skill){
            if(!in_array($skill, $allowedSkills)){
                $errSkills = "<span style='color: red'>Invalid Skills</span>";
                $crrSkills = [];
                break;
            }else{
                $crrSkills[] = senitize(data: $skill);
            }
        }
    }

    if(empty($country)){
        $errCountry = "<span style='color: red'>Please select your country</span>";
    }elseif(!in_array($country, $countries)){
        $errCountry = "<span style='color: red'>Invalid Country</span>";
    }else{
        $crrCountry = senitize($country);
    }

    if(empty($pass)){
        $errPass = "<span style='color: red'>Password is required</span>";
    }elseif(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%*&?])[A-Za-z0-9 !@#$%^&*?]{8,}$/", $pass)){
        $errPass = "<span style='color: red'>Please provide a strong password</span>";
    }else{
        $crrPass = senitize($pass);
    }

    if(isset($crrName) && isset($crrEmail) && isset($crrGender) && count($crrSkills) > 0 && isset($crrCountry) && isset($crrPass)){
        $showData = "Name: $crrName <br> Email: $crrEmail <br> Gender: $crrGender <br> Skills: ".implode(", ", $crrSkills)." <br> Country: $crrCountry <br> Password: ".password_hash($crrPass, PASSWORD_DEFAULT);
        $userName = $userEmail = $gender = $skills = $country = $pass = null;
        $crrName = $crrEmail = $crrGender = $crrSkills = $crrCountry = $crrPass = null;
    }
}

?>
<h2>Registration Form</h2>
<form action="" method="post">
    <input type="text" placeholder="Your name" name="userName" value="<?= $userName ?? null ?>">
    <?= $errName ?? null ?>
    <br><br>
    <input type="text" placeholder="Your email" name="userEmail" value="<?= $userEmail ?? null ?>">
    <?= $errEmail ?? null ?>
    <br><br>
    Gender:
    <input type="radio" value="male" name="gender" <?= isset($gender) && $gender == "male" ? "checked":null ?> /> Male
    <input type="radio" value="female" name="gender" <?= isset($gender) && $gender == "female" ? "checked":null ?>/> Female
    <input type="radio" value="others" name="gender" <?= isset($gender) && $gender == "others" ? "checked":null ?> /> Others
    <?= $errGender ?? null ?>
    <br><br>
    Skills:
    <input type="checkbox" value="php" name="skills[]" <?= isset($skills) && in_array("php", $skills) ? "checked":null  ?> /> PHP
    <input type="checkbox" value="js" name="skills[]" <?= isset($skills) && in_array("js", $skills) ? "checked":null  ?> /> JS
    <input type="checkbox" value="python" name="skills[]" <?= isset($skills) && in_array("python", $skills) ? "checked":null  ?> /> Python
    <?= $errSkills ?? null ?>
    <br><br>
    <select name="country">
        <option value="">Select Country</option>
        <?php foreach($countries as $ctr){ ?>
            <option value="<?= $ctr ?>" <?= isset($country) && $country ==  $ctr ? "selected":null ?> ><?= $ctr ?></option>
        <?php } ?>
    </select>
    <?= $errCountry ?? null ?>
    <br><br>
    <input type="password" name="pass" placeholder="write your password">
    <?= $errPass ?? null ?>
    <br><br>
    <button type="submit" name="signup">Sign up</button>
</form>
<div style="color: green">
    <?= $showData ?? null ?>
</div>