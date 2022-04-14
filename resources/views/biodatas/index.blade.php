<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Pelamar - Biodata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div>

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('biodata.create') }}" class="btn btn-md btn-success mb-3 float-left">BIODATA</a>
                        <a href="{{ route('pendidikan.create') }}" class="btn btn-md btn-success mb-3 float-left">PENDIDIKAN</a>
                    
                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">NO. KTP</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">TANGGAL LAHIR</th>
                                    <th scope="col">TEMPAT LAHIR</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">JENIS KELAMIN</th>
                                    <th scope="col">STATUS NIKAH</th>
                                    <th scope="col">KEWARGANEGARAAN</th>
                                    <th scope="col">AGAMA</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($biodatas as $biodata)
                                <tr>
                                    <td>{{ $biodata->no_ktp }}</td>
                                    <td>{{ $biodata->nama }}</td>
                                    <td>{{ $biodata->tanggal_lahir}}</td>
                                    <td>{{ $biodata->tempat_lahir }}</td>
                                    <td>{{ $biodata->email }}</td>
                                    <td>{{ $biodata->jenis_kelamin}}</td>
                                    <td>{{ $biodata->status_nikah }}</td>
                                    <td>{{ $biodata->kewarganegaraan }}</td>
                                    <td>{{ $biodata->agama }}</td>
                                    <td class="text-center">
                                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>