<?php

namespace App\Http\Controllers\Admin;
use App\Models\Catagory;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories=Catagory::count();
        $posts=Post::count();
        $users=User::where('role_as','0')->count();
        $admins=User::where('role_as','1')->count();
 return view ('admin.dashboard', compact ('categories','posts','users','admins'));
    }
}
