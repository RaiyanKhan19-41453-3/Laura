<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends Controller
{
    public function index(){

        $ideas = DB::table("ideas")
            ->paginate(5);

        // $ideas = Idea::orderBy('created_at', 'DESC');

        // if(request()->has('search')){
        //     $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%');
        // }

        return view('dashboard', [
            'ideas' => $ideas
        ]);
    }

    public function searchIndex(){
        $ideas = Idea::orderBy('created_at', 'DESC');
        if(request()->has('search')){
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%');
        }
        return view('dashboard', [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
