<!DOCTYPE html>
<html>
<head>
    <title>Prime Year Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Enter Year</h4>
                </div>
                <div class="card-body">
                    <form id="year-form">
                        @csrf
                        <div class="mb-3">
                            <label for="year" class="form-label">Enter Year:</label>
                            <input type="number" id="year" name="year" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="mt-4">
                <table id="result-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Year</th>
                        <th>Christmas Day</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#year-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '/submit-year',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert(response.message);
                    fetchData();
                }
            });
        });

        function fetchData() {
            $.ajax({
                url: '/fetch-data',
                method: 'GET',
                success: function(data) {
                    let rows = '';
                    data.forEach(function(item) {
                        rows += '<tr><td>' + item.year + '</td><td>' + item.day + '</td></tr>';
                    });
                    $('#result-table tbody').html(rows);
                }
            });
        }

        fetchData();
    });
</script>
</body>
</html>
