@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Biodata</div>

                <div class="card-body">
                    <form action="{{ route('rekomendasi.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="form-label">Keluhan</label>
                            <select name="keluhan" class="form-control">
                                <option selected disabled>Pilih Keluhan</option>
                                <option>Keseleo</option>
                                <option>kurang nafsu makan</option>
                                <option>pegal-pegal </option>
                                <option>darah tinggi</option>
                                <option>gula darah</option>
                                <option>darah tinggi</option>
                                <option>kram perut</option>
                                <option>masuk angin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tahun Lahir</label>
                          <input type="date" class="form-control" name="tahun" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                    @isset($data)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Biodata</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Nama :  {{ $data['nama_jamu'] }}</th>
                            </tr>
                            <tr>
                                <th scope="row">Khasiat : {{ $data['khasiat'] }}</th>
                            </tr>
                            <tr>
                                <th scope="row">Keluhan : {{ $data['keluhan'] }}</th>
                            </tr>
                            <tr>
                                <th scope="row">Umur : {{ $data['umur'] }}</th>
                            </tr>
                            <tr>
                                <th scope="row">Saran Penggunaan : {{ $data['saran_penggunaan'] }}</th>
                            </tr>
                        </tbody>
                    </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
