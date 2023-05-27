<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kuesioner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        $user = auth()->user();
        return view('dashboard.client.allkuesioner', [
            'kuesioners' => Kuesioner::where('user_id', $user->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.client.addkuesioner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:150|string',
                'description' => 'required|string|',
            ]);

            $validatedData['link'] = Str::random(8);
            $validatedData['user_id'] = $user->id;
            // dd($validatedData);
            Kuesioner::create($validatedData);

            return redirect()->route('kuesioner.index')->with('success', 'Successfully create a new questionnaire');
        } catch (Exception $e) {
            return redirect()->route('kuesioner.create')->with('error', 'Error while creating questionnaire. Please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kuesioner $kuesioner)
    {
        $questions = $kuesioner->questions;
        return view('dashboard.client.viewkuesioner', [
            'kuesioner' => $kuesioner,
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kuesioner $kuesioner)
    {
        return view('dashboard.client.editkuesioner', [
            'kuesioner' => $kuesioner
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kuesioner $kuesioner)
    {
        $user = auth()->user();
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
    
            if (!$request->filled('link')) {
                $validatedData['link'] = $kuesioner->link; // menggunakan link yang lama
            }
        
            $validatedData['user_id'] = $user->id;
        
            $kuesioner->update($validatedData);
        
            return redirect()->route('kuesioner.index')->with('success', 'Successfully updated a questionnaire');
        } catch (Exception $e) {
            return redirect()->route('kuesioner.index')->with('error', 'Error while updating a questionnaire. Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kuesioner = Kuesioner::findOrFail($id);
    
        if ($kuesioner->user_id == auth()->user()->id) {
            $kuesioner->delete();
            return redirect()->route('kuesioner.index')->with('success', 'The questionnaire has been successfully deleted.');
        } else {
            return redirect()->route('kuesioner.index')->with('error', 'Failed to delete the questionnaire.');
        }
    }

    public function generateLink($id)
    {
        $kuesioner = Kuesioner::findOrFail($id);
        $link = Str::random(8);

        // Simpan link baru ke dalam kuesioner
        $kuesioner->link = $link;
        $kuesioner->save();

        return redirect()->back()->with('success', 'A new link has been successfully generated.');
    }
}
