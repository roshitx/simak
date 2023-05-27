<?php

namespace App\Http\Controllers;

use App\Models\Respon;
use App\Models\Question;
use Illuminate\Http\Request;

class ResponController extends Controller
{
    public function store(Request $request)
    {
        $kuesionerId = $request->input('kuesioner_id');
        $questions = Question::where('kuesioner_id', $kuesionerId)->get();
    
        foreach ($questions as $question) {
            $questionId = $question->id;
    
            if ($question->type === 'text') {
                $answer = $request->input('single.' . $questionId);
                $type = 'single';
            } elseif ($question->type === 'multiple') {
                $answer = $request->input('multiple.' . $questionId);
                $choiceId = intval($answer);
                $answer = $choiceId;
                $type = 'multiple';
            }
    
            if ($answer !== null) {
                // Save the response in the 'respon' table
                Respon::create([
                    'kuesioner_id' => $kuesionerId,
                    'question_id' => $questionId,
                    'type' => $type,
                    'answer' => $answer,
                ]);
            }
        }

        return redirect()->route('suksesrespon');
    }       
}
