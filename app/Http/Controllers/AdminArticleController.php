<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Article;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
class AdminArticleController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = DB::table('articles')
            ->select('articles.title as title', 'articles.intro as intro', 'articles.desc as desc', 'categories.title as catTitle', 'articles.id as id')
            ->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.articles', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.new_article', ['categories' => $categories]);
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

      );

      $validator = Validator::make(Input::all(), $rules);

      // process the Config::get('constants.options.route') .'
      if ($validator->fails()) {
        return response()->json($validator->errors(), 204);
      } else {
        $article = new Article;
        $article->title = Input::get('title');
        $article->intro = Input::get('intro');
        $article->desc = Input::get('desc');
        $article->category_id = Input::get('category_id');
        $article->color = Input::get('color');
        if(!empty($request->file('photo_1'))) {
            $image = $request->file('photo_1');
            $destinationPath = 'img/articles';
            $image->move($destinationPath, str_slug(now()) . '-' .  $image->getClientOriginalName());
            $article->photo_1 = $destinationPath . '/' . str_slug(now()) . '-' .  $image->getClientOriginalName();
        }
        if(!empty($request->file('photo_2'))) {
            $image = $request->file('photo_2');
            $destinationPath = 'img/articles';
            $image->move($destinationPath, str_slug(now()) . '-' . $image->getClientOriginalName());
            $article->photo_2 = $destinationPath . '/' . str_slug(now()) . '-' .  $image->getClientOriginalName();
        }
        $article->category_id = Input::get('category_id');
        $article->pos_photo = Input::get('pos_photo');
        $article->youtube = Input::get('youtube');
        $article->link = Input::get('link');
        $article->ordering = empty(Input::get('ordering')) ? 0 : Input::get('ordering');

        $article->created_at = now();
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
        $categories = DB::table('categories')->get();
        $article = DB::table('articles')->where('id', $id)->first();
        return view('admin.article', ['article' => $article, 'categories' => $categories]);
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
        $intro = $request->intro;
        $desc = $request->desc;
        $color = $request->color;
        $id_category = $request->category_id;
        $pos_photo = $request->pos_photo;
        $youtube = $request->youtube;
        $link = $request->link;
        $ordering = empty($request->ordering) ? 0 : $request->ordering;
        $photos = DB::table('articles')->select('photo_1', 'photo_2')->where('id', $id)->first();
        if(!empty($request->file('photo_1'))) {
            $image = $request->file('photo_1');
            $destinationPath = 'img/articles/';
            $image->move($destinationPath, str_slug(now()) . '-' . $image->getClientOriginalName());
            $image_1 = $destinationPath . str_slug(now()) . '-' . $image->getClientOriginalName();
        } elseif(!empty($photos->photo_1)){
            $image_1 = $photos->photo_1;
        } else {
            $image_1 = null;
        }
        if(!empty($request->file('photo_2'))) {
            $image = $request->file('photo_2');
            $destinationPath = 'img/articles';
            $image->move($destinationPath, str_slug(now()) . '-' . $image->getClientOriginalName());
            $image_2 = $destinationPath . '/' . str_slug(now()) . '-' . $image->getClientOriginalName();
        } elseif(!empty($photos->photo_2)){
            $image_2 = $photos->photo_2;
        } else {
            $image_2 = null;
        }

        DB::table('articles')
            ->where('id', $id)
            ->update(array(
                'updated_at' => now(),
                'title' => $title,
                'intro' => $intro,
                'desc' => $desc,
                'color' => $color,
                'photo_1' => $image_1,
                'photo_2' => $image_2,
                'category_id' => $id_category,
                'pos_photo' => $pos_photo,
                'youtube' => $youtube,
                'link' => $link,
                'ordering' => $ordering));
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
        DB::table('articles')->where('id', $id)->delete();
        return Redirect::to('/admin/articles');
    }
}
