<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <!-- jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <table id="dataList" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataList').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "fetchData.php",

                "columnDefs": [{
                    "orderable": false,
                    "targets": 7
                }]
            });
        });
    </script>
</body>

</html>