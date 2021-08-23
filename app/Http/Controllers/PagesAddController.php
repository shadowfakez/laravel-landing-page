<?php

namespace App\Http\Controllers;


use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PagesAddController extends Controller
{
    public function execute(Request $request) {

        if ($request->isMethod('post')) {
            $input = $request->except('_token');

            $messages = [
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникально',
            ];

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'alias' => 'required|unique:pages|max:255',
                'text' => 'required',
            ], $messages);

            if ($validator->fails()) {
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }

            if ($request->hasFile('images')) {
                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path() . '/assets/img', $input['images']);
            }

            $page = new Page();
            $page->fill($input);

            if ($page->save()) {
                return redirect('admin')->with('status', 'Страница успешно добавлена');
            }

        }

        if (view()->exists('admin.pages_add')) {
            $data = [
                'title' => 'Новая страница'
            ];
            return view('admin.pages_add', compact('data'));
        }
        abort(404);
    }
}
