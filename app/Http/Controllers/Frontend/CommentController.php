<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Response;
class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
     
    }


    public function store(Request $request)
{

    $validator= Validator::make($request->all(), [
'comment_body'=>'required|string'
    ]);
    
    if($validator->fails())
    {
        return redirect()->back()->with('message','comment area is mandatory');
    }
$post= Post::where('slug',$request->post_slug)->where('status','0')->first();
if($post)
{
Comment::create([
    'post_id'=>$post->id,
    'user_id'=>Auth::user()->id,
    'comment_body'=>$request->comment_body,
   
]);
return redirect()->back()->with ('message','commented successfully');
}

else
{

    
    return redirect('/')->with ('message','commented successfully');
}
}


 
}
