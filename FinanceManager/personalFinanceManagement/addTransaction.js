function submitTransaction() {
    var itemName = document.getElementById('itemName').value;
    var category = document.getElementById('category').value;
    var amount = document.getElementById('amount').value;

    if (amount <= 0) {
        alert('Amount must be greater than zero.');
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'addTransaction.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response.includes('Success')) {
                alert('Transaction added successfully.');
                window.history.back(); // Replace 'index.html' with the correct page to redirect to
            } else {
                alert('Error adding transaction: ' + response);
            }
        }
    };
    xhr.send('itemName=' + encodeURIComponent(itemName) + '&category=' + encodeURIComponent(category) + '&amount=' + encodeURIComponent(amount));
}
