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
		$loantypes = LoanType::orderBy('id','DESC')->paginate(5);
        return view('loantype.index', compact('loantypes'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$loantypes = LoanType::pluck('loan_type','loan_type')->all();
        return view('loantype.create', compact('loantypes'));
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
    
        $input = $request->all();
		$input['company_id'] = Auth()->user()->company_id;
    
        $loantype = LoanType::create($input);
        
    
        return redirect()->route('loantypes.index')
                        ->with('success','Loan Type created successfully');
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanType  $loanType
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanType  $loanType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$loantype = LoanType::find($id);
    	//var_dump($region); exit;
        return Response()->json($loantype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoanType  $loanType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
		$this->validate($request, [
            'loan_type' => 'required',
           
        ]);
    
        $input = $request->all();
       $id = $input['id'];
    
        $loantype = LoanType::find($id);
        $loantype->update($input);
    
        return redirect()->route('loantypes.index')
                        ->with('success','Loan Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanType  $loanType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		LoanType::find($id)->delete();
        return redirect()->route('loantypes.index')
                        ->with('success','Loan Type deleted successfully');
    }
}
