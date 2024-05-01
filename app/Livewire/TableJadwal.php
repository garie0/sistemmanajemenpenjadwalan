<?php

namespace App\Livewire;

use App\Models\Jadwal;
use Livewire\Component;

class TableJadwal extends Component
{
    public $search;
    public $filter = '';
    public $queryString = [
        'search' => ['except' =>''],
    ];
    public function render()
    {
        $jadwals = Jadwal::with('user','matkul')
                        ->where(function ($query) {
                            $query->whereHas('user', function ($userQuery) {
                                $userQuery->where('email', 'LIKE', '%' . $this->search . '%');
                            })
                            ->orWhereHas('matkul', function ($matkulQuery) {
                                $matkulQuery->where('nm_matkul', 'LIKE', '%' . $this->search . '%');
                            })
                        ->orWhere('tanggal', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('start_time', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('end_time', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('lokasi', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('kelas', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('jurusan', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('deskripsi', 'LIKE', '%' . $this->search . '%');
                });
                if ($this->filter) {
                    $jadwals->whereDate('created_at', $this->filter);
                }
        
                $jadwals = $jadwals->orderBy('created_at', 'ASC')->get();

        return view('livewire.table-jadwal', ['jadwal' => $jadwals]);
    }
}
