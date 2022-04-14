@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <a href="{{ route('biodata.create') }}" class="btn btn-md btn-success mb-3 float-left">BIODATA</a>
                        <a href="{{ route('pendidikan.create') }}" class="btn btn-md btn-success mb-3 float-left">PENDIDIKAN</a>
                        <a href="{{ route('dokumen.create') }}" class="btn btn-md btn-success mb-3 float-left">DOKUMEN</a>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center align-middle">NO. KTP</th>
                                        <th scope="col" class="text-center align-middle">NAMA</th>
                                        <th scope="col" class="text-center align-middle">TANGGAL LAHIR</th>
                                        <th scope="col" class="text-center align-middle">TEMPAT LAHIR</th>
                                        <th scope="col" class="text-center align-middle">EMAIL</th>
                                        <th scope="col" class="text-center align-middle">JENIS KELAMIN</th>
                                        <th scope="col" class="text-center align-middle">STATUS NIKAH</th>
                                        <th scope="col" class="text-center align-middle">KEWARGANEGARAAN</th>
                                        <th scope="col" class="text-center align-middle">AGAMA</th>
                                        <th scope="col" class="text-center align-middle">PROVINSI</th>
                                        <th scope="col" class="text-center align-middle">KABUPATEN</th>
                                        <th scope="col" class="text-center align-middle">KECAMATAN</th>
                                        <th scope="col" class="text-center align-middle">DESA</th>
                                        <th scope="col" class="text-center align-middle">ALAMAT (KTP)</th>
                                        <th scope="col" class="text-center align-middle">HANDPHONE</th>
                                        <th scope="col" class="text-center align-middle">NO. NPWP</th>
                                        <th scope="col" class="text-center align-middle">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($biodatas as $biodata)
                                    <tr>
                                        <td class="text-center align-middle">{{ $biodata->no_ktp }}</td>
                                        <td class="text-center align-middle">{{ $biodata->nama }}</td>
                                        <td class="text-center align-middle">{{ $biodata->tanggal_lahir}}</td>
                                        <td class="text-center align-middle">{{ $biodata->tempat_lahir }}</td>
                                        <td class="text-center align-middle">{{ $biodata->email }}</td>
                                        <td class="text-center align-middle">{{ $biodata->jenis_kelamin }}</td>
                                        <td class="text-center align-middle">{{ $biodata->status_nikah }}</td>
                                        <td class="text-center align-middle">{{ $biodata->kewarganegaraan }}</td>
                                        <td class="text-center align-middle">{{ $biodata->agama }}</td>
                                        <td class="text-center align-middle">{{ $biodata->provinsi }}</td>
                                        <td class="text-center align-middle">{{ $biodata->kabupaten }}</td>
                                        <td class="text-center align-middle">{{ $biodata->kecamatan }}</td>
                                        <td class="text-center align-middle">{{ $biodata->desa }}</td>
                                        <td class="text-center align-middle">{{ $biodata->alamat_ktp }}</td>
                                        <td class="text-center align-middle">{{ $biodata->handphone }}</td>
                                        <td class="text-center align-middle">{{ $biodata->no_npwp }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('biodata.destroy', $biodata->id) }}" method="POST">
                                                <a href="{{ route('biodata.edit', $biodata->id) }}" class="btn btn-sm btn-primary mb-1 mt-1">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger mb-1 mt-1">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="4">Data Biodata tidak tersedia</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
