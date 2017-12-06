<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Session;
use Auth;
class MainController extends Controller
{
	public function getIndex()
	{
		return view('page.homepage');
	}

	public function getRegister()
	{
		if(Auth::check())
			{
				return redirect()->route('homepage');
			}
			return view('page.register');
		}

		public static function checkInput($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		public function postRegister(Request $req)
		{

			$this->validate($req,
				[
					'email' => 'required|email|max:50|unique:users,email',
					'password' => 'required|min:6|max:20',
					'cpassword' => 'required|same:password',
					'username' => 'required|max:20|unique:users,username',
					'fullname' => 'required|max:30',
				],
				[
					'email.required' => 'Please enter your email',
					'email.email' => 'Please enter correct format email',
					'email.max' => 'Maximum is 50 character',
					'email.unique' => 'Email duplicate, try another address',
					'password.required' => 'Please enter password',
					'password.min' => 'Minimun is 6 character',
					'password.max' => 'Maximun is 20 character',
					'cpassword.required' => 'Please enter confirm password',
					'cpassword.same' => 'Confirm password incorrect, Try again',
					'username.required' => 'Please enter your username',
					'username.max' => 'Maximun is 20 character',
					'username.unique' => 'Username duplicate, try another username',
					'fullname.required' => 'Please enter your full name',
					'fullname.max' => 'Maximun is 30 character',

				]
			);

			$user = new User();
			$user->email = MainController::checkInput(strtolower($req->email));
			$user->password = Hash::make($req->password) ;
			$user->username = MainController::checkInput(strtolower($req->username));
			$user->fullname = MainController::checkInput($req->fullname) ;
			$user->aim = $req->aim;
			$user->save();
			return redirect()->back()->with('success','Register Successfully');
		}

		public function getLogin()
		{
			if(Auth::check())
				{
					return redirect()->route('homepage');
				}
				return view('page.login');
			}

			public function postLogin(Request $req){
				$this->validate($req,
					[
						'email'=>'required|email',
						'password'=>'required|min:6|max:20'
					]
				);
				$credentials = array('email'=>$req->email,'password'=>$req->password);


				if(Auth::attempt($credentials)){

					return redirect()->route('homepage');
				}
				else{
					return redirect()->back()->with(['message'=>'Incorrect account or password, Please try again.']);
				}
			}

			public function getLogout()
			{
				Auth::logout();
				return redirect()->route('homepage');
			}

		}
