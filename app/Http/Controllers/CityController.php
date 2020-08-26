<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\State;
use App\Country;
use Illuminate\Support\Facades\DB;


class CityController extends Controller
{
    public function index()
    {
    	return view('ciudades.index')
    		->with('title', 'Cities')
    		->with('act_link', 'parameters_global');
    }
    public function get_list(Request $request)
    {

        $consulta = DB::table('Cnf_Cities')
            ->join('Cnf_States', 'Cnf_Cities.IdState', '=', 'Cnf_States.IdState')
            ->join('Cnf_Countries', 'Cnf_States.IdCountry', '=', 'Cnf_Countries.IdCountry')
            ->select('Cnf_Cities.*', 'Cnf_States.Name as stateName','Cnf_Countries.Name as countryName');

        $data['totalNotFiltered'] = $consulta->count();
        $data['rows'] = array();

        if (is_null($request->search)) {
            $data['total'] = $data['totalNotFiltered'];
            
        }else{
            $search = '%'.trim(strip_tags($request->search)).'%';
            $consulta
                ->where('Cnf_Cities.Name', 'like', $search)
                ->orWhere('Cnf_States.Name', 'like', $search)
                ->orWhere('Cnf_Countries.Name', 'like', $search);
            $data['total'] = $consulta->count();
        }

        if ($request->offset > 0) {
            $consulta->offset($request->offset);
        }

        $rows = $consulta->limit($request->limit)->get();
        

        foreach ($rows as $key) {
            $btnStatus = $key->Enabled == 'E' ? '<a href="'.url("/ciudades/cambiar-estatus/{$key->IdCity}").'" title="Desacivar" class="btn btn-custon-four btn-success btn-xs"><i class="far fa-check-circle" style="color: white;"></i><a>' : '<a href="'.url("/ciudades/cambiar-estatus/{$key->IdCity}").'" title="Activar" class="btn btn-custon-four btn-danger btn-xs"><i class="fas fa-times-circle" style="color: white;"></i><a>';
            $data['rows'][] = [
                'IdCity' => $key->IdCity,
                'Name' => $key->Name,
                'State' => $key->stateName,
                'Country' => $key->countryName,
                'btns' => $btnStatus . '&nbsp;   <a href="'.url("/ciudades/editar/{$key->IdCity}").'" title="Editar" class="btn btn-custon-four btn-primary btn-xs"><i class="fas fa-pencil-alt" style="color: white;"></i><a>'
            ];
        }

        return $data;

    }

    public function crear()
    {
    	$countries = Country::where('Enabled','E')->get();

    	return view('ciudades.create')
    		->with('title', 'Crearte City')
    		->with('act_link', 'parameters_global')
    		->with('countries', $countries);
    }

    public function create(Request $request)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3',
            'country_id'        => 'required|integer',
            'state_id'        => 'required|integer',
        ]);

    	$data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
    		'IdState' => $request->state_id,
    	];
    	$city = City::create($data);
    	$request->session()->flash('success', 'City created successfully');
    	return redirect('/ciudades');
    }

    public function editar($id)
    {
    	$city = City::findOrFail($id);

    	$states = State::where([['IdCountry','=',$city->state->IdCountry],['Enabled','=','E']])->get();
    	$countries = Country::where('Enabled','E')->get();

    	return view('ciudades.edit')
    		->with('title', 'Edit City')
    		->with('act_link', 'parameters_global')
    		->with('countries', $countries)
    		->with('states', $states)
    		->with('city', $city);
    }

    public function edit(Request $request, $id)
    {
    	$validatedData = $request->validate([
            'name'        => 'required|min:3',
            'country_id'        => 'required|integer',
            'state_id'        => 'required|integer',
        ]);
        $data = [
    		'Name' => ucwords(strtolower(strip_tags(trim($request->name)))),
            'IdState' => $request->state_id,
    	];

    	$city = City::findOrFail($id);
    	$city->update($data);

    	$request->session()->flash('success', 'City modify successfully');
    	return redirect('/ciudades');
    }

    public function cambiar_estatus($id)
    {
        $city = City::findOrFail($id);
        if ($city->Enabled == 'E') {
            $city->Enabled = 'D';
        }else{
            $city->Enabled = 'E';
        }

        if ($city->save()) {
            request()->session()->flash('success', 'City modify successfully');
            return redirect('/ciudades');
            
        }

    }

    public function traer_estados($id)
    {
    	return State::select('IdState','Name')->where([['IdCountry','=',$id],['Enabled','=','E']])->get();
    }

    public function get_cities_state($id)
    {
        return City::select(['IdCity','Name'])->where('IdState',$id)->get();
    }

    
}
