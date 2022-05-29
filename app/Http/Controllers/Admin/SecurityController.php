<?php


namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $action = $request->input('action');
        $info = "";
        if ($action == 'save'){
            $validatedData = $request->validate([
                'password' => 'required|min:8',
                'password_confirm' => 'required|min:8|same:password'
            ], [
                'password.required' => 'Password is required.',
                'password_confirmation.same' => 'Password Confirmation should match the Password',
            ]);

            $user = User::find(Auth::user()->id);
            //$user->password(Hash::make($request->input('password')));
            var_dump(Hash::make($request->input('password')));die();
            $user->save();

            $info = "success";

        }
        return view('admin.security', [
            'info' => $info
            ]);
    }

}
