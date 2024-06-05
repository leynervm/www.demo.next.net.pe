<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.users')->only('index');
        $this->middleware('can:admin.users.create')->only('create');
        $this->middleware('can:admin.users.edit')->only('edit');
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {

        // $validateData = $request->validate([
        //     'name' => ['required', 'min:3', 'string'],
        //     'email' => ['required', 'email', 'unique:users,email'],
        //     'password' => ['required', 'min:8', 'confirmed'],
        //     'role_id' => ['nullable', 'integer', 'min:1', 'exists:roles,id'],
        //     'sucursal_id' => ['nullable', 'integer', 'min:1', 'exists:sucursals,id']
        // ]);

        // try {
        //     DB::beginTransaction();
        //     $almacen_id = null;
        //     if ($request->sucursal_id) {
        //         if (!empty($request->sucursal_id)) {
        //             $almacen_id = Sucursal::find($request->sucursal_id)->almacenDefault()->first()->id ?? null;
        //         }
        //     }

        //     User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => bcrypt($request->password),
        //         'role_id' => $request->role_id,
        //         'almacen_id' => $almacen_id,
        //         'sucursal_id' => $request->sucursal_id ?? null,
        //     ]);
        //     DB::commit();
        //     return redirect()->route('admin.users')->with('mensaje', 'nuevo usuario registrado correctamente !');
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     throw $e;
        // } catch (\Throwable $e) {
        //     DB::rollBack();
        //     throw $e;
        // }
    }

    public function edit(User $user)
    {

        // $this->authorize('dashboard', $user);
        $this->authorize('desarrollador', $user);
        return view('admin.users.show', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        // $validateData = $request->validate([
        //     'name' => ['required', 'min:3', 'string'],
        //     'email' => "required|unique:users,email,$user->id",
        //     // 'password' => ['required', 'min:8', 'confirmed'],
        //     'role_id' => ['nullable', 'integer', 'min:1', 'exists:roles,id'],
        //     'sucursal_id' => ['nullable', 'integer', 'min:1', 'exists:sucursals,id']
        // ]);

        // try {
        //     DB::beginTransaction();

        //     $almacen_id = null;
        //     if ($request->sucursal_id) {
        //         if (!empty($request->sucursal_id)) {
        //             $almacen_id = Sucursal::find($request->sucursal_id)->almacenDefault()->first()->id ?? null;
        //         }
        //     }

        //     // User::create([
        //     //     'name' => $request->name,
        //     //     'email' => $request->email,
        //     //     'password' => bcrypt($request->password),
        //     //     'role_id' => $request->role_id,
        //     //     'almacen_id' => $almacen_id,
        //     //     'sucursal_id' => $request->sucursal_id ?? null,
        //     // ]);
        //     $user->update($validateData);
        //     DB::commit();
        //     return redirect()->route('admin.users')->with('message', 'Usuario actualizado correctamente !');
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     throw $e;
        // } catch (\Throwable $e) {
        //     DB::rollBack();
        //     throw $e;
        // }
    }

    public function destroy(User $user)
    {
        // $user->delete();
        // return redirect()->route('admin.users')->with('mensaje', 'nuevo usuario registrado correctamente !');
    }

    public function history()
    {
        return view('admin.historial.logins');
    }

    public function historypassword()
    {
        return view('admin.historial.passwords');
    }
}
