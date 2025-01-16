
<!DOCTYPE html>
<html>
<head>
    <title>Today All Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    .table {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .table th, .table td {
        border: 1px solid black;
        padding: 8px;
    }
</style>
<body>
    <h1>All Email List</h1>
    <br/>
    <br/>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emails as $email)
            <tr>
                <td>{{ $email->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
