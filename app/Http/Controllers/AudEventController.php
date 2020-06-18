<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AudEvent;

class AudEventController extends Controller
{
    public function index()
    {
    	return view('aud-eventos.index')
    		->with('title', 'Events')
    		->with('act_link', 'security')
    		->with('events', AudEvent::all());
    }

    public function crear()
    {
    	return view('aud-eventos.create')
    		->with('title', 'Create Event')
    		->with('act_link', 'security');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|min:4|unique:Aud_Events,Description',
        ]);
        $data = [
            'Description' => ucfirst(strtolower(trim(strip_tags($request->description)))),
        ];

        if (AudEvent::create($data)) {
            $request->session()->flash('success', 'Event created successfully');
            return redirect('/aud-eventos');
            
        }

    }

   

    public function editar($id)
    {
        $event = AudEvent::findOrFail($id);
        return view('aud-eventos.edit')
            ->with('title', 'Edit Event')
            ->with('act_link', 'security')
            ->with('event', $event);
    }

    public function edit($id)
    {
        $event = AudEvent::findOrFail($id);

        $dU = trim(strtolower(request()->description)) != trim(strtolower($event->Description)) ? '|unique:Aud_Events,Description' : '';

        $validatedData = request()->validate([
            'description' => 'required|min:4'.$dU,
        ]);

        $event->Description = ucfirst(strtolower(trim(strip_tags(request()->description))));
        if ($event->save()) {
            request()->session()->flash('success', 'Event modify successfully');
            return redirect('/aud-eventos');
            
        }
    }
}
