<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
class AdminCategoryController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $categorie = DB::table('categories')->where('id', $id)->first();
        return view('admin.categorie', ['categorie' => $categorie]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new_categorie');
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
        'title' => 'required',
        'desc' => 'required',

      );

      $validator = Validator::make(Input::all(), $rules);

      // process the Config::get('constants.options.route') .'
      if ($validator->fails()) {
        return response()->json($validator->errors(), 204);
      } else {
        $categorie = new Article;
        $categorie->title = Input::get('title');
        $categorie->desc = Input::get('desc');
        $categorie->category_id = 1;
        $categorie->color = Input::get('color');
        if(!empty($request->file('photo_1'))) {
            $image = $request->file('photo_1');
            $destinationPath = 'img/categories';
            $image->move($destinationPath, str_slug(now()) .  $image->getClientOriginalName());
            $categorie->photo_1 = $destinationPath . '/' . str_slug(now()) .  $image->getClientOriginalName();
        }
        if(!empty($request->file(photo_2))) {
            $image = $request->file('photo_2');
            $destinationPath = 'img/categories';
            $image->move($destinationPath, str_slug(now()) . $image->getClientOriginalName());
            $categorie->photo_2 = $destinationPath . '/' . str_slug(now()) .  $image->getClientOriginalName();
        }
        $categorie->id_category = Input::get('id_category');
        $categorie->pos_photo = Input::get('pos_photo');
        $categorie->youtube = Input::get('youtube');
        $categorie->link = Input::get('link');

        $categorie->created_at = now();
        $categorie->save();
        // redirect
        return Redirect::to('/admin/categories');

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

        $title = $request->title;
        $desc = $request->desc;
        $color = $request->color;
        $id_category = $request->id_category;
        $pos_photo = $request->pos_photo;
        $youtube = $request->youtube;
        $link = $request->link;

        $photos = DB::table('categories')->select('photo_1', 'photo_2')->where('id', $id)->first();
        if(!empty($request->file('photo_1'))) {
            $image = $request->file('photo_1');
            $destinationPath = 'img/categories/';
            $image->move($destinationPath, str_slug(now()) . $image->getClientOriginalName());
            $image_1 = $destinationPath . now() . $image->getClientOriginalName();
        } elseif(!empty($photos->photo_1)){
            $image_1 = $photos->photo_1;
        } else {
            $image_1 = null;
        }
        if(!empty($request->file('photo_2'))) {
            $image = $request->file('photo_2');
            $destinationPath = 'img/categories';
            $image->move($destinationPath, str_slug(now()) . $image->getClientOriginalName());
            $image_2 = $destinationPath . '/' . str_slug(now()) . $image->getClientOriginalName();
        } elseif(!empty($photos->photo_2)){
            $image_2 = $photos->photo_2;
        } else {
            $image_2 = null;
        }

        DB::table('categories')
            ->where('id', $id)
            ->update(array(
                'updated_at' => now(),
                'title' => $title,
                'desc' => $desc,
                'color' => $color,
                'photo_1' => $image_1,
                'photo_2' => $image_2,
//                'category_id' => $id_category,
            'category_id' => 1,
                'pos_photo' => $pos_photo,
                'youtube' => $youtube,
                'link' => $link));
        return redirect()->action(
            'AdminArticleController@index', ['id' => $id]
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
