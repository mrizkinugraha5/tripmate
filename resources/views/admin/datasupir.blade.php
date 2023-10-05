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
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
</style>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>TripMate</h2>
            <ul>
                <li><a href="dashboard"><i></i>Website Utama</a></li>
                <li><a href="/datapelanggan"><i></i>Data Pelanggan</a></li>
                <li><a href="/datasupir" class="disabled-link"><i></i>Data Supir</a></li>
                <li><a href="/dataarmada"><i></i>Data Armada</a></li>
                <li><a href="/datajadwal"><i></i>Data Jadwal</a></li>
                <li><a href="logout"><i></i>LogOut</a></li>
            </ul> 
        </div>
        <div class="main_content">
            <div class="header">Welcome to Akses Admin TripMate</div>  
            <div class="info">
              <div class="container">
                <div class="row">
                    <div style="margin-top:20px"> 
                        <h4>Registrasi Supir</h4>
                        <hr>
                        <br>
                        <form action="{{ route('register-supir') }}" method="post" id="formtambahsupir">
                            <div class="text-center"><span class="text-danger msg-text"></span></div>
                            @csrf
                            <div class="form-group">
                                <label for="namasupir">Nama Supir</label>
                                <input type="text" class="form-control" name="namasupir" value="{{old('namasupir')}}">
                                <span class="text-danger">@error('namasupir') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="notelpsupir">No Telpon Supir</label>
                                <input type="text" class="form-control" name="notelpsupir" value="{{old('notelpsupir')}}">
                                <span class="text-danger">@error('notelpsupir') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="nosimsupir">No SIM Supir</label>
                                <input type="text" class="form-control" name="nosimsupir" value="{{old('nosimsupir')}}">
                                <span class="text-danger">@error('nosimsupir') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="alamatsupir">Alamat Supir</label>
                                <input type="text" class="form-control" name="alamatsupir" value="{{old('alamatsupir')}}">
                                <span class="text-danger">@error('alamatsupir') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit">Register</button>
                            </div>
                        </form>
                        <div style="margin-top:20px">
                            <h4>Data Supir</h4>
                            <hr>
                            <br> 
                            <table class="table table-striped table-bordered border-dark text-center">
                                <thead>
                                    <tr>
                                        <th>Nama</th><th>No Telp</th><th>No SIM</th><th>Alamat</th><th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class=" border border-1 border-dark"></tbody>
                            </table>
                        </div>
                        <h4>Kontrol Data Supir</h4>
                        <hr>
                        <br>
                        <form action="{{ route('register-supir') }}" method="post" id="formtambahsupir">
                            <div class="text-center"><span class="text-danger msg-text"></span></div>
                            @csrf
                            <div class="form-group">
                                <label for="namasupir">Nama Supir</label>
                                <input type="text" class="form-control" name="namasupir" value="{{old('namasupir')}}">
                                <span class="text-danger">@error('namasupir') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="notelpsupir">No Telpon Supir</label>
                                <input type="text" class="form-control" name="notelpsupir" value="{{old('notelpsupir')}}">
                                <span class="text-danger">@error('notelpsupir') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="nosimsupir">No SIM Supir</label>
                                <input type="text" class="form-control" name="nosimsupir" value="{{old('nosimsupir')}}">
                                <span class="text-danger">@error('nosimsupir') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="alamatsupir">Alamat Supir</label>
                                <input type="text" class="form-control" name="alamatsupir" value="{{old('alamatsupir')}}">
                                <span class="text-danger">@error('alamatsupir') {{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit">Cari Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
            $(function(){
            //ajax untuk tampil data
            tampildata();
            function tampildata(){
                $.ajax({
                    type: 'get',
                    url: '/tampil_supir',
                    dataType: 'json',
                    success: function(response){
                        $('tbody').html("");
                        $.each(response.supir, function(key,item){
                            $('tbody').append(
                                 '<tr>\
                                    <td>'+item.namasupir+'</td>\
                                    <td>'+item.notelpsupir+'</td>\
                                    <td>'+item.nosimsupir+'</td>\
                                    <td>'+item.alamatsupir+'</td>\
                                    <td>\
                                        <button type="button" class="btn btn-warning edit_obat" value="'+item.id+'"> Ubah </button>\
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="hapusobat'+item.id+'""> Hapus </a>\
                                    </td>\
                                </tr>'
                            );
                        });
                    }
                });
            }
            //ajax untuk menambah supir
            $('#formtambahsupir').on('submit', function(e){
                e.preventDefault();

                var form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.msg-text').text('');
                    },
                    success:function(data){
                        if(data.code == 0){
                            if(data.error.namasupir){
                                $(form).find('span.msg-text').text(data.error.namasupir);
                            }
                            if(data.error.notelpsupir){
                                $(form).find('span.msg-text').text(data.error.notelpsupir);
                            }
                            if(data.error.nosimsupir){
                                $(form).find('span.msg-text').text(data.error.nosimsupir);
                            }
                        }
                        if(data.code == 1){
                            $(form).find('span.msg-text').text('Data Berhasil Disimpan');
                            $(form)[0].reset();
                            tampildata();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>