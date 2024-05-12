<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Materi;
use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View {
        return view('landing-page');
    }

    public function dashboard(): View {
        $categories = Category::all()->count();
        $users = User::all()->count();
        $ujian = Ujian::all()->count();
        $materi = Materi::all()->count();
        return view('dashboard', compact([
            'categories', 'users', 'ujian','materi'
        ]));
    }
}
