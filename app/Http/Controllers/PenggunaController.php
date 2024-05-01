<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Matkul;
use Illuminate\Http\Request;


class PenggunaController extends Controller
{
    public function checkStartTime($startTime)
    {
        $currentTime = Carbon::now();
        $startTime = Carbon::parse($startTime);
        $differenceInMinutes = $startTime->diffInMinutes($currentTime);

        return $differenceInMinutes <= 1;
    }

    public function ShowMatkul()
    {
        $matkuls = Matkul::all();
        return view('pengguna.ShowMatkul', compact('matkuls'));
    }

    public function IndexJadwal()
    {
        $currentDateTime = now()->setTimezone('Asia/Jakarta');
        $currentDateFormatted = $currentDateTime->format('Y-m-d');
        $currentTimeFormatted = $currentDateTime->format('H:i');

        $notifications = Jadwal::with('matkul')
            ->where('tanggal', $currentDateFormatted)
            ->whereTime('start_time', '>=', $currentTimeFormatted)
            ->get();       

        $jadwal = Jadwal::with('user')->orderBy('created_at', 'DESC')->get();

        return view('pengguna.IndexJadwal', compact('jadwal','notifications'));
    }

    public function CreateJadwal()
    {
        $matkuls = Matkul::all();
        $users = User::all();
        return view('pengguna.CreateJadwal', compact('matkuls', 'users'));
    }

    public function StoreJadwal(Request $request)
    {
        Jadwal::create($request->all());

        return redirect()->route('user/pengguna')->with('success', 'jadwal added successfully');
    }

    public function EditJadwal(string $id)
    {
        $matkuls = Matkul::all();
        $users = User::all();
        $jadwal = Jadwal::findOrFail($id);

        return view('pengguna.EditJadwal', compact('matkuls', 'jadwal', 'users'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function UpdateJadwal(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update($request->all());

        return redirect()->route('user/pengguna')->with('success', 'jadwal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function DestroyJadwal(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()->route('user/pengguna')->with('success', 'jadwal deleted successfully');
    }
}
