// Function to display saved information
function displayInfoRec() {
    // Make an AJAX request to fetch and display saved information
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("infoDisplay").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "display_request.php", true);
    xhr.send();
}

function scheduleInfo(id, email, time, shoplocation, droplocation) {
    // Redirect to transportation.php with parameters
    window.location.href = 'transportation.php?id=' + id +
        '&email=' + encodeURIComponent(email) +
        '&time=' + encodeURIComponent(time) +
        '&shoplocation=' + encodeURIComponent(shoplocation) +
        '&droplocation=' + encodeURIComponent(droplocation) +
        '&currentDate=' + encodeURIComponent(getCurrentDate());
}

function getCurrentDate() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = today.getFullYear();
    return yyyy + '-' + mm + '-' + dd;
}