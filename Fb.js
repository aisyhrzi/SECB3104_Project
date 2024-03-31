document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("donor-form");
    
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way
        
        if (confirm("Are you sure you want to donate?")) {
            // If the user confirms, submit the form
            form.submit();
        }
    });
});














