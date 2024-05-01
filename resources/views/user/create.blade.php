@extends('layouts.main')
@section('main')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h1 class="text-3xl font-bold mb-8">Add user</h1>
            <div class="shadow-md rounded-lg overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin/users/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                        </div>   
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password">
                        </div>                                
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="button" onclick="window.location='{{ route('admin/users') }}'" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
