<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\{Page, People, Service};


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


            $result = Mail::send('site.email', compact('data'), function($message) use ($data) {

                $mail_admin = config('mail.mailers.smtp.username');


                $message->from($data['email']);
                $message->to($mail_admin, 'Mr. Admin')->subject('Question');

            });

            return redirect()->route('home')->with('success', 'Your message has been successfully sent!');

        }

        $pages = Page::all();
        $services = Service::all();
        $peoples = People::all();


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
            compact('menu', 'pages', 'services', 'peoples'));
    }
}
