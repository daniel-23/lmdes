<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;

class QuizController extends Controller
{
    public function show(Quiz $quiz)
    {
    	$questions = $quiz->questions()->orderBy('IdQuestion')->get();
    	foreach ($questions as $question) {
    		$reply = $question->replies()->where('IdUser',auth()->id())->first();
    		if (is_null($reply)) {
    			return view("utilidades.quiz.show")
    			->with('title', 'Quiz')
    			->with('act_link', 'parameters')
    			->with('question',$question);
    		}
    	}


    	return view("utilidades.quiz.complete")
    		->with('title', 'Quiz')
    		->with('act_link', 'parameters')
    		->with('quiz',$quiz);
    }
}
