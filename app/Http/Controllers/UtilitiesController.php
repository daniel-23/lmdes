<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Course,
    Module,
    Forum,
    ForumReply,
    Quiz,
    Question,
    Option
};
class UtilitiesController extends Controller
{
    public function agregar(Request $request, $id)
    {
        switch ($request->resource) {
    		
            case 1:
                $view = 'add_video';
                break;
            case 2:
    			$view = 'add_foro';
    			break;

            case 4:
                $view = 'add_quiz';
                break;
    		
    		default:
    			$view = 'index';
    			break;
    	}
    	return view("utilidades.$view")
    		->with('title', 'Add Utility')
    		->with('act_link', 'parameters')
    		->with('course',Course::findOrFail($id))
    		->with('module',Module::findOrFail($request->module_id));
    }

    public function agregar_foro(Request $request,$id)
    {
    	$module = Module::findOrFail($id);
    	
    	$validatedData = $request->validate([
			'title'       => 'required|string|max:255',
			'description' => 'required|string',
		]);

    	$datos = [
			'Title'       => trim(strip_tags($request->title)),
			'Description' => trim(strip_tags($request->description,'<h1><h2><h3><h4><h5><p><span>')),
			'IdModule'    => $id,
		];

		if (Forum::create($datos)) {
			$request->session()->flash('success', 'Forum created successfully');
			return redirect()->route('cursos.info',$module->IdCourse);
		}
    }

    public function foros($id)
    {
        return view("utilidades.foros.view")
            ->with('title', 'Forum')
            ->with('act_link', 'parameters')
            ->with('forum',Forum::findOrFail($id));
    }

    public function agregar_comentario_foro(Request $request,$id)
    {
        $forum = Forum::findOrFail($id);

        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $datos = [
            'Title'       => trim(strip_tags($request->title)),
            'Description' => trim(strip_tags($request->description,'<h1><h2><h3><h4><h5><p><span>')),
            'IdUser'    => auth()->id(),
        ];

        if ($forum->replies()->create($datos)) {
            $request->session()->flash('success', 'Reply created successfully');
            return redirect("/utilidades/foros/$forum->IdForum");
        }
    }

    public function agregar_quiz(Request $request,$id)
    {
        $module = Module::findOrFail($id);
        $validatedData = $request->validate([
            'title'               => 'required|string|max:255',
            'total_questions'     => 'required|integer',
            'points_right_answer' => 'required|integer',
            'points_wrong_answer' => 'required|integer',
            'start_date'          => 'required|date',
            'end_date'            => 'required|date',
            'duration'            => 'required|integer',
        ]);
        $datos = [
            'Title'       => trim(strip_tags($request->title)),
            'IdUser' => auth()->id(),
            'TotalQuestions' => $request->total_questions,
            'PointsRightAnswer' => $request->points_right_answer,
            'PointsWrongAnswer' => $request->points_wrong_answer,
            'IdModule'          => $id,
            'StartDate'         => $request->start_date,
            'EndDate'           => $request->end_date,
            'duration'          => $request->duration,
        ];
        $quiz = Quiz::create($datos);
        $request->session()->flash('success', 'Quiz created successfully');
        return redirect('/utilidades/add-questions/'.$quiz->IdQuiz);
    }

    public function add_questions($id)
    {
        return view("utilidades.quiz.add_questions")
            ->with('title', 'Add Questions')
            ->with('act_link', 'parameters')
            ->with('quiz',Quiz::findOrFail($id));

    }

    public function add_questionsp(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        for ($i=0; $i < $quiz->TotalQuestions; $i++) {
            $datosQuestion = [
                'IdQuiz' => $quiz->IdQuiz,
                'Question' => $request->question[$i],
                'Type'     => $request->type[$i],
                'CorrectAnswer' => $request->resp_correct[$i],
            ];

            $question = Question::create($datosQuestion);
            if ($question->type != 'open') {
                $opt = $i+1;
                foreach ($request->option[$opt] as $option) {
                    if (!is_null($option)) {
                        Option::create(['IdQuestion' => $question->IdQuestion, 'Option' => $option]);
                    }
                }
            }
        }
        $courseId = $quiz->module->course->IdCourse;

        $request->session()->flash('success', 'Questions created successfully');
        return redirect('/cursos/'.$courseId);
    }
}
