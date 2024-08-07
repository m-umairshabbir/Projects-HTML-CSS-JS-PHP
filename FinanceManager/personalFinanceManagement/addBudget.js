function submitBudget() {
    var category = document.getElementById('category').value;
    var amount = document.getElementById('amount').value;

    if (amount <= 0) {
        alert('Amount must be greater than zero.');
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'addBudget.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response.includes('Success')) {
                alert('Budget added successfully.');
                window.history.back(); // Redirect back to the previous page
            } else {
                alert('Error adding budget: ' + response);
            }
        }
    };
    xhr.send('category=' + encodeURIComponent(category) + '&amount=' + encodeURIComponent(amount));
}
