
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<form id="myForm">
    <label>Name:</label>
    <input type="text" id="name" name="name" value="<?php echo isset($_COOKIE['name']) ? htmlspecialchars($_COOKIE['name']) : ''; ?>">
    <label>Email:</label>
    <input type="email" id="email" name="email" value="<?php echo isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>">
    <input type="submit" value="Submit">
</form>

<div id="result"></div>

<script>
$(document).ready(function() {
    $("#myForm").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
            url: 'submit.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $("#result").html(response);
                $("#myForm")[0].reset();
            }
        });
    });
});
</script>

</body>
</html>
