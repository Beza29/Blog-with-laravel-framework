<?php

namespace App\Http\Controllers\Admin;
use App\Models\Catagory;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index(){
        $posts=Post::all();
    return view('admin.post.index', compact ('posts'));
}
public function create()
{
    $category=Catagory::where('status','0')->get();
    return view('admin.post.create', compact('category'));
}
public function store (PostFormRequest $request){
$data=$request->validated();
$post= new Post;

$post->category_id=$data['category_id'];
$post->name=$data['name'];
$post->slug= Str::slug($data['slug']);
$post->description=$data['description'];
$post->yt_iframe=$data['yt_iframe'];
$post->meta_title=$data['meta_title'];
$post->meta_description=$data['meta_description'];
$post->meta_keyword=$data['meta_keyword'];
$post->status =$request->status== true ? '1':'0';
$post->created_by =Auth::user()->id;
$post->save();
return redirect('admin/posts')->with ('message','Post added succesfully');
}
public function edit($post_id)
{
    $category= Catagory::where('status','0')->get();
    $post= Post::find($post_id);
    return view('admin.post.edit', compact('post','category'));
}
public function update(PostFormRequest $request, $post_id)
{
        $data=$request->validated();
        $post= Post::find($post_id);
        $post->category_id=$data['category_id'];
        $post->name=$data['name'];
        $post->slug= Str::slug($data['slug']);
        $post->description=$data['description'];
        $post->yt_iframe=$data['yt_iframe'];
        $post->meta_title=$data['meta_title'];
        $post->meta_description=$data['meta_description'];
        $post->meta_keyword=$data['meta_keyword'];
        $post->status =$request->status== true ? '1':'0';
        $post->created_by =Auth::user()->id;
        $post->update();
        return redirect('admin/posts')->with ('message','Post updated succesfully'); 
}
public function destroy($post_id)
{
$post = Post::find($post_id); 
$post->delete();
return redirect('admin/posts')->with ('message','Post deleted succesfully'); 
}
}