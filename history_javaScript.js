// Function to display saved information
function displayInfoH() {
    // Make an AJAX request to fetch and display saved information
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("infoDisplay").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "display_history.php", true);
    xhr.send();
}