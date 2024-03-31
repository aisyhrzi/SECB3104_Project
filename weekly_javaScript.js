// Function to display saved information
function displayInfo() {
    // Make an AJAX request to fetch and display saved information
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        console.log("ReadyState:", xhr.readyState, "Status:", xhr.status);  // Add this line for debugging

        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log("Response:", xhr.responseText);  // Add this line for debugging
            document.getElementById("infoDisplay").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "display_weekly.php", true);
    xhr.send();
}

function deleteInfo(id) {
    // Ask for confirmation before deleting
    var result = confirm("Are you sure you want to delete this information?");
    
    console.log("Result:", result);  // Add this line for debugging

    if (result) {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            console.log("ReadyState:", xhr.readyState, "Status:", xhr.status);  // Add this line for debugging

            if (xhr.readyState == 4 && xhr.status == 200) {
                // Refresh the displayed information after deletion
                displayInfo();
            }
        };
}
    xhr.open("GET", "delete_weekly.php?id=" + id, true);
    xhr.send();
}

function updateInfo(id) {
    // Redirect to the update_info.php page with the selected information ID
    window.location.href = 'updateInfo_weekly.php?id=' + id;
}