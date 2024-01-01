// Function to display saved information
function displayInfoT() {
    // Make an AJAX request to fetch and display saved information
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("infoDisplay").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "display_transportation.php", true);
    xhr.send();
}

function deleteInfoT(id) {
    // Ask for confirmation before deleting
    var result = confirm("Are you sure you want to delete this information?");
    
    console.log("Result:", result);  // Add this line for debugging

    if (result) {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            console.log("ReadyState:", xhr.readyState, "Status:", xhr.status);  // Add this line for debugging

            if (xhr.readyState == 4 && xhr.status == 200) {
                // Refresh the displayed information after deletion
                displayInfoT();
            }
        };
}
    xhr.open("GET", "delete_transportation.php?id=" + id, true);
    xhr.send();
}

function updateInfoT(id) {
    // Redirect to the update_info.php page with the selected information ID
    window.location.href = 'updateInfo_transportation.php?id=' + id;
}