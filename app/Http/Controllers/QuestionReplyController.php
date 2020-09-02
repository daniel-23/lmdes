<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Question,QuestionReply};
class QuestionReplyController extends Controller
{
    public function create(Request $request)
    {
    	$validatedData = $request->validate([
            'question_id'               => 'required|integer|exists:Utl_Questions,IdQuestion',
            'response'     => 'required',
        ]);


        $question = Question::findOrFail($request->question_id);
        $response = new QuestionReply();
        $response->IdQuestion = $question->IdQuestion;
        $response->IdUser = auth()->id();
        switch ($question->Type) {
        	case 'open':
        		$response->OpenAnswer = $request->response;
        		break;
        	case 'simple':
        		$response->IdOption = $request->response;
        		break;
        	case 'multiple':
        		$response->MultipleAnswer = (string) implode(',', $request->response);
        		break;
        }
        $response->save();
        $request->session()->flash('success', 'Reply created successfully');
        return redirect('/utilidades/quizzes/'.$question->IdQuiz);
    }
}
