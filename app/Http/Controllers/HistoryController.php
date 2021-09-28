<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
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
            $histories = History::where('user_email', 'LIKE', '%'. $query. '%')
                ->orWhere('event', 'LIKE', '%'. $query. '%')
                ->orderBy('id','DESC')->paginate(10);

            return view('histories.index', compact('histories'));

        }
        else{
        $histories = History::orderBy('id','DESC')->paginate(5);

        //var_dump($brands); exit;
        return view('histories.index', compact('histories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
		History::find($request->id)->delete();
        return response()->json(['success' => true]);
    }
}
