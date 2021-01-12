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
        //
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
//        dd($restaurants);
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
        //
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
