@extends('layouts.main')

@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="text-3xl font-bold mb-8">Edit Jadwal</h1>
            <div class="shadow-sm rounded-lg p-6">
                <form action="{{ route('admin/jadwals/update', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-8">
                        <div class="mb-4">
                            <label for="id_user" class="block text-sm font-medium text-gray-700">Email</label>
                            <select id="id_user" name="id_user" class="form-control">
                                @foreach($users as $user)
                                <option value="{{ $user->id_user }}" @if($user->id_user == $jadwal->id_user) selected @endif>{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="id_matkul" class="block text-sm font-medium text-gray-700">Matakuliah</label>
                            <select name="id_matkul" id="id_matkul" class="form-control">
                                @foreach($matkuls as $matkul)
                                    <option value="{{ $matkul->id_matkul }}" @if($matkul->id_matkul == $jadwal->id_matkul) selected @endif>{{ $matkul->nm_matkul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ $jadwal->tanggal }}" class="form-control" style="width: 25%;">
                        </div>
                        <div class="mb-4">
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                            <input type="time" name="start_time" id="start_time" value="{{ $jadwal->start_time }}" class="form-control" style="width: 25%;">
                        </div>
                        <div class="mb-4">
                            <label for="end_time" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                            <input type="time" name="end_time" id="end_time" value="{{ $jadwal->end_time }}" class="form-control" style="width: 25%;">
                        </div>
                        <div class="mb-4">
                            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <select id="kelas" name="kelas" class="form-control">
                                <option value="A" @if($jadwal->kelas == 'A') selected @endif>A</option>
                                <option value="B" @if($jadwal->kelas == 'B') selected @endif>B</option>
                                <option value="C" @if($jadwal->kelas == 'C') selected @endif>C</option>
                                <option value="D" @if($jadwal->kelas == 'D') selected @endif>D</option>
                                <option value="E" @if($jadwal->kelas == 'E') selected @endif>E</option>
                                <option value="F" @if($jadwal->kelas == 'F') selected @endif>F</option>
                                <option value="G" @if($jadwal->kelas == 'G') selected @endif>G</option>
                                <option value="H" @if($jadwal->kelas == 'H') selected @endif>H</option>
                                <option value="I" @if($jadwal->kelas == 'I') selected @endif>I</option>
                                <option value="J" @if($jadwal->kelas == 'J') selected @endif>J</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                            <input id="lokasi" name="lokasi" type="text" value="{{ $jadwal->lokasi }}" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                            <select id="jurusan" name="jurusan" class="form-control">
                                <option value="Teknik Informatika" @if($jadwal->jurusan == 'Teknik Informatika') selected @endif>Teknik Informatika</option>
                                <option value="Teknik Arsitektur" @if($jadwal->jurusan == 'Teknik Arsitektur') selected @endif>Teknik Arsitektur</option>
                                <option value="Perpustakaan dan Ilmu Informasi" @if($jadwal->jurusan == 'Perpustakaan dan Ilmu Informasi') selected @endif>Perpustakaan dan Ilmu Informasi</option>
                                <option value="Matematika" @if($jadwal->jurusan == 'Matematika') selected @endif>Matematika</option>
                                <option value="Fisika" @if($jadwal->jurusan == 'Fisika') selected @endif>Fisika</option>
                                <option value="Kimia" @if($jadwal->jurusan == 'Kimia') selected @endif>Kimia</option>
                                <option value="Biologi" @if($jadwal->jurusan == 'Biologi') selected @endif>Biologi</option>
                            </select>
                        </div>  
                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control">{{ $jadwal->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <button type="button" onclick="window.location='{{ route('admin/jadwals') }}'" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
