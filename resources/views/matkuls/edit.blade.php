@extends('layouts.main') 
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="text-3xl font-bold mb-8">Edit Mata Kuliah</h1>
            <div class="shadow-md rounded-lg overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin/matkuls/update', $matkul->id_matkul) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nm_matkul" class="block text-sm font-medium text-gray-700">Nama Matakuliah</label>
                            <input type="text" name="nm_matkul" id="nm_matkul" value="{{ $matkul->nm_matkul }}" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="dosen" class="block text-sm font-medium text-gray-700">Dosen Pengampu</label>
                            <input type="text" name="dosen" id="dosen" value="{{ $matkul->dosen }}" class="form-control">
                        </div> 
                        <div class="mb-4">
                            <label for="sks" class="block text-sm font-medium text-gray-700">Jumlah SKS</label>
                            <input type="text" name="sks" id="sks" value="{{ $matkul->sks }}" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="form-control">{{ $matkul->keterangan }}</textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <button type="button" onclick="window.location='{{ route('admin/matkuls') }}'" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
