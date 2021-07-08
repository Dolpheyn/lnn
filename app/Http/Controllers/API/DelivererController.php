<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Deliverer;
use Validator;
use App\Http\Resources\Deliverer as DelivererResource;

class DelivererController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliverers = Deliverer::all();

        return $this->sendResponse(DelivererResource::collection($deliverers), 'Deliverers retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $deliverer = Deliverer::create($input);

        return $this->sendResponse(new DelivererResource($deliverer), 'Deliverer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deliverer = Deliverer::find($id);

        if (is_null($deliverer)) {
            return $this->sendError('Deliverer not found.');
        }

        return $this->sendResponse(new DelivererResource($deliverer), 'Deliverer retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deliverer $deliverer)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $deliverer->name = $input['name'];
        $deliverer->phone = $input['phone'];
        $deliverer->email = $input['email'];
        $deliverer->address = $input['address'];
        $deliverer->save();

        return $this->sendResponse(new DelivererResource($deliverer), 'Deliverer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deliverer $deliverer)
    {
        $deliverer->delete();

        return $this->sendResponse([], 'Deliverer deleted successfully.');
    }
}
