<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questionnaire.index', compact('questions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'answers'   => 'required|array',
        ]);

        foreach ($validated['answers'] as $question_id => $answer_text) {
            Answer::create([
                'question_id' => $question_id,
                'user_name'   => $validated['user_name'],
                'answer_text' => $answer_text,
            ]);
        }

        return redirect()->back()->with('success', 'Your answers have been submitted!');
    }

    public function responses()
    {
        // Eager load related question for each answer
        $answers = Answer::with('question')->orderBy('created_at', 'desc')->get();

        return view('questionnaire.responses', compact('answers'));
    }

}