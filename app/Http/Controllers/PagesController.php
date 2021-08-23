<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function execute() {
        if (view()->exists('admin.pages')) {
            $pages = Page::all();

            $data = [
                'title' => 'Страницы',
                'pages' => $pages
            ];
            return view('admin.pages', compact('data', 'pages'));
        }else{
            abort(404);
        }
    }
}
