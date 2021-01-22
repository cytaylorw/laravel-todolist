<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Todo::all();
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
        $inputs = $request->all();
        $validator = $this->validator($inputs, 'store');

        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }

        $todo = Todo::create($inputs);

        return response()->json($inputs, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Todo::find($id);
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
        $inputs = $request->all();
        $validator = $this->validator($inputs, 'update');

        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        }

        $todo = Todo::findOrFail($id);
        $todo->update($inputs);

        return response()->json($todo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::find($id)->delete();

        return response()->json($null, 201);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $method)
    {
        switch ($method) {
            case 'store':
                $rules = [
                    'title' => ['required', 'string', 'max:255'],
                    'completed' => ['boolean'],
                ];
                break;
            
            case 'update':
                $rules = [
                    'title' => ['required_without_all:completed', 'string', 'max:255'],
                    'completed' => ['required_without_all:title', 'boolean'],
                ];
                break;
            
            default:
                $rules = [];
                break;
        }
        return Validator::make($data, $rules);
    }
}
