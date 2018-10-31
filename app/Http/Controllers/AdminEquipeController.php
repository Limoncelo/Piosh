<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Equipe;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
class AdminEquipeController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $equipe = DB::table('equipes')->where('id', $id)->first();
        return view('admin.equipe', ['equipe' => $equipe]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new_equipe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            // validate
      $rules = array(
        'nom' => 'required',
        'description' => 'required',

      );

      $validator = Validator::make(Input::all(), $rules);

      // process the Config::get('constants.options.route') .'
      if ($validator->fails()) {
        return response()->json($validator->errors(), 204);
      } else {
        $equipe = new Equipe;

        $equipe->nom = Input::get('nom');
        $equipe->description = Input::get('description');
        if(!empty($request->file('photo'))) {
            $image = $request->file('photo');
            $destinationPath = 'img/equipes';
            $image->move($destinationPath, str_slug(now()) . '-' .  $image->getClientOriginalName());
            $equipe->photo = $destinationPath . '/' . str_slug(now()) . '-' .  $image->getClientOriginalName();
        }


        $equipe->created_at = now();
        $equipe->save();
        // redirect
        return Redirect::to('/admin/equipes');

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $nom = $request->nom;
        $description = $request->description;
        $color = $request->color;

        $photos = DB::table('equipes')->select('photo')->where('id', $id)->first();
        if(!empty($request->file('photo'))) {
            $image = $request->file('photo');
            $destinationPath = 'img/equipes/';
            $image->move($destinationPath, str_slug(now()) . '-' . $image->getClientOriginalName());
            $image_1 = $destinationPath . str_slug(now()) . '-' . $image->getClientOriginalName();
        } elseif(!empty($photos->photo)){
            $image_1 = $photos->photo;
        } else {
            $image_1 = null;
        }

        DB::table('equipes')
            ->where('id', $id)
            ->update(array(
                'updated_at' => now(),
                'nom' => $nom,
                'description' => $description,
                'color' => $color,
                'photo' => $image_1,
            ));
        return redirect()->action(
            'AdminEquipeController@index', ['id' => $id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
