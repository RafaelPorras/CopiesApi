<?php

namespace App\Http\Controllers;
use App\Models\Copy;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;

class CopyController extends Controller
{

    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return a list of copies
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $copies = Copy::all();
    }


    /**
     * Store a new instance of copy
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //rules for creating a Copy
        $rules = [
            'status' => 'required|in:new,used,under_reparir,recycled,damaged',
            'location' => 'required|string|max:255',
            'bar_code' => 'string|size:13|unique:copies,bar_code',
            'identification_tag' => 'required|string|regex:/^[A-Z]{3}[0-9]{4}$/|unique:copies,identification_tag',
            'item_id' => 'required|integer|min:1'
        ];

        //Validate de request
        $this->validate($request,$rules);

        //Create a new copy
        $copy = Copy::create($request->all());

        //return the new copy
        return $this->successResponse($copy);
        
    }

    /**
     * Return a specific Copy
     * 
     * @param int $copy The ID the Copy to retrieve
     * @return \Illuminate\Http\Response
     */
    public function show ($copy){
        //Find a specific copy 
        $copy = Copy::findOrFail($copy);

        //Return the specific copy
        return $this->successResponse($copy);
    }

    /**
     * Update a specific Copy
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $copy The ID the Gender to update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $copy){

        //rules for creating a Copy
        $rules = [
            'status' => 'in:new,used,under_reparir,recycled,damaged',
            'location' => 'string|max:255',
            'bar_code' => 'string|size:13|unique:copies,bar_code',
            'identification_tag' => 'string|regex:/^[A-Z]{3}[0-9]{4}$/|unique:copies,identification_tag',
            'item_id' => 'integer|min:1'
        ];

        //Validate de request
        $this->validate($request,$rules);

        //Find a specific copy
        $copy = Copy::findOrFail($copy);

        //Update the copy
        $copy->fill($request->all());

        //Check if the copy has changed
        if($copy->isClean()){
            return $this->errorResponse('At least one value most be change',Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //Save the copy
        $copy->save();

        //Return the changed copy
        return $this->successResponse($copy);

    }


    /**
     * Delete an instance of Copies
     * 
     * @param int $copy The ID of the Gender to delete
     * @return Illuminate\Http\Response
     */

    public function destroy($copy){
        //Find a specific copy
        $copy = Copy::FindOrFail($copy);

        //Delete a specific copy
        $copy->delete();

        //Return the deleted copy
        return $this->successResponse($copy);

    }
}
