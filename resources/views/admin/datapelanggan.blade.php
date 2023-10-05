<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adminpage.css') }}">
    <title>TripMate</title>
</head>
<style>
    .disabled-link {
      pointer-events: none;
    }
</style>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>TripMate</h2>
            <ul>
                <li><a href="dashboard"><i></i>Website Utama</a></li>
                <li><a href="/datapelanggan" class="disabled-link"><i></i>Data Pelanggan</a></li>
                <li><a href="/datasupir"><i></i>Data Supir</a></li>
                <li><a href="/dataarmada"><i></i>Data Armada</a></li>
                <li><a href="/datajadwal"><i></i>Data Jadwal</a></li>
                <li><a href="logout"><i></i>LogOut</a></li>
            </ul> 
        </div>
        <div class="main_content">
            <div class="header">Welcome to Akses Admin TripMate</div>  
            <div class="info">
              <div>Data Pelanggan</div>
          </div>
        </div>
    </div>
</body>
</html>