<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use App\Http\Resources\UserResource;
use App\Models\Friend;
use App\Models\Health;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{


    public function changePhoto(Request $request){
        $user = auth()->user();
        $user->profile_picture=$request->path;
        if ($user->save()){
            return $this->apiResponse(ResultType::Success, [], 'Profil Resmi Güncellendi .', 200);
        }

    }
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagesize=\request()->has('page');
        return UserResource::collection(User::all());
    }
    public function profileShow(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return UserResource
     * @throws \Exception
     */
    public function create(UserRequest $request)
    {
            $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $date=new Carbon($request->birth_date);
            $user->birth_date=$date->format('Y-m-d');
            $user->password=Hash::make($request->password);
            $user->university=$request->university;
            if ($user->save()) {
                return $this->apiResponse(ResultType::Success, [], 'Kullanıcı Kayıt Edildi.', 201);
            }
            else {
                return $this->apiResponse(ResultType::Error, 'Kullanıcı Kayıt Edilemedi.', [], 400);
            }
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
     * @return UserResource
     */
    public function show($id)
    {
        $user = User::findOrfail($id);

        return new UserResource($user);
    }
    public function healths($id)
    {
        return response()->json(Health::where('user_id','=',$id)->get());
    }

    public function friend($id)
    {
        $friend=new Friend();
        $friend->user_id=auth()->id();
        $friend->friend_id=$id;
        if ($friend->save()) {
            return $this->apiResponse(ResultType::Success, [], 'Arkadaş  Kayıt Edildi.', 201);
        } else {
            return $this->apiResponse(ResultType::Error, 'Arkadaş Kayıt Edilemedi.', [], 400);
        }
    }
    public function friendDestroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }
        $user = Friend::findOrfail($id);
        $user->delete();

        return response()->json(null, 204);
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
    public function update(UserRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
            $user = User::find($id);
            $user->fill($request->validated())->save();

            return new UserResource($user);

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage}");
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
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }
        $user = User::findOrfail($id);
        $user->delete();

        return response()->json(null, 204);
    }
}
