<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persist Input Value in Cookie</title>
</head>
<body>
    <input type="text" id="myInput" placeholder="Enter something">
    <script src="script.js"></script>
</body>
<script>
    // Function to set a cookie
function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 24 * 60 * 60 * 1000).toUTCString();
    document.cookie = `${name}=${value}; expires=${expires}; path=/`;
}

// Function to get a cookie value
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

// Event listener for input change
document.getElementById('myInput').addEventListener('input', function() {
    const inputValue = this.value;
    setCookie('myInputValue', inputValue, 1); // Store for 1 day
});

// Load the saved value when the page is loaded
window.onload = function() {
    const savedValue = getCookie('myInputValue');
    if (savedValue) {
        document.getElementById('myInput').value = savedValue;
    }
};

</script>
</html>
