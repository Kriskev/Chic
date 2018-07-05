<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function showOption(){

        $role = Role::all();
        $admin = Admin::all();



        return view('option')->with(compact('role','admin'));
    }

    public function store(Request $request){

        $data = $request->all();

        // verifier si les champs sont null
        if ( empty($data['username']) || empty($data['email']) || empty($data['password'])){

           // rediriger si la condition est remplis
            return redirect('/option')->with('message_error','Veuiller remplir correctement les information');

        }else{

            $exist = DB::table('Admins')->where(
                ['name'=>$request->get('username')],
                ['email'=>$request->get('email')]



            )->get();

            if (count($exist )>0){

                return redirect('/option')->with('message_error','utilisateur est deja enregistrer');

            }else{
                $newUser = Admin::updateOrCreate(

                    [
                        'email'=> $request->get('email'),
                    ],



                    [
                        'name'=> $request->get('username'),
                        'roles_id'=> $request->get('role'),
                        'password'=> Hash::make($request->get('password'))

                    ]);

                return redirect('/option');

            }
        }


    }

    public function destroyUser($id){

        $admin = Admin::find($id);
        $admin->delete();

        return redirect('/option');
    }

    public function update(Request $request, $id){
        $admin = Admin::find($id);

        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->password = Hash::make($request->get('password'));
        $admin->roles_id = $request->get('roles_id');
        $admin->save();

        return redirect('/option');

}


}
