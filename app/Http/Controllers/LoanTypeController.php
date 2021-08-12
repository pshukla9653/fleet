<?php

namespace App\Http\Controllers;

use App\Models\LoanType;
use Illuminate\Http\Request;
use Redirect,Response;

class LoanTypeController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:loantype-list|loantype-create|loantype-edit|loantype-delete', ['only' => ['index','store']]);
         $this->middleware('permission:loantype-create', ['only' => ['create','store']]);
         $this->middleware('permission:loantype-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:loantype-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->input('search')){
            $query = $request->input('search');
            $loantypes = LoanType::where('loan_type', 'LIKE', '%'. $query. '%')->orderBy('id','DESC')->paginate(10);
            return view('loantype.index', compact('loantypes'));
            
        }
        else{
		$loantypes = LoanType::orderBy('id','DESC')->paginate(5);
        return view('loantype.index', compact('loantypes'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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
		$this->validate($request, [
            'loan_type' => 'required',
        ]);
    
        if($request->id){
            $input = $request->all();
            $loantype = LoanType::find($request->id);
            $loantype->update($input);
        }
        else{
        $loantype   =   LoanType::Create(
            [
                'company_id' => Auth()->user()->company_id,
                'loan_type' => $request->loan_type, 
                
            ]);
        }
            return response()->json(['success' => true]);
    
        
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loanType  $loanType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
      
		$loanType = LoanType::find($request->id);
    	//var_dump($contact); exit;
        return response()->json($loanType);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanType  $loanType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
		LoanType::find($request->id)->delete();
        return response()->json(['success' => true]);
    }
}
