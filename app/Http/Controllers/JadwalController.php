<?php
 
namespace App\Http\Controllers;
 
use Carbon\Carbon;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\JadwalNotification;

 
class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentDateTime = now()->setTimezone('Asia/Jakarta');
        $currentDateFormatted = $currentDateTime->format('Y-m-d');
        $currentTimeFormatted = $currentDateTime->format('H:i');

        $notifications = Jadwal::with('matkul')
            ->where('tanggal', $currentDateFormatted)
            ->whereTime('start_time', '>=', $currentTimeFormatted)
            ->get();

        $jadwal = Jadwal::with('user')->orderBy('created_at', 'DESC')->get();

        return view('jadwals.index', compact('jadwal', 'notifications'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $users = User::all();
    $matkuls = Matkul::all(); // Ambil semua data dari model Matkul
    return view('jadwals.create', compact('matkuls','users'));
}

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    $jadwal = Jadwal::create($request->all());
    
    return redirect()->route('admin/jadwals')->with('success', 'jadwal added successfully');
}

    public function show(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
 
        return view('jadwals.show', compact('jadwal'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matkuls = Matkul::all();
        $users = User::all();
        $jadwal = Jadwal::findOrFail($id);
    
        return view('jadwals.edit', compact('matkuls', 'jadwal', 'users'));
    }
    
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
 
        $jadwal->update($request->all());
 
        return redirect()->route('admin/jadwals')->with('success', 'jadwal updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
 
        $jadwal->delete();
 
        return redirect()->route('admin/jadwals')->with('success', 'jadwal deleted successfully');
    }

    
    public function sendScheduledEmails()
    {
        $jadwals = Jadwal::all();
    
        foreach ($jadwals as $jadwal) {
            $start_time = Carbon::parse($jadwal->start_time);
            $current_time = Carbon::now();
            $diffInMinutes = $start_time->diffInMinutes($current_time);
    
            if ($diffInMinutes <= 1) {
                Mail::raw('plain text message', function ($message) use ($jadwal) {
                    $message->to($jadwal->user->email, $jadwal->user->name);
                    $message->subject('Subject');
                });
            }
        }
    }
    
    
}