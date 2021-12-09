<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SilsilahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $silsilah = User::all();
        // jika parent id = 0 artinya Ayah. parent id = 1 anak, parent id = 2 cucu

        return view('pages.index', [
            'silsilah' => $silsilah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = User::with(['children'])->where('parent_id', '=', '1')->get();
        return view('pages.create', [
            'silsilah' => $item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'parent_id' => $request->parent_id == 0 ? null : $request->parent_id,
            'name'      => $request->name,
            'gender'    => $request->gender
        ]);

        return redirect('/silsilah/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $silsilah = User::findOrFail($id);
        return view('pages.edit',[
            'silsilah' => $silsilah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $silsilah = User::findOrFail($id);

        $silsilah->update([
            'parent_id' => $request->parent_id == 0 ? null : $request->parent_id,
            'name'      => $request->name,
            'gender'    => $request->gender
        ]);

        return redirect('/silsilah/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $silsilah = User::findOrFail($id);
        $silsilah->delete();

        return redirect('/silsilah/');
    }
}
