
/*new DataTable('reportdata', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});*/

//this filters by sport  selected
document.getElementById('filterForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var filterValue = document.getElementById('sportFilter').value.trim().toLowerCase();
    var rows = document.querySelectorAll("#reportdata tr");
    rows.forEach(function(row, index) {
        if (index !== 0) { // Skip the header row
            var sportCell = row.cells[3];
            if (sportCell) {
                var sportText = sportCell.textContent.trim().toLowerCase();
                if (sportText === filterValue || filterValue === '') {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
    });
});
console.log("JavaScript is executed");console.log("JavaScript is executed");
//this filters by country selected
document.getElementById('filterForm2').addEventListener('submit', function(event) {
    event.preventDefault();
    var filterValue = document.getElementById('countryFilter').value.trim().toLowerCase();
    var rows = document.querySelectorAll("#reportdata tr");
    rows.forEach(function(row, index) {
        if (index !== 0) { // Skip the header row
            var countryCell = row.cells[1];
            if (countryCell) {
                var countryText = countryCell.textContent.trim().toLowerCase();
                if (countryText === filterValue || filterValue === '') {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
    });
});