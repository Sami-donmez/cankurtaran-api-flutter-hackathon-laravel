<?php

namespace App\Http\Controllers;

use App\Models\Health;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return HealthResource::collection(Health::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $health = new  Health();
        $health->user_id = auth()->id();
        $health->name = $request->name;
        if ($health->save()) {
            return $this->apiResponse(ResultType::Success,[], 'Hastalık Kayıt Edildi.', 201);
        } else {
            return $this->apiResponse(ResultType::Error, 'Hastalık Kayıt Edilemedi.', [], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Health $health
     * @return \Illuminate\Http\Response
     */
    public function show(Health $health)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Health $health
     * @return \Illuminate\Http\Response
     */
    public function edit(Health $health)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Health $health
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Health $health)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Health $health
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }
        $user = Health::findOrfail($id);
        $user->delete();

        return response()->json(null, 204);
    }
}


