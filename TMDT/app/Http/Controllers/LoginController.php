<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\cart;
use App\product;
use App\User;
use Auth;
class LoginController extends Controller
{
    public function getlogin($id)
    {
     $mess=' ';
    if($id==2)$mess='Phía Người Bán';
   
     return view('backend.login',compact('mess'));
    }
    public function postlogin(Request $request, $id)
    {
        $email = $request->email;
        $password = $request->password;
        if($request->remember=='re'){
            $re=true;
        }
        else $re=false;
            $us=['email'=>$email, 'password'=>$password, 'acc_type'=>1];
        if($id==1){
            if(Auth::attempt($us,$re))
            {
              
               return redirect('trang-chu');
            }
                else return redirect('login/'.$id)->with('mess','Không đúng tài khoản mật khẩu');
        }
        else {
            $us=['email'=>$email, 'password'=>$password, 'acc_type'=>2];
            if(Auth::attempt($us,$re))
            {
              
               return redirect('/home');
            }
                else return redirect('login/'.$id)->with('mess','Không đúng tài khoản mật khẩu');

        }
    }

    public function getlogout()
    {
        if(Auth::check())
        {
            $id = Auth::user()->acc_type;
            Auth::logout();
           
            return redirect('login/'.$id)->with('alert','Đăng xuất thành công!!!');
        }
        else {return back();}

    }
    public function getsign()
    {

        return view('backend.sign_up');
    }
    public function postsign(Request $request)
    {   
        $gmail= User::where('email', $request->email)->get();

        if($gmail->count()>0)
        {
            return redirect('/sign_up')->with('email_mess','Gmail đã tồn tại');
        }
        else {
        if($request->password != $request->password1)
        
        {
            return redirect('/sign_up')->with('password_mess','Xác nhận mật khẩu không trùng!');
        }
            User::insert(
                ['email'=>$request->email, 'password'=> bcrypt($request->password),'acc_type'=> 1]
            );
            return redirect('/sign_up')->with('sign_mess','Bạn đã đăng kí thành công!');
        }

    }
    public function getsign2($id)
    {
        return view('backend.sign_up_2');
    }
    public function postsign2($id, Request $request)
    {

        $name = $request->full;
        $mail = $request->mail;
        $data= User::where('email',$mail)->get();
        if($data->count()>0)
        {
            return redirect('/sign_up/2')->with('false','Gmail đã tồn tại!');
        }
        $pass= $request->pass;
        $phone = $request->phone;
        $add=$request->address;


        $user = new User;

        $user->name=$name;
        $user->email=$mail;
        $user->password=bcrypt($pass);
        $user->hotline= $phone;
        $user->address = $add;
        $user->acc_type = $id;
        $user->save();
        return redirect('/sign_up/2')->with('ok1','Bạn đã đăng kí thành công!!');

        

    }

}
