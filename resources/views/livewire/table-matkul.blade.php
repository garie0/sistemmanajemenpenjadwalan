<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-6">
        <h1 class="font-bold text-2xl">List Mata Kuliah</h1>
        <button onclick="window.location='{{ route('admin/matkuls/create') }}'" class="btn btn-primary btn-sm">Add Mata Kuliah</button>
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
                <tr class="bg-gray-200 text-gray-600 uppercase text-xs leading-normal">
                    <th class="py-3 px-6 text-left">No</th>
                    <th class="py-3 px-6 text-left">Nama Matakuliah</th>
                    <th class="py-3 px-6 text-left">Dosen Pengampu</th>
                    <th class="py-3 px-6 text-left">Jumlah SKS</th>
                    <th class="py-3 px-6 text-left">Keterangan</th>
                    <th class="py-3 px-6 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse($matkul as $index => $mk)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $index + 1 }}</td>
                        <td class="py-3 px-6 text-left">{{ $mk->nm_matkul }}</td>
                        <td class="py-3 px-6 text-left">{{ $mk->dosen }}</td>
                        <td class="py-3 px-6 text-left">{{ $mk->sks }}</td>
                        <td class="py-3 px-6 text-left">{{ $mk->keterangan }}</td>
                        <td class="py-3 px-6 text-left">
                            <div class="d-flex">
                                <button onclick="window.location='{{ route('admin/matkuls/edit', $mk->id_matkul)}}'" class="btn btn-success btn-sm mr-2">Edit</button>
                                <form action="{{ route('admin/matkuls/destroy', $mk->id_matkul) }}" method="POST" onsubmit="return confirm('Yakin Ingin Menghapus?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>     
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Tidak ada data matakuliah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>