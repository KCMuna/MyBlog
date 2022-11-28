<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.css')}}">

<title>Dashboard</title>
<style>

body{
    background-color:#DEDDDD;
  }
   h2{
  
    color:#475052;
  font-family: serif;
  font-size: 40px;
  text-align: center;
  margin-top:20px;
}

table {
  margin-top:20px;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-left: 15%;

}

table.paleBlueRows {
    font-family: Verdana, Geneva, sans-serif;
    border: 1px solid #FFFFFF;
    text-align: center;
    border-collapse: collapse;
    table-layout: fixed;
    width: 70%;
}
table.paleBlueRows td, table.paleBlueRows th {
    border: 1px solid #FFFFFF;
    padding: 3px 2px;
    width: 20%;
}
table.paleBlueRows tbody td {
    font-size: 13px;
}
table.paleBlueRows tr:nth-child(even) {
    background: #D0E4F5;
}
table.paleBlueRows thead {
    background: #0B6FA4;
    border-bottom: 5px solid #FFFFFF;
}
table.paleBlueRows thead th {
    font-size: 15px;
    font-weight: bold;
    color: #FFFFFF;
    text-align: center;
    border-left: 2px solid #FFFFFF;
}
table.paleBlueRows thead th:first-child {
    border-left: none;
}

table.paleBlueRows tfoot {
    font-size: 14px;
    font-weight: bold;
    color: #333333;
    background: #D0E4F5;
    border-top: 3px solid #444444;
}
table.paleBlueRows tfoot td {
    font-size: 14px;

}
.btn-success{
margin-left:73%;
margin-top:20px;
}
.btn-light{
  margin-top:20px;
}

</style>
</head>
<body>

<h2>Logged In User Info</h2>

<table class="paleBlueRows equal-width">
  <thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th></th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>{{$LoggedUserInfo['name'] }}</td>
    <td>{{$LoggedUserInfo['email'] }}</td>
    <td><a href="{{ route('auth.logout') }}">Logout</a></td>
  </tr>
  
</tbody>
</table>
</body>
</html>

