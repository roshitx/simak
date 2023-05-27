<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Question;
use App\Models\Kuesioner;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $kuesionerId = $request->input('kuesioner_id');
        try {
            $validatedData = $request->validate([
                'question' => 'string|max:200|required',
                'type' => 'string|required',
            ]);

            $validatedData['kuesioner_id'] = $kuesionerId;
            $validatedData['user_id'] = $userId;
            Question::create($validatedData);
            return redirect()->route('kuesioner.show', $kuesionerId)->with('success', 'Succesfully create new question');
        } catch (Exception $e) {
            // return $e->getMessage();
            return redirect()->route('kuesioner.show', $kuesionerId)->with('error', 'Error while creating question, Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kuesionerId)
    {
        $kuesioner = Kuesioner::findOrFail($kuesionerId);
        $questions = Question::where('kuesioner_id', $kuesionerId)->get();
    
        return view('dashboard.client.editquestion', compact('kuesioner', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $userId = auth()->user()->id;
        $kuesionerId = $request->input('kuesioner_id');
        try {
            $validatedData = $request->validate([
                'question' => 'string|max:200',
                'type' => 'required|string'
            ]);

            $validatedData['kuesioner_id'] = $kuesionerId;
            $validatedData['user_id'] = $userId;
            $question->update($validatedData);
            return redirect()->route('question.edit', $kuesionerId)->with('success', 'Successfully update a question');
        } catch (Exception $e) {
            return redirect()->route('question.edit', $kuesionerId)->with('error', 'Error while updating question, Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req, Question $question)
    {
        $kuesionerId = $req->input('kuesioner_id');
        $question->delete();
        return redirect()->route('kuesioner.show', $kuesionerId)->with('success', "Question deleted successfully!");
    }
}
