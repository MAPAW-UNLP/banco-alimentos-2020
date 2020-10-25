<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request){
    $data = User::orderBy('id','DESC')->paginate(5);
    return view('users.index',compact('data'))
    ->with('i', ($request->input('page', 1) - 1) * 5);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create(){
    $roles = Role::pluck('name','name')->all();
    return view('main-add-user',compact('roles'));
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request){
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email'
        //'password' => 'required|same:confirm-password',
        //'roles' => 'required'
    ]);
    $input = $request->except('_token','_method','rol_id');
    //$input['password'] = Hash::make($input['password']);
    $input['password'] = Hash::make('123456789');
    echo response()->json($input);
    $user = User::create($input);
    $user->assignRole($request->input('rol_id'));
    return redirect('addUser')->with('status', 'Profile updated!');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id){
    $user = User::find($id);
    return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id){
    $user = User::find($id);
    $roles = Role::pluck('name','name')->all();
    $userRole = $user->roles->pluck('name','name')->all();
    return view('users.edit',compact('user','roles','userRole'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id){
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'same:confirm-password',
        'roles' => 'required'
    ]);
    $input = $request->all();
    if(!empty($input['password'])){
        $input['password'] = Hash::make($input['password']);
    }else{
        $input = array_except($input,array('password'));
    }
    $user = User::find($id);
    $user->update($input);
    DB::table('model_has_roles')->where('model_id',$id)->delete();
    $user->assignRole($request->input('roles'));
    return redirect()->route('users.index')
    ->with('success','User updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
    User::find($id)->delete();
    return redirect()->route('users.index')
    ->with('success','User deleted successfully');
}
public function updatePassword(Request $request){
    $input = $request->all();
    $oldPassword=User::find(Auth::id())->password;
    $pass=Hash::make($input['password']);
    if ($pass=$oldPassword){
        if($input['newPassword'] = $input['repeatNewPassword']){
            User::find(Auth::id())->update(['password' => Hash::make($input['newPassword'])]);
            return redirect()->route('changePassword')
            ->with('succes','Password actualizada');
        }else{
            return redirect()->route('changePassword')
            ->with('error','Password no coinciden');
        }
    }else{
        return redirect()->route('changePassword')
        ->with('error','Password no coinciden');
    }
    return redirect()->route('changePassword');
    /*if ($input['password'] = $input['passwordConf']){
        $user = User::find($id);
        $input2 = $request->except('passwordConf');
        $user->update($input2);
    }else{
        return redirect()->route('users.index')
        ->with('error','Password no coinciden');
    }
    return redirect()->route('users.index')
    ->with('succes','Password actualizada');*/
}
public function rules()
{
    return [
	    'email' => 'required|unique:users,email'
    ];
}
}