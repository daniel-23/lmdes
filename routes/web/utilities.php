<?php
Route::group(['middleware' => ['auth']], function () {
	Route::get('/utilidades/foros/{id}', 'UtilitiesController@foros')->where('id', '[0-9]+')->name('foros.show');

	Route::post('/utilidades/agregar/{id}', 'UtilitiesController@agregar')->where('id', '[0-9]+')->name('utilidades.agregar');
	Route::post('/utilidades/agregar-foro/{id}', 'UtilitiesController@agregar_foro')->where('id', '[0-9]+')->name('utilidades.agregar-foro');
	Route::post('/utilidades/foros/agregar-comentario/{id}', 'UtilitiesController@agregar_comentario_foro')->where('id', '[0-9]+')->name('foros.agregar.comentario');



	//QUIZ
	Route::get('/utilidades/add-questions/{id}', 'UtilitiesController@add_questions')->where('id', '[0-9]+')->name('utilidades.agregar-questions');
	Route::post('/utilidades/add-questions/{id}', 'UtilitiesController@add_questionsp')->where('id', '[0-9]+');
	Route::post('/utilidades/agregar-quiz/{id}', 'UtilitiesController@agregar_quiz')->where('id', '[0-9]+')->name('utilidades.agregar-quiz');

	Route::get('/utilidades/quizzes/{quiz}', 'QuizController@show')->where('id', '[0-9]+')->name('quizzes.show');

	//QUESTIONS
	Route::post('/questionreplies', 'QuestionReplyController@create')->name('question_replies.create');

	//VIDEOS
	Route::post('/utilidades/agregar-video/{module}', 'VideoController@store')->where('id', '[0-9]+')->name('utilidades.agregar-video');


	
});

	



