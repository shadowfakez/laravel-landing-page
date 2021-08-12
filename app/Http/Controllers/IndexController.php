<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Page, People, Portfolio, Service};

class IndexController extends Controller
{
    public function execute(Request $request) {

        if ($request->isMethod('post')) {

            $messages = [
                'required' => "Поле :attribute обзательно к заполнению",
                'email' => "Поле :attribute должно соответствовать email адресу",
            ];

            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required',

            ], $messages);

            $data = $request->all();

            //mail



        }

        $pages = Page::all();
        $portfolios = Portfolio::all();
        $services = Service::all();
        $peoples = People::all();

        $filters = DB::table('portfolios')->distinct()->pluck('filter');

        $menu = [];

        foreach ($pages as $page) {

            $item = [
                'title' => $page->name,
                'alias' => $page->alias
            ];
            array_push($menu, $item);
        }

        $item = [
            'title' => 'Services',
            'alias' => 'service'
        ];
        array_push($menu, $item);

        $item = [
            'title' => 'Portfolio',
            'alias' => 'Portfolio'
        ];
        array_push($menu, $item);

        $item = [
            'title' => 'Team',
            'alias' => 'team'
        ];
        array_push($menu, $item);

        $item = [
            'title' => 'Contact',
            'alias' => 'contact'
        ];
        array_push($menu, $item);

        return view('site.index',
            compact('menu', 'pages', 'portfolios', 'services', 'peoples', 'filters'));
    }
}
