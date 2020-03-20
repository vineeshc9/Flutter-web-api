<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPosts = BlogPost::all();
        return view('blog.index' , compact('blogPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = Category::all();
        return view('blog.create', compact('catagories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogPost = new BlogPost();
        $blogPost -> title = $request -> input('blogTitle');
        $blogPost -> details = $request -> input('blogDetails');
        $blogPost -> category_id = $request -> input('category');
        $blogPost -> userid = 0;
        if($blogPost-> save()){
            $photo = $request->file('featuredPhoto');
            if($photo != null){
                $ext = $photo-> getClientOriginalExtension();
                $fileName = rand(1000, 5000).'.'.$ext;
                if($ext =='jpg' || $ext == 'png'){
                    if($photo ->move(public_path(), $fileName)){
                        $blogPost = BlogPost::find($blogPost -> id);
                        $blogPost-> featured_image_url = url('/').'/public/'.$fileName;
                        $blogPost->save();
                    }
                }
            }
            return redirect()->back()->with('Success', 'Successfully Entered Blog Post');
        }
        return redirect()->back()->with('Failed', 'Failed to Enter Blog Post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogPosts= BlogPost::find($id);
        $category = Category::all();
        return view('blog.edit', compact('blogPosts', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blogPost =  BlogPost::find($id);
        $blogPost -> title = $request -> input('blogTitle');
        $blogPost -> details = $request -> input('blogDetails');
        $blogPost -> category_id = $request -> input('category');
        $blogPost -> userid = 0;
        if($blogPost-> save()){
            $photo = $request->file('featuredPhoto');
            if($photo != null){
                $ext = $photo-> getClientOriginalExtension();
                $fileName = rand(1000, 5000).'.'.$ext;
                if($ext =='jpg' || $ext == 'png'){
                    if($photo ->move(public_path(), $fileName)){
                        $blogPost = BlogPost::find($blogPost -> id);
                        $blogPost-> featured_image_url = url('/').'/public/'.$fileName;
                        $blogPost->save();
                    }
                }
            }
            return redirect()->back()->with('Success', 'Successfully Updated Blog Post');
        }
        return redirect()->back()->with('Failed', 'Failed to Update Blog Post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(BlogPost::destroy($id)){
            return redirect()->back()->with('Deleted', 'Deleted Record Successfully');
        }
        return redirect()->back()->with('Failed', 'Could not delete record');
    }
}
