@extends('layouts.main')

@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="text-3xl font-bold mb-8">Add Jadwal</h1>
            <div class="shadow-md rounded-lg overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin/jadwals/store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <div class="mb-4">
                                <label for="id_user" class="block text-sm font-medium text-gray-700">Email</label>
                                <select id="id_user" name="id_user" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id_user }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="id_matkul" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
                                <select name="id_matkul" id="id_matkul" class="form-control">
                                    @foreach($matkuls as $matkul)
                                        <option value="{{ $matkul->id_matkul }}">{{ $matkul->nm_matkul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" style="width: 25%;">
                            </div>
                            <div class="mb-4">
                                <label for="start_time" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                                <input type="time" name="start_time" id="start_time" class="form-control" style="width: 25%;">
                            </div>
                            <div class="mb-4">
                                <label for="end_time" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                                <input type="time" name="end_time" id="end_time" class="form-control" style="width: 25%;">
                            </div>
                            <div class="mb-4">
                                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                                <select id="kelas" name="kelas" class="form-control">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                    <option value="I">I</option>
                                    <option value="J">J</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                                <input id="lokasi" name="lokasi" type="text" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                                <select id="jurusan" name="jurusan" class="form-control">
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                                    <option value="Perpustakaan dan Ilmu Informasi">Perpustakaan dan Ilmu Informasi</option>
                                    <option value="Matematika">Matematika</option>
                                    <option value="Fisika">Fisika</option>
                                    <option value="Kimia">Kimia</option>
                                    <option value="Biologi">Biologi</option>
                                </select>
                            </div>  
                            <div class="mb-4">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="button" onclick="window.location='{{ route('user/pengguna/CreateJadwal') }}'" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
