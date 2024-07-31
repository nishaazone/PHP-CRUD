<?php
// Define variables to store user input
$name = $phone = $email = $website = '';
$nameErr = $phoneErr = $emailErr = $websiteErr = '';

// Function to sanitize and validate input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name contains only letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate Phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
        // Check if phone number is valid (allowing only digits and optional hyphens)
        if (!preg_match("/^[0-9-]*$/", $phone)) {
            $phoneErr = "Invalid phone number";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Website
    if (empty($_POST["website"])) {
        $websiteErr = "";
    } else {
        $website = test_input($_POST["website"]);
        // Check if URL is valid
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid website URL";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation Example</title>

    <style>
         span{
            font-size: 10px;
            color: red;
            margin-left: 50px;
         }

    </style>
</head>
<body>

    <h2>Form Validation Example</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name"><br>
        <span><?php echo $nameErr; ?></span>
        <br><br>

        Phone: <input type="text" name="phone"><br>
        <span><?php echo $phoneErr; ?></span>
        <br><br>

        Email: <input type="text" name="email"><br>
        <span><?php echo $emailErr; ?></span>
        <br><br>

        Website: <input type="text" name="website"><br>
        <span><?php echo $websiteErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>
