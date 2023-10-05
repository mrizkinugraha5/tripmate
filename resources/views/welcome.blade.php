<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TripMate</title>
</head>
<style>
    body{
        background-image: url('{{ asset('img/tripmate.png') }}');
        background-repeat: no-repeat;
        background-size: 70%;
        background-position: top;
    }
    .click{
        top: 400px;
        position: fixed
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:450px margin-right: 250px">
                <a class="click" href="dashboard" style="margin-left: 615px">GET STARTED</a>
            </div>
        </div>
    </div>
</body>
</html>