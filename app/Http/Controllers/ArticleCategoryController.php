<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ArticleCategory::paginate(10);
        return view('admin.article_categories.list', ['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article_categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|min:5|max:50'
            ],
            [
                'name.required'=>'Vui lòng nhập tên danh mục tin tức',
                'name.min'=>'Độ dài tên cần ít nhất 5 ký tự',
                'name.max'=>'Độ dài tên tối đa là 50 ký tự',
            ]);
        // mọi thứ đã okie.
        $obj = new ArticleCategory();
        $obj->name = $request->get('name');
        $obj->save();
        return redirect('/admin/article-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = ArticleCategory::find($id);
        if($obj == null){
            return view('admin.errors.404', ['msg'=>'Không tìm thấy danh mục tin tức']);
        }
        return view('admin.article_categories.detail', ['obj'=>$obj]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = ArticleCategory::find($id);
        if($obj == null){
            return view('admin.errors.404', ['msg'=>'Không tìm thấy danh mục tin tức']);
        }
        return view('admin.article_categories.edit', ['obj'=>$obj]);
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
        $request->validate(
            [
                'name'=>'required|min:5|max:50'
            ],
            [
                'name.required'=>'Vui lòng nhập tên danh mục tin tức',
                'name.min'=>'Độ dài tên cần ít nhất 5 ký tự',
                'name.max'=>'Độ dài tên tối đa là 50 ký tự',
            ]
        );
        $obj = ArticleCategory::find($id);
        if($obj == null){
            return view('admin.errors.404', ['msg'=>'Không tìm thấy danh mục tin tức']);
        }
        $obj->name = $request->get('name');
        $obj->save();
        return redirect('/admin/article-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = ArticleCategory::find($id);
        if($obj == null){
            return view('admin.errors.404', ['msg'=>'Không tìm thấy danh mục tin tức']);
        }
        $obj->delete();
        return redirect('/admin/article-categories');
    }
}
