@extends('layouts.main')
 
@section('main')
<div class="mx-auto max-w-2xl">
    <div class="card">
        <div class="card-body">
            <h1 class="text-3xl font-bold mb-8">Add Mata Kuliah</h1>
            <div class="shadow-md rounded-lg overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin/matkuls/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nm_matkul" class="block text-sm font-medium text-gray-700">Nama Mata Kuliah</label>
                            <input id="nm_matkul" name="nm_matkul" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="dosen" class="block text-sm font-medium text-gray-700">Dosen</label>
                            <input id="dosen" name="dosen" type="text" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="sks" class="block text-sm font-medium text-gray-700">SKS</label>
                            <input id="sks" name="sks" type="number" class="form-control">                    
                        </div>
                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="button" onclick="window.location='{{ route('admin/matkuls') }}'" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
