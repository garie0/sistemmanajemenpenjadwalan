@extends('layouts.main')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="text-3xl font-bold mb-8">Edit User</h1>
            <div class="shadow-md rounded-lg overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin/users/update', $user->id_user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                            <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}" placeholder="Username">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
                        </div>
                        <div class="mb-4">
                            <label for="created_at" class="block text-sm font-medium text-gray-700">Jumlah created_at</label>
                            <input id="created_at" name="created_at" type="text" class="form-control" value="{{ $user->created_at }}" placeholder="Jumlah created_at">
                        </div>
                        <div class="mb-4">
                            <label for="updated_at" class="block text-sm font-medium text-gray-700">Jumlah updated_at</label>
                            <input id="updated_at" name="updated_at" type="text" class="form-control" value="{{ $user->updated_at }}" placeholder="Jumlah updated_at">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <button type="button" onclick="window.location='{{ route('admin/users') }}'" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
