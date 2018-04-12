<?php

namespace App\Http\Controllers\Api;

use App\Icon;
use Faker\Generator;
use Awps\FontAwesome;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class IconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Icon::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Generator $faker)
    {
        // Get icons list
        $icons = new FontAwesome();
        // Create new icon
        $icon = Icon::create([
            'name' => $faker->randomElement($icons->getCssClasses()),
            'color' => $faker->hexcolor
        ]);

        return response()->json($icon, Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Icon $icon)
    {
        // Update icon
        $icon->update([
            'color' => $request->color
        ]);

        return response()->json($icon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Icon::destroy($id);

        return response()->json([
            'deleted' => true
        ]);
    }
}
