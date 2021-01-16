<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Deplacement;
use App\Models\Galerie;
use App\Models\Restaurant;
use App\Models\Shop;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::select('*')->orderBy('created_at', 'DESC')->get();
//        dd($sites);
        return view('admin.sites.index',[
            'sites'=>$sites
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();
        return view('admin.sites.create', [
            'departements' => $departements
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
//        dd($request->all());
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'prix' => ['required'],
            'imageP_path' => ['required', 'image'],
            'departement_id' => ['required'],
        ]);
        if (request()->hasFile('imageP_path')) {
            $imageP_path = '/storage/' . $request->imageP_path->store('photos-site', 'public');
        }
        $site = Site::create([
            'title' => $request->title,
            'description' => $request->description,
            'imageP_path' => $imageP_path,
            'prix' => $request->prix,
            'santer_securite' => $request->santer_securite,
            'departement_id' => $request->departement_id,
        ]);
        return redirect()->route('site.index')->with('success', 'creation avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = Site::find($id);
        $departement = Departement::find($site->departement_id);
        $star_site = $site->star()->get()->avg('point');
        $galeries = Galerie::where('site_id',$id)->get();
        $shops = Shop::where('site_id',$id)->get();
        $restaurants = Restaurant::where('site_id',$id)->get();
        $deplacements = Deplacement::where('site_id',$id)->get();

        return view('admin.sites.show',[
            'site'=>$site,
            'star_site'=>$star_site,
            'galeries'=>$galeries,
            'departement'=>$departement,
            'shops'=>$shops,
            'restaurants'=>$restaurants,
            'deplacements'=>$deplacements,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = Site::find($id);
        $departements = Departement::all();
        return view('admin.sites.edit', [
            'departements' => $departements,
            'site'=>$site
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
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'prix' => ['required'],
            'imageP_path' => ['required', 'image'],
            'departement_id' => ['required'],
        ]);

        $site = Site::findOrFail($id);
        $site->title = $request->title;
        $site->description = $request->description;
        $site->prix = $request->prix;
        $site->santer_securite = $request->santer_securite;
        $site->departement_id = $request->departement_id;
        if (request()->hasFile('imageP_path')) {
            $site->imageP_path  = '/storage/' . $request->imageP_path->store('photos-site', 'public');
        }
        if ($site->save()) {
            return redirect()->route('site.index')->with('success', 'modification avec success');
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
        $site= Site::findOrFail($id);
        if ($site->delete()){
            return back();
        }
    }
}
