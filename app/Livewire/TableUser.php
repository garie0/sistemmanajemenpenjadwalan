<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class TableUser extends Component
{
    public $search;
    public $filter = '';
    public $queryString = [
        'search' => ['except' =>''],
    ];
    public function render()
    {
        $users = User::where('type', 0)
                    ->where(function ($query) {
                        $query->where('name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('created_at', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('updated_at', 'LIKE', '%' . $this->search . '%');
                    });

        if ($this->filter) {
            $users->whereDate('created_at', $this->filter);
        }

        $users = $users->orderBy('created_at', 'ASC')->get();

        return view('livewire.table-user', ['users' => $users]);
    }
}
