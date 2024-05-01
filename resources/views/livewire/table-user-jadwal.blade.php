<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-6">
        <h1 class="font-bold text-2xl">List Jadwal</h1>
        <button onclick="window.location='{{ route('user/pengguna/CreateJadwal') }}'" class="btn btn-primary btn-sm">Add Jadwal</button>
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
                <tr class="bg-gray-200 text-gray-600 uppercase text-xs leading-normal">
                    <th class="py-3 px-6 text-left">No</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Nama Matakuliah</th>
                    <th class="py-3 px-6 text-left">Tanggal</th>
                    <th class="py-3 px-6 text-left">Start Time</th>
                    <th class="py-3 px-6 text-left">End Time</th>
                    <th class="py-3 px-6 text-left">Lokasi</th>
                    <th class="py-3 px-6 text-left">Kelas</th>
                    <th class="py-3 px-6 text-left">Jurusan</th>
                    <th class="py-3 px-6 text-left">Deskripsi</th>
                    <th class="py-3 px-6 text-left">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse($jadwal as $index => $rs)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->user->email}}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->matkul->nm_matkul }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->tanggal }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->start_time }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->end_time }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->lokasi }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->kelas }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->jurusan }}</td>
                    <td class="py-3 px-6 text-left">{{ $rs->deskripsi }}</td>
                    <td class="py-3 px-6 text-left">
                        <div class="d-flex">
                            <button onclick="window.location='{{ route('user/pengguna/EditJadwal', $rs->id)}}'" class="btn btn-success btn-sm mr-2">Edit</button>
                            <form action="{{ route('user/pengguna/DestroyJadwal', $rs->id) }}" method="POST" onsubmit="return confirm('Yakin Ingin Menghapus?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>   
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center py-4">Tidak ada data jadwal.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>