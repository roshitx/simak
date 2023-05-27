<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Question;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    public function index(Question $question, $id)
    {
        $question = Question::findOrFail($id);
        $kuesioner = $question->kuesioner;
        return view('dashboard.client.addchoices', [
            'question' => $question,
            'kuesioner' => $kuesioner
        ]);
    }
    

    public function store(Request $request)
    {
        $questionId = $request->input('question_id');
    
        $validatedData = $request->validate([
            'option' => 'required|array',
            'option.*' => 'required|string',
        ]);
    
        $options = $request->input('option');
    
        foreach ($options as $option) {
            Choice::create([
                'option' => $option,
                'question_id' => $questionId,
            ]);
        }
    
        $kuesionerId = Question::find($questionId)->kuesioner_id;
        return redirect()->route('kuesioner.show', ['kuesioner' => $kuesionerId])->with('success', 'Successfully add new option!');
    }    
}
