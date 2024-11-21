
<!DOCTYPE html>
<html>
<head>
    <title>Today All Outgoing Booking</title>
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
    <h1>Today All Outgoing Bookings</h1>
    <p>Date : {{ $date }}</p>
    <br/>
    <br/>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>BCODE</th>
                <th>CNAME</th>
                <th>EMAIL</th>
                <th>PHONE NO</th>
                <th>P TILL TIME</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->booking_code }}</td>
                <td>{{ $booking->first_name }}{{ $booking->last_name }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->phone_no}}</td>
                <td>{{ $booking->parking_till_time}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
