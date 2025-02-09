<?php

namespace App\Http\Controllers;
use App\Models\Copy;
use Illuminate\Http\Request;
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

    }


    /**
     * Delete an instance of Copies
     * 
     * @param int $copy The ID of the Gender to delete
     * @return Illuminate\Http\Response
     */

    public function destroy($copy){

    }
}
