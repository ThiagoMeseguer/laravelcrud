<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Parameter;
use App\Http\Requests\UpdateParameterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ParameterController extends Controller
{
    public function index() : View 
    {
        $parameters = DB::select('select * from parameters',);
        return view('parameter.index', ['parameters' => $parameters]);
    }

    public function update(Request $request)
    {
        DB::table('parameters')
              ->where('id', $request->id)
              ->update([
                'cant_dias' => $request->cant_dias,
                'promocion' => $request->promocion,
                'regular' => $request->regular
                ]);
         return redirect()->back()->withSuccess('Parameter is updated successfully.');
    }
    // public function update(UpdateParameterRequest $request, Parameter $parameter) : RedirectResponse
    // {   
    //     if ($parameter->update($request->all())){
    //         return redirect()->back()
    //         ->withSuccess('Parameter is updated successfully.');
    //     }
    //     return redirect()->back();
    // }
}
