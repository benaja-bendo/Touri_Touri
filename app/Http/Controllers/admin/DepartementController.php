<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = Departement::all();
        return view('admin.departement.index',[
            'departements'=>$departements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'image_path' => ['required', 'image'],
        ]);
        if (request()->hasFile('image_path')) {
            $image_path = '/storage/' . $request->image_path->store('photos-departement', 'public');
        }
        $departement = Departement::create([
            'title' => $request->title,
            'image_path' => $image_path,
            'description' => $request->description,
        ]);
        return back()->with('success', 'creation avec success');
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
        //
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
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'image_path' => ['required', 'image'],
        ]);

        $departement = Departement::findOrFail($id);
        $departement->title = $request->title;
        $departement->description = $request->description;
        if (request()->hasFile('image_path')) {
            $departement->image_path  = '/storage/' . $request->image_path->store('photos-departement', 'public');
        }
        if ($departement->save()) {
            return back()->with('success', 'creation avec success');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $departement = Departement::findOrFail($id);
       if ($departement->delete()){
           return back()->with('success', 'suppression avec success');
       }
    }
}
