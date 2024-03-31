// Function to display saved information
function displayInfoR() {
    // Make an AJAX request to fetch and display saved information
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("infoDisplay").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "display_restaurant.php", true);
    xhr.send();
}

function deleteInfoR(id) {
    // Ask for confirmation before deleting
    var result = confirm("Are you sure you want to delete this information?");
    
    console.log("Result:", result);  // Add this line for debugging

    if (result) {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            console.log("ReadyState:", xhr.readyState, "Status:", xhr.status);  // Add this line for debugging

            if (xhr.readyState == 4 && xhr.status == 200) {
                // Refresh the displayed information after deletion
                displayInfoR();
            }
        };

        xhr.open("GET", "delete_restaurant.php?id=" + id, true);
        xhr.send();
    }
}

function updateInfoR(id) {
    // Redirect to the update_info.php page with the selected information ID
    window.location.href = 'updateInfo_restaurant.php?id=' + id;
}