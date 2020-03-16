<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;

class EditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editions = Edition::all();
        return view('edition.index', ['editions' => $editions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $edition = Edition::create([
            'name' => $request->name,
            'link' => $request->link,
            'ajax' => $request->ajax,
            'period' => $request->period,
            'sID' => $request->sID
        ]);
        if ($request->hasFile('cover'))
        {
            $edition->addMediaFromRequest('cover')->toMediaCollection('covers');
        }

        $request->session()->flash('success', 'Edition Created.');
        return redirect()->route('edition.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edition = Edition::whereid($id)->firstOrFail();            

        return view('edition.show', ['edition' => $edition]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edition = Edition::whereid($id)->firstOrFail();

        return view('edition.edit', ['edition' => $edition]);
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
        $data = [
            'name' => $request->name,
            'link' => $request->link,
            'ajax' => $request->ajax,
            'period' => $request->period,
            'sID'=> $request->sID
        ];

        $edition = Edition::where('id' , $id)->firstOrFail();
        
        $edition->update($data);

        if (isset($request['cover'])) {
            $edition->clearMediaCollection('covers');
            $edition->addMediaFromRequest('cover')->toMediaCollection('covers');
        } 

        $request->session()->flash('success', $data['name'].', Updated!');
        
        return redirect()->route('edition.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edition = Edition::where('id' , $id)->firstOrFail();

        $name = $edition->name;
        $edition->clearMediaCollection();
        
        $edition->delete();

        session()->flash('success', $name.', Deleted!');
        return redirect()->route('edition.index');
    }

    public function showEdition()
    {
        $editions = Edition::latest()->get();

        return view('edition.showEdition', ['editions' => $editions]);
    }

    public function showSingle($id)
    {
        $edition = Edition::whereid($id)->firstOrFail();
        
                return $edition->ajax;
    }
    public function showajax($id)
    {
        $edition = Edition::whereid($id)->firstOrFail();
        
        return $edition->ajax;
    }
}
