<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\Product;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('updated_at', 'desc')->paginate();
        return view('menus.index', ['menus'=> $menus]);
    }

    public function showPublic(Menu $menu)
    {
        return view('menus.public.show', ['menu' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = new Menu();
        return view('menus.create', ['menu'=> $menu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $data = $request->validated();

        $data['establishment_id'] = \Auth::user()->establishment_id;
        $data['is_active'] = ($data['is_active'] ?? '') == 'on';

        Menu::create($data);

        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $addableProducts = Product::where('establishment_id', $menu->establishment_id)
          ->whereDoesntHave('menus', function($query) use ($menu) {
              $query->where('menus.id', $menu->id);
          })
          ->get();

        return view('menus.show', ['menu' => $menu, 'addableProducts' => $addableProducts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $data = $request->validated();

        $data['is_active'] = ($data['is_active'] ?? '') == 'on';

        $menu->update($data);

        return redirect()->route('menu.show', $menu->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index');
    }
}
