<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function toHim($id){
        return $id == auth()->user()->id ? true:abort(401);
    }
    public function createNewBlog(){

        if(auth()->user()->is_admin){
            return view('blogs.create');
        }
        elseif(auth()->user()->roles()->first()->hasPermissionTo('browse pages')) return view('blogs.create');

        abort(401);
        
    }

    public function saveBlog(){
        $data = request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);

        $data['slug'] = Str::slug($data['title'].' '.auth()->user()->id);

        $blog = auth()->user()->blogs()->create($data);
        toast('Blog has been posted!', 'success');
        return redirect(route('blogs.create').'?slug='.$blog->slug);
    }

    public function showBlog(Blog $blog){
        return view('blogs.show', compact('blog'));
    }

    public function editBlog(Blog $blog){
        return view('blogs.edit', compact('blog'));
    }

    public function updateBlog(Blog $blog){
        $this->toHim($blog->author->id);

        $data = request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);
        $data['slug'] = Str::slug($data['title'].' '.auth()->user()->id);
        $blog->update($data);
        toast('Blog has been updated!', 'success');
        return view('blogs.show', compact('blog'));
    }

    public function index(){
        
        if(request()->has('q')){
            $blogs = Blog::where('title', 'LIKE', '%'.request()->q.'%')->paginate(10);
        }else {
            $blogs = Blog::latest()->paginate(10);
        }
        return view('blogs.index', compact('blogs'));
    }

}
