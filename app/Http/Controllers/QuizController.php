<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;

class QuizController extends Controller
{
    public function show(Quiz $quiz)
    {
    	return view("utilidades.quiz.show")
    		->with('title', 'Quiz')
    		->with('act_link', 'parameters')
    		->with('quiz',$quiz);
    }
}
