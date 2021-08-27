<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index() {
        if (view()->exists('admin.services')) {
            $services = Service::all();

            $data = ['title' => 'Сервисы'];

            return view('admin.services', compact('data', 'services'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data = [
            'title' => 'Новый сервис'
        ];
        return view('admin.service_add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->except('_token');

        $messages = [
            'starts_with' => 'Поле :attribute должно начинаться с fa-',
            'required' => 'Поле :attribute обязательно к заполнению',
            'unique' => 'Поле :attribute должно быть уникально',
        ];

        $validator = Validator::make($input, [
            'name' => 'required|max:255',
            'text' => 'required',
            'icon' => 'starts_with:fa|required|max:255',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('services.create')->withErrors($validator)->withInput();
        }

        $service = new Service();
        $service->fill($input);

        if ($service->save()) {
            return redirect('admin')->with('status', 'Сервис успешно добавлен');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service) {
        $old = $service->toArray();

        if (view()->exists('admin.services_edit')) {
            $data = [
                'title' => 'Редактирование страницы - ' . $old['name'],
            ];
            return view('admin.services_edit', compact('data', 'old'));
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service, Request $request) {

        $input = $request->except('_token');

         $messages = [
            'starts_with' => 'Поле :attribute должно начинаться с fa-',
            'required' => 'Поле :attribute обязательно к заполнению',
            'unique' => 'Поле :attribute должно быть уникально',
        ];

        $validator = Validator::make($input, [
            'name' => 'required|max:255',
            'text' => 'required',
            'icon' => 'starts_with:fa|required|max:255',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('services.create')->withErrors($validator)->withInput();
        }

        $service->fill($input);

        if ($service->update()) {
            return redirect('admin')->with('status', 'Страница обновлена');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, Request $request) {
        if ($request->isMethod('delete')) {
            $service->delete();
            return redirect('admin')->with('status', 'Сервис удален');
        }
    }
}
