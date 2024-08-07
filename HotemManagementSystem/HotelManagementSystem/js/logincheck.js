function redirectToLogin() {
    var loginType = prompt("Do you want to login as admin or user?");
    if (loginType === "admin") {
      window.location.href = "adminLogin.php";
    } else if (loginType === "user") {
      window.location.href = "userLogin.php";
    } else {
      alert("Invalid login type. Please try again.");
    }
  }
  