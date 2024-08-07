function showModal() {
    var modal = document.getElementById("roleModal");
    modal.style.display = "block";
}

function navigateToAdmin() {
    window.location.href = "adminDashboard.php";
}

function navigateToUser() {
    window.location.href = "userDashboard.php";
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    var modal = document.getElementById("roleModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
