<?php

namespace App\Http\Controllers;

use App\Models\Kuesioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function home()
    {
        return view('index');
    }

    public function respon($link)
    {
        // Cek apakah link valid dalam tabel kuesioner
        $kuesioner = Kuesioner::where('link', $link)->first();
    
        if ($kuesioner) {
            // Ambil data pertanyaan berdasarkan kuesioner
            $questions = $kuesioner->questions;
    
            // Kirim data kuesioner dan pertanyaan ke halaman form
            return view('respon', compact('kuesioner', 'questions'));
        } else {
            // Jika link tidak valid, tampilkan pesan error atau redirect ke halaman lain
            return view('invalidlink');
        }
    }

    public function successRespon()
    {
        return view('suksesrespon');
    }

    public function allKuesioner()
    {
        return view('dashboard.admin.allkuesioner', [
            'kuesioners' => Kuesioner::all(),
        ]);
    }


    
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('home.page');
    }
}
