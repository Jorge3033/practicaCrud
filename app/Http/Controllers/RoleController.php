<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Role::all();

        $consultaDeRegistrosEliminados='
        SELECT * FROM roles WHERE deleted_at IS NOT NULL
        ';

        $dataDeleted= \DB::select($consultaDeRegistrosEliminados);

        return view('system.role.report')
                ->with('data',$data)
                ->with('dataDeleted',$dataDeleted);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'role' => 'required|alpha ',
        ]);

        $data = new Role($request->all());
        $data->save();

        return redirect('/role');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('system.role.update')
                ->with('data',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request,[
            'role' => 'required|alpha ',
        ]);

        if($request->has('role')){
            $role->role=$request->role;
        }

        if(!$role->isDirty()){
            return "Debes de actualizar al menos un campo ditinto";
        }

        $role->save();

        return redirect('/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect('/role');
    }

}
