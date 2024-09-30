<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selectable DataTable</title>
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- DataTables Select CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <!-- Bootstrap for styling (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="container mt-4">
            <h3>Enter Your Text</h3>
            <form>
                <div class="mb-3">
                    <label for="csp" class="form-label">Your Message</label>
                    <textarea class="form-control" id="csp" rows="5" placeholder="Type your message here..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="card">
            <div class="info-table">
                <table id="example" class="stripe row-border order-column nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Extn.</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" class="row-select"></td>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                            <td>5421</td>
                            <td>t.nixon@datatables.net</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="row-select"></td>
                            <td>Garrett</td>
                            <td>Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011-07-25</td>
                            <td>$170,750</td>
                            <td>8422</td>
                            <td>g.winters@datatables.net</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="row-select"></td>
                            <td>Ashton</td>
                            <td>Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009-01-12</td>
                            <td>$86,000</td>
                            <td>1562</td>
                            <td>a.cox@datatables.net</td>
                        </tr>
                    </tbody>
                </table>
                <button id="getSelectedRows" class="btn btn-primary mt-3">Get Selected Rows</button>
                <!-- Div to display selected rows data -->
                <div id="selectedRowsDisplay" class="mt-4"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
    $(document).ready(function() {
        // Initialize the DataTable
        var table = $('#example').DataTable({
            // Enable row selection
            ordering: true
        });

        // Handle select/deselect all
        $('#selectAll').on('click', function() {
            var checked = this.checked;
            $('.row-select').prop('checked', checked);
        });

        // Get selected rows data on button click
        $('#getSelectedRows').on('click', function() {
            var selectedData = []; // Array to hold the selected row objects

            $('.row-select:checked').each(function() {
                var row = $(this).closest('tr'); // Get the closest row for the checked checkbox
                var rowData = table.row(row).data(); // Get row data

                // Create an object for the selected row
                var rowObject = {
                    firstName: rowData[1],
                    lastName: rowData[2],
                    position: rowData[3],
                    office: rowData[4],
                    age: rowData[5],
                    startDate: rowData[6],
                    salary: rowData[7],
                    extn: rowData[8],
                    email: rowData[9]
                };

                selectedData.push(rowObject); // Add the object to the array
            });

            // Display the selected data in the selectedRowsDisplay div
            var displayHtml = '<h5>Selected Rows Data:</h5><pre>' + JSON.stringify(selectedData, null, 2) + '</pre>';
            $('#selectedRowsDisplay').html(displayHtml);
        });
    });
    </script>

</body>
</html>
