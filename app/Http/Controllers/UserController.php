<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // ------------------------------------
    public function home()
    {
        $products = DB::table('books_db')->inRandomOrder()->paginate(78);
        return view('home', ['products' => $products]);
    }

    public function signup()
    {
        if (!Session::has('logstatus')) {
            return view('auth.register');
        } else {
            return back();
        }
    }

    public function login()
    {
        if (!Session::has('logstatus')) {
            return view('auth.login');
        } else if (Session::has('logstatus')) {
            return back();
        }
    }

    public function UserProfile()
    {
        $data = ['userInfo' => DB::table('users')->where('id', session('userId'))->first()];
        return view('partials.userprofile', $data);
    }

    public function profileImage(Request $request)
    {

        $user_id = $request->id;
        $user = User::find($user_id);
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/', $fileName);

            if ($user->picture) {
                Storage::delete('public/images/' . $user->picture);
            }
            User::where('id', session('userId'))->update([
                'picture' => $fileName,
            ]);
            return response()->json([
                'status' => 200,
                'messages' => 'profile Image Updated!',
            ]);
        }
    }

    public function profileUpdate(Request $request)
    {
        User::where('id', session('userId'))->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'bdate' => $request->bdate,
            'hobbie' => $request->hobbie,
        ]);
        return response()->json([
            'status' => 200,
            'messages' => 'profile Updated Successfully!'
        ]);
    }

    // forgot password ajax request
    public function forgot()
    {
        if (Session::has('logstatus')) {
            return back();
            session::flush();
        } else {
            return View('auth.forgot');
        }
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:100|email',
        ]);
        if ($validator->fails()) {
            response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()->toArray()
            ]);
        } else {
            $token = Str::random(60);
            $user = User::where('email', $request->email)->first();
            $details = [
                'body' => route('reset', ['email' => $request->email, 'token' => $token])
            ];
            if ($user) {
                User::where('email', $request->email)->update([
                    'token' => $token,
                    'token_expire' => Carbon::now()->addMinutes(10)->toDateTimeString(),
                ]);
                Mail::to($request->email)->send(new ForgotPassword($details));
                return response()->json([
                    'status' => 200,
                    'messages' => 'Reset Password link sent to your mail-id'
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'We Coould not found you Email. Please Register if this is new Email.'
                ]);
            }
        }
    }

    public function reset(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        return View('auth.resetpass', ['email' => $email, 'token' => $token]);
    }
    // handle reset password ajax request
    public function resetPassword(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'npassw' => 'required|max:15|min:8',
                'cpassw' => 'required|min:8|max:15|same:npassw'
            ],
            [
                'cpassw.same' => 'Password did not match!'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()->toArray()
            ]);
        } else {
            // $user = User::where('email', session('resetemail'))->whereNotNull('token')->where('token', session('resettoken'))->where('token_expire', '>', Carbon::now())->exists();
            $user = User::where('email', $request->email)->whereNotNull('token')->where('token', $request->token);

            if ($user) {
                User::where('email', $request->email)->update([
                    'password' => Hash::make($request->npassw),
                    'token' => null,
                    // 'token_expire' => null,
                ]);
                // session::flush();
                return response()->json([
                    'status' => 200,
                    'messages' => 'password changes successfully<br><a href="{{ route("login") }}"></a>'
                ]);
            } else {
                // session::flush();
                return response()->json([
                    'status' => 401,
                    'messages' => 'Reset Link Expired'
                ]);
            }
        }
    }

    public function entry()
    {

        return view('entry');
    }
    public function cart()
    {
        return View('cart');
    }

    public function author()
    {
        $authors= DB::table('authors_db');
        return View('author', ['authors'=> $authors]);
    }



    public function aboutUs()
    {
        return View('partials.about_us');
    }

    public function order()
    {
        return View('order');
    }

    //saveUser method for ajax request and save the user 
    public function saveUser(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:50',
                'email' => 'required|email|unique:users|max:100',
                'password' => 'required|min:8|max:50|same:cpassword', // Use 'same:cpassword' to ensure password matches cpassword
                'gender' => 'required|max:11',
                'bdate' => 'required|max:15',
                'hobbie' => 'required|max:200',
            ],
            [
                'password.same' => 'Password did not match the confirm password.',
                'password.required' => 'Password is required.',
                'cpassword.required' => 'Confirm password is required.'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()->toArray()
            ]);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->gender = $request->gender;
            $user->bdate = $request->bdate;
            $user->hobbie = $request->hobbie;
            $user->save();
            return response()->json([
                'status' => 200,
                'messages' => 'Registered Succesfully'
            ]);
        }
    }

    public function  loginUser(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|max:100',
                'password' => 'required|min:8|max:50'
            ],
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()->toArray()
            ]);
        } else {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('logstatus', true);
                    $request->session()->put('userId', $user->id);
                    $request->session()->put('loggedInUser', $user->email);
                    $request->session()->put('role', $user->roles);
                    return response()->json([
                        'status' => 200,
                        'message' => 'success',
                        'role' => $user->roles,
                    ]);
                } else {
                    return response()->json([
                        'status' => 401,
                        'message' => 'incorrect Email or Password'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'user Not Found'
                ]);
            }
        }
    }


    public function index()
    {
        if (!session()->has('logstatus')) {
            return redirect()->route('home');
        } else {
            return view('admin.index');
            // return back();
        }
    }

    // index page of seller login
    public function indexSeller()
    {
        if (!session()->has('logstatus')) {
            return redirect()->route('home');
        } else {
            return view('seller.indexseller');
            // return back();
        }
    }
    // without making new page for logout this function do that job..
    //it cheks that session value and if it have then removes it and empty the session and after redirect them to home page...
    public function logout()
    {
        if (session()->has('logstatus')) {
            session::pull('logstatus');
            return redirect('/');
        }
    }
}
