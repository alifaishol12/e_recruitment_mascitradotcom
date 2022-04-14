@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

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

                <div class="card">
                    <div class="card-header">{{ __('PENDIDIKAN') }}</div>
                    <div class="card-body">
                        <form action="{{ route('pendidikan.store') }}" method="POST">
                        @csrf
                            <div class="form-group row mb-2">
                                <label for="jenjang" class="col-sm-3 col-form-label">JENJANG</label>
                                <div class="col-sm-9">
                                    <select name="jenjang" class="form-select" required>
                                        <option value="">PILIH JENJANG</option>
                                        <option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
                                        <option value="D3">D3</option>
                                        <option value="D4 / S1">D4 / S1</option>
                                        <option value="D4 / S1">D4 / S1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="institusi" class="col-sm-3 col-form-label">SEKOLAH (INSTITUSI)</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control phone" name="institusi" id="institusi" placeholder="PILIH INSTITUSI" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="jurusan" class="col-sm-3 col-form-label">JURUSAN</label>
                                <div class="col-sm-9">
                                    <select name="jurusan" class="form-select" required>
                                        <option value="">PILIH JURUSAN</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="kota" class="col-sm-3 col-form-label">KOTA</label>
                                <div class="col-sm-9">
                                    <select name="kota" class="form-select" id="kota" required>
                                        <option value="">PILIH KOTA</option>
                                        @foreach ($regencies as $kota)
                                        <option value="{{$kota->id}}">{{$kota->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="tanggal_lulus" class="col-sm-3 col-form-label">TANGGAL LULUS</label>
                                <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_lulus" id="tanggal_lulus" required> 
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="nilai_uan_ipk" class="col-sm-3 col-form-label">NILAI RATA-RATA UAN / IPK</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="nilai_uan_ipk" id="nilai_uan_ipk" placeholder="NILAI RATA-RATA UAN / IPK" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="akreditasi" class="col-sm-3 col-form-label">AKREDITASI</label>
                                <div class="col-sm-9">
                                    <select name="akreditasi" class="form-select" required>
                                        <option value="">PILIH AKREDITASI</option>
                                        <option value="UNGGUL">UNGGUL</option>
                                        <option value="BAIK SEKALI">BAIK SEKALI</option>
                                        <option value="BAIK">BAIK</option>
                                        <option value="TIDAK TERAKREDITASI">TIDAK TERAKREDITASI</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('home') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center align-middle" >TINGKAT</th>
                                        <th scope="col" class="text-center align-middle" >JURUSAN</th>
                                        <th scope="col" class="text-center align-middle" >NAMA SEKOLAH <br> (INSTITUSI)</th>
                                        <th scope="col" class="text-center align-middle" >KOTA</th>
                                        <th scope="col" class="text-center align-middle" >NILAI UAN <br> (IPK)</th>
                                        <th scope="col" class="text-center align-middle" >TANGGAL KELULUSAN</th>
                                        <th scope="col" class="text-center align-middle" >AKREDITASI</th>
                                        <th scope="col" class="text-center align-middle" >#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pendidikans as $pendidikan)
                                    <tr>
                                        <td class="text-center align-middle">{{ $pendidikan->jenjang }}</td>
                                        <td class="text-center align-middle">{{ $pendidikan->jurusan }}</td>
                                        <td class="text-center align-middle">{{ $pendidikan->institusi }}</td>
                                        <td class="text-center align-middle">{{ $pendidikan->kota }}</td>
                                        <td class="text-center align-middle">{{ $pendidikan->nilai_uan_ipk }}</td>
                                        <td class="text-center align-middle">{{ $pendidikan->tanggal_lulus }}</td>
                                        <td class="text-center align-middle">{{ $pendidikan->akreditasi }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('pendidikan.destroy', $pendidikan->id) }}" method="POST">
                                                <a href="" class="btn btn-sm btn-primary mb-1 mt-1">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger mb-1 mt-1">HAPUS</button>
                                            </form>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="7">Data Pendidikan tidak tersedia</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
        });
    </script>
@endsection