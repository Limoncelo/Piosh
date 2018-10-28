<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $article = DB::table('articles')->where('id', $id)->first();
        return view('admin.article', ['article' => $article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new_article');
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
        $article = new Article;
        $article->title = Input::get('title');
        $article->desc = Input::get('desc');
        $article->category_id = 1;
        $article->color = Input::get('color');
        if(!empty($request->file('photo_1'))) {
            $image = $request->file('photo_1');
            $destinationPath = 'img/articles';
            $image->move($destinationPath, $image->getClientOriginalName());
            $article->photo_1 = $destinationPath . '/' . $image->getClientOriginalName();
        }
        if(!empty($request->file(photo_2))) {
            $image = $request->file('photo_2');
            $destinationPath = 'img/articles';
            $image->move($destinationPath, $image->getClientOriginalName());
            $article->photo_2 = $destinationPath . '/' . $image->getClientOriginalName();
        }
        $article->id_category = Input::get('id_category');
        $article->pos_photo = Input::get('pos_photo');
        $article->youtube = Input::get('youtube');
        $article->link = Input::get('link');

        $article->created_at = date('Y-m-d H:i:s');
        $article->save();
        // redirect
        return Redirect::to('/admin/articles');

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

        $photos = DB::table('articles')->select('photo_1', 'photo_2')->where('id', $id)->first();
        if(!empty($request->file('photo_1'))) {
            $image = $request->file('photo_1');
            $destinationPath = 'img/articles/';
            $image->move($destinationPath, $image->getClientOriginalName());
            $image_1 = $destinationPath . $image->getClientOriginalName();
        } elseif(!empty($photos->photo_1)){
            $image_1 = $photos->photo_1;
        } else {
            $image_1 = null;
        }
        if(!empty($request->file('photo_2'))) {
            $image = $request->file('photo_2');
            $destinationPath = 'img/articles/';
            $image->move($destinationPath, $image->getClientOriginalName());
            $image_2 = $destinationPath . $image->getClientOriginalName();
        } elseif(!empty($photos->photo_2)){
            $image_2 = $photos->photo_2;
        } else {
            $image_2 = null;
        }

        DB::table('articles')
            ->where('id', $id)
            ->update(array(
                'updated_at' => date('Y-m-d H:i:s'),
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
