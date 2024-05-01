<?php

namespace App\Livewire;

use App\Models\Matkul;
use Livewire\Component;

class TableMatkul extends Component
{
    public $search;
    public $queryString = [
        'search' => ['except' =>''],
    ];
    public function render()
    {
        $matkuls = Matkul::where(function ($query) {
                    $query->where('nm_matkul', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('dosen', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('sks', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('keterangan', 'LIKE', '%' . $this->search . '%');
                })
                ->orderBy('created_at', 'ASC')
                ->get();

        return view('livewire.table-matkul', ['matkul' => $matkuls]);
    }
}
