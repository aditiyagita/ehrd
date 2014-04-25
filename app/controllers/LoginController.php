<?php


class LoginController extends BaseController {


    public function __construct() {
        $this->user = New User();
    }

    

    public function login() {
        $input = Input::all();
        $v = Validator::make($input, User::$ruleslogin);

        if ($v->passes()) {
            $credentials = array(
                            'username' => $input['uname'],
                            'password' => $input['upw']
                            );
            if (Auth::attempt($credentials, true)){
                 Session::put('user',Auth::user());
            }else{
                return Redirect::back()->withErrors('Login Failed, Please Try Again!');
            }
        }else{
            return Redirect::back()->withErrors(['Login Failed, Username or Password Not Complete!']);
        }
        return Redirect::to('/');
    }

    public function logout(){
        // $id = Auth::user()->id_user;
        // Auth::logout($id);
        Auth::logout();
        Session::forget('user');
        
        return Redirect::to('/');
    }

}
?>
