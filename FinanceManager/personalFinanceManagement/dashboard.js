document.addEventListener('DOMContentLoaded', function() {
    fetchBudgets();
    fetchBalance();
    fetchTransactions();
});

function fetchBudgets() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetchBudgets.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            var budgets = JSON.parse(this.responseText);
            var output = '';
            for (var i in budgets) {
                output += '<tr><td>' + budgets[i].category + '</td><td>' + budgets[i].amount + '</td></tr>';
            }
            document.querySelector('#budgetTable tbody').innerHTML = output;
        }
    }
    xhr.send();
}

function fetchBalance() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetchBalance.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            document.getElementById('totalBalance').innerText = this.responseText;
        }
    }
    xhr.send();
}

function fetchTransactions() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetchTransactions.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            var transactions = JSON.parse(this.responseText);
            var output = '';
            for (var i in transactions) {
                output += '<tr><td>' + transactions[i].itemName + '</td><td>' + transactions[i].category + '</td><td>' + transactions[i].amount + '</td><td>' + transactions[i].transactionDate + '</td></tr>';
            }
            document.querySelector('#transactionTable tbody').innerHTML = output;
        }
    }
    xhr.send();
}
