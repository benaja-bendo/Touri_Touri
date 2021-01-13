<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'image_path' => ['required', 'image'],
        ]);
        if (request()->hasFile('image_path')) {
            $image_path = '/storage/' . $request->image_path->store('photos-restaurants', 'public');
        }
        $restaurant = Restaurant::create([
            'site_id' => $request->site_id,
            'title' => $request->title,
            'image_path' => $image_path,
        ]);
        return back()->with('success', 'Project updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'image_path' => ['required', 'image'],
        ]);

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->title = $request->title;
        $restaurant->site_id = $request->site_id;
        if (request()->hasFile('image_path')) {
            $restaurant->image_path  = '/storage/' . $request->image_path->store('photos-restaurants', 'public');
        }
        if ($restaurant->save()) {
            return back()->with('success', 'Project updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        if ($restaurant->delete()) {
            return back();
        }
    }
}
