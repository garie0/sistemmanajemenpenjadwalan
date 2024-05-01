<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-6">
        <h1 class="font-bold text-2xl">List User</h1>
        <button onclick="window.location='{{ route('admin/users/create') }}'" class="btn btn-primary btn-sm">Add User</button>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <div class="col-md-12 text-left">
                                <input type="text" wire:model.live="search" class="form-control" placeholder="Search....">
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="mb-4 row">
                    <div class="col-md-6 text-right">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Filter By Date :</label>
                    </div>
                    <div class="col-md-6">
                        <input type="date" wire:model.live="filter" name="tanggal" id="tanggal" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="py-3 px-6 text-left">No</th>
                    <th class="py-3 px-6 text-left">Username</th>
                    <th class="py-3 px-6 text-left">Email User</th>
                    <th class="py-3 px-6 text-left">Create At</th>
                    <th class="py-3 px-6 text-left">Edit At</th>
                    <th class="py-3 px-6 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse($users as $index => $us)
                    <tr>
                        <td class="py-3 px-6 text-left">{{ $index + 1 }}</td>
                        <td class="py-3 px-6 text-left">{{ $us->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $us->email }}</td>
                        <td class="py-3 px-6 text-left">{{ $us->created_at}}</td>
                        <td class="py-3 px-6 text-left">{{ $us->updated_at}}</td>
                        <td class="py-3 px-6 text-left">
                            <div class="d-flex">
                                <button onclick="window.location='{{ route('admin/users/edit', $us->id_user)}}'" class="btn btn-success btn-sm mr-2">Edit</button>
                                <form action="{{ route('admin/users/destroy', $us->id_user) }}" method="POST" onsubmit="return confirm('Yakin Ingin Menghapus?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>                            
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Tidak ada data user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>