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
                    <div class="card-header">{{ __('DOKUMEN') }}</div>
                    <div class="card-body">
                        <form action="" method="POST">
                        @csrf
                            <div class="form-group row mb-2">
                                <label for="jenis" class="col-sm-3 col-form-label">JENIS</label>
                                <div class="col-sm-9">
                                    <select name="jenis" class="form-select" required>
                                        <option value=""></option>
                                        <option value="IDENTITAS KTP">IDENTITAS KTP</option>
                                        <option value="IJAZAH SLTA">IJAZAH SLTA</option>
                                        <option value="IJAZAH D4 / S1">IJAZAH D4 / S1</option>
                                        <option value="TRANSKRIP UN / UAN SLTA">TRANSKRIP UN / UAN SLTA</option>
                                        <option value="TRANSKRIP NILAI D4 / S1">TRANSKRIP NILAI D4 / S1</option>
                                        <option value="AKREDITASI S1">AKREDITASI S1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="customFile" class="col-sm-3 col-form-label">FILE</label>
                                <div class="col-sm-9">
                                    <input type="file" class="custom-file-input" id="customFile">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('home') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center align-middle" >JENIS</th>
                                        <th scope="col" class="text-center align-middle" >#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>
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