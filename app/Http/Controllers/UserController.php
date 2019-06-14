<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Resources\UserResource;
use App\User;
class UserController extends Controller
{

  public function index(Request $request){
    
     
   $users = User::where('id','LIKE','%' . $request->id . '%')
                  ->where('name','LIKE','%' . $request->name . '%')
                  ->where('userName','LIKE','%' . $request->userName . '%')
                  ->where('email','LIKE','%' . $request->email . '%')
                  ->where('role','LIKE','%' . $request->role . '%')
                   ->orderBy('id','DESC')
                   ->paginate(10);
    return $users; 
 
  }

  public function store(Request $request){
    $this->validate($request,[
      'name'=>'required|string',
      'userName'=>'required|string',
      'email'=>'required|email',
      'role'=>'required',
      'password'=>'required|min:6',
    ]);
    $user = new User($request->all());
    $user->password = bcrypt($request->password);
    $user->api_token = str_random(60);
    $user->save();
    return response()
    ->json([
       'status'=>'success'
    ]);
  }

  public function destroy(User $user){
    $user->delete();
    return response()
    ->json([
       'status'=>'success'
    ]);

  }
  public function edit(User $user){
    return $user;
  }

    public function update(Request $request,User $user){
    $this->validate($request,[
      'name'=>'required|string',
      'userName'=>'required|string',
      'email'=>'required|email',
      'role'=>'required',
      'password'=>'nullable|min:6',
    ]);
    if(!empty($request->password)){
       $user->password = bcrypt($request->password);
    }
    $user->name = $request->name;
    $user->userName = $request->userName;
    $user->email = $request->email;
    $user->role = $request->role;
    $user->update();
    return response()
    ->json([
       'status'=>'success'
    ]);
  }

    public function login(Request $request){
  
        $this->validate($request,[
        'email'=>'required|exists:users',
        'password'=>'required',
       ]);

       if(Auth::attempt(['email'=>request('email'),'password'=>request('password')],request('remember'))){
         
         return new UserResource(Auth::user());
       }

       return response()->json([
         'status'=>'error',
         'messag'=>'اطلاعات وارد شده صحیح نمی باشد'
       ]);

    }

    public function register(){

    	  $data = $this->validate(request(),[
            'name'      => 'required|string|max:255',
	          'userName'  => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
       ]);
    	  $data['api_token'] = str_random(60);
    	  $data['password'] = bcrypt($data['password']) ;
    	  $user = User::create($data);
        
    	  return response()
         ->json([
          
          'status'=>'success'
        
        ]);
    }

    public function logout(){
      auth()->logout();
      return response()->json(['status'=>'success']);
    }

}
