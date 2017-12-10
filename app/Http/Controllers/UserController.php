<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Session;
use Auth;
use App\Http\Controllers\MainController;
use App\Program; 
use App\Practice;
use DB;
use App\Blog;
use Carbon\Carbon;
use DateTime;
use App\Included;
use App\Action;
use App\Completed;
use App\Training;
use App\Blogs_Comment;
use App\Like;
use App\Comment_Program;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getProfile($username)
	{
		$profile = User::where('username','=',$username)->get();
		return view('page.profile',compact('profile'));
	}

	public function updateProfile(Request $req)
	{
		$this->validate($req,
			[
				'fullname' => 'required|max:30',
				'address' => 'required|max:50',
				'weight' => 'required|',
				'job' => 'required|max:50',
			]);

		$birth = $req->yyyy . "-" . $req->mm . "-". $req->dd;
		$user = new User();
		$user = $user->find($req->id);

		$user->fullname = MainController::checkInput($req->fullname) ;
		$user->birth = $birth;
		$user->aim = MainController::checkInput($req->aim) ;
		$user->address = MainController::checkInput($req->address) ;
		$user->weight = MainController::checkInput($req->weight) ;
		$user->job = MainController::checkInput($req->job) ;
		
		$user->save();

		return redirect()->back()->with('success','Update Successfully');
	}

	public function getMyPage($username)	
	{
		if(Auth::user()->aim == 2) {
			return redirect()->route('all_programs');
		}
		$id_user = Auth::user()->id ;
		// //$practice = Practice::where('id_user',$id_user)->pluck('id_program')->toArray();
		// $program = Practice::where('id_user',$id_user)->get();
		// 	// ->programs()->paginate(5);
		// var_dump($program);
		// exit;

		$count_program = count(DB::table('practice')
			->join('programs', 'practice.id_program', '=', 'programs.id')
			->where('practice.id_user',$id_user)
			->select('programs.*')
			->get()); 
		
		$program = DB::table('practice')
		->join('programs', 'practice.id_program', '=', 'programs.id')
		->where('practice.id_user',$id_user)
		->select('programs.*')
		->orderBy('created_at','desc')
		->paginate(3);


		$coach = DB::table('training')
		->join('users', 'training.id_user', '=', 'users.id')
		->select('users.fullname','training.id_program','users.id')
		->get();


		if($program->isEmpty())
		{
			return view('page.mypage',compact('username'));
		}
		else {
			return view('page.mypage',compact('username','program','coach','count_program'));
		}
	}

	public function search(Request $req)
	{
		$id = Auth::user()->id;

		$age = $req->age;
		$weight = $req->weight;
		$height = $req->height;



		if(($age <= 40) && ($weight >= $height-100 + 10)) {
			$program = Program::where('level',3)->paginate(5);
			$program_qty = Program::where('level',3)->get();
			$result_count = count($program_qty);

			$coach = DB::table('training')
			->join('users', 'training.id_user', '=', 'users.id')
			->join('programs', 'training.id_program', '=', 'programs.id')
			->where('programs.level',3)
			->select('users.fullname','training.id_program','users.id')
			->get();


			$idUser = Auth::user()->id;
			$practice = Practice::where('id_user',$idUser)->get();

			return view('page.search_programs',compact(['program','result_count','coach','practice']));
		} else if ($age > 50) {
			$program = Program::where('level',1)->paginate(5);
			$program_qty = Program::where('level',1)->get();
			$result_count = count($program_qty);

			$coach = DB::table('training')
			->join('users', 'training.id_user', '=', 'users.id')
			->join('programs', 'training.id_program', '=', 'programs.id')
			->where('programs.level',1)
			->select('users.fullname','training.id_program','users.id')
			->get();

			$idUser = Auth::user()->id;
			$practice = Practice::where('id_user',$idUser)->get();
			return view('page.search_programs',compact(['program','result_count','coach','practice']));
		} else {
			$program = Program::where('level',2)->paginate(5);
			$program_qty = Program::where('level',2)->get();
			$result_count = count($program_qty);

			$coach = DB::table('training')
			->join('users', 'training.id_user', '=', 'users.id')
			->join('programs', 'training.id_program', '=', 'programs.id')
			->where('programs.level',2)
			->select('users.fullname','training.id_program','users.id')
			->get();

			$idUser = Auth::user()->id;
			$practice = Practice::where('id_user',$idUser)->get();
			return view('page.search_programs',compact(['program','result_count','coach','practice']));
		}

	}

	public function subscribe($id)
	{
		$practice = new Practice();
		$practice->id_user = Auth::user()->id;
		$practice->id_program = $id;
		$practice->save();

		return redirect()->route('mypage',Auth::user()->username);

	}

	public function getMyBlog($username)
	{
		$id = Auth::user()->id;
		$count = count(Blog::where('id_user',$id)->get());

		$comments_blogs = DB::table('blogs_comments')
		->join('blogs', 'blogs_comments.id_blog', '=', 'blogs.id')
		->where('blogs.id_user','=',$id)
		->get();

		$blog = Blog::where('id_user',$id)->orderBy('created_at', 'desc')->paginate(3); 
		return view('page.my_blog',compact(['blog','count','comments_blogs']));
	}

	public function postBlog(Request $req)
	{
		$id = Auth::user()->id;
		$blog = new Blog();
		$blog->title = $req->title;
		$blog->content = $req->content;
		$blog->id_user = $id;
		$blog->save();
		return redirect()->route('myblog',Auth::user()->username);
	}


	public function showProgramDetail($id)
	{
		$p = Program::where('id',$id)->get();
		$idUser = Auth::user()->id;
		$practice = Practice::where('id_user',$idUser)->where('id_program',$id)->get();
		$idPractice = $practice[0]->id;
		// $id_action = Included::where('id_program',$id)->pluck('id_action')->toArray();
		$completed_time = $practice[0]->completed_time;

		$action = Action::where('id_program',$id)->get();
		$action_completed = Completed::where('id_practice',$idPractice)->get();

		if((count($action) == count($action_completed)) && $completed_time == "" ) {
			$currentTime = new DateTime();
			$interval = $practice[0]->updated_at->diff($currentTime);
			$practice[0]->completed_time = $interval->format('%d days %H hours %i minutes %s seconds');
			$practice[0]-> touch();
		}

		return view('page.program_detail',compact(['p','practice','action','action_completed']));
	}

	public function startProgram($idProgram)
	{
		$idUser = Auth::user()->id;
		$p = Program::where('id',$idProgram)->get();
		$practice = Practice::where('id_user',$idUser)->where('id_program',$idProgram)->get();
		// $start_time = Carbon::now()->toDateTimeString();
		// 

		$start_time = new DateTime();
		// $start_time2 = $start_time2->format('Y-m-d H:i:s');
		// echo $start_time . $start_time2;exit;
		$practice[0]->updated_at = $start_time->format('Y-m-d H:i:s');
		$practice[0]-> touch();
		return redirect()->route('show_program_detail',$idProgram);
		
	}

	// public function programDetail($idProgram,$startTime)
	// {
	// 	$p = Program::where('id',$idProgram);
	// 	echo $startTime;
	// 	exit;
	// 	return view('page.program_detail',compact(['p','startTime']));

	// }
	public function completedActions(Request $req,$idProgram)
	{
		$idUser = Auth::user()->id;
		$practice = Practice::where('id_user',$idUser)->where('id_program',$idProgram)->get();
		$idPractice = $practice[0]->id;

		$length = count($req->action_completed);

		for ($i=0; $i < $length; $i++) {
			$completed = new Completed(); 
			$completed->id_practice = $idPractice;
			$completed->id_action = $req->action_completed[$i];
			$completed->save();
		}

		return redirect()->back();		
	}

	public function getAllPrograms()
	{
		$program = Program::all();
		$count = count($program);
		$program = Program::paginate(5);
		//$idProgram = Program::all()->pluck('id')->toArray();
		// $arrayCoach = Training::whereIn('id_program',$idProgram)->pluck('id_user')->toArray();

		
		$coach = DB::table('training')
		->join('users', 'training.id_user', '=', 'users.id')
		->select('users.fullname','training.id_program','users.id')
		->get();


		$idUser = Auth::user()->id;
		$practice = Practice::where('id_user',$idUser)->get();

		$like = Like::all();
		$comment = Comment_Program::all();

		return view('page.all_programs',compact(['program','practice','coach','count','like','comment']));
	}

	public function getInfoProgram($idProgram)
	{
		$p = Program::where('id',$idProgram)->get();
		$idUser = Auth::user()->id;
		$practice = Practice::where('id_user',$idUser)->where('id_program',$idProgram)->get();
		$practiced = (count($practice) != 0) ? true : false;
		// $idPractice = $practice[0]->id;
		// $id_action = Included::where('id_program',$id)->pluck('id_action')->toArray();
		// $completed_time = $practice[0]->completed_time;

		$action = Action::where('id_program',$idProgram)->get();

		$coach = DB::table('training')
		->join('users', 'training.id_user', '=', 'users.id')
		->select('users.fullname','training.id_program','users.id')
		->get();

		$like = Like::where('id_program',$idProgram)->get();

		$count = count(Comment_Program::where('id_program',$idProgram)->get());

		$comments_programs = DB::table('comments')
		->join('users', 'comments.id_user', '=', 'users.id')
		->where('comments.id_program', '=', $idProgram)
		->select('comments.*','users.fullname')
		->orderBy('comments.created_at','desc')
		->paginate(5);


		// $action_completed = Completed::where('id_practice',$idPractice)->get();

		// if((count($action) == count($action_completed)) && $completed_time == "" ) {
		// 	$currentTime = new DateTime();
		// 	$interval = $practice[0]->updated_at->diff($currentTime);
		// 	$practice[0]->completed_time = $interval->format('%d days %H hours %i minutes %s seconds');
		// 	$practice[0]-> touch();
		// }

		return view('page.info_program',compact(['p','action','practiced','coach','like','comments_programs','count']));
	}


	public function getInfoCoach($idCoach)
	{

		$training = DB::table('training')
		->join('programs', 'training.id_program', '=', 'programs.id')
		->join('users', 'training.id_user', '=', 'users.id')
		->where('training.id_user',$idCoach)
		->paginate(3);

		if(count($training) == 0) {
			$message = 'This coach has not yet registered for any courses';
			return view('page.info_coach',compact(['message']));
		}

		$idProgram = Training::where('id_user',$idCoach)->pluck('id_program')->toArray();

		$coach = DB::table('training')
		->join('users', 'training.id_user', '=', 'users.id')
		->select('users.fullname','training.id_program','users.id')
		->get();

		$idUser = Auth::user()->id;
		$practice = Practice::where('id_user',$idUser)->get();

		return view('page.info_coach',compact(['training','coach','practice']));
	}

	public function getAllBlogs()
	{
		$count = count(Blog::all()); 
		$user_blog = DB::table('blogs')
		->join('users', 'blogs.id_user', '=', 'users.id')
		->orderBy('blogs.created_at','desc')
		->select('blogs.*','users.fullname')
		->paginate(5);

		$comments_blogs = DB::table('blogs_comments')
		->join('blogs', 'blogs_comments.id_blog', '=', 'blogs.id')
		->get();


		return view('page.all_blogs',compact(['user_blog','count','comments_blogs']));
	}

	public function getDetailBlog($id)
	{
		$blog = Blog::where('id',$id)->get();
		$idUser = $blog[0]->id_user;
		$user = User::where('id',$idUser)->get();

		$count = count(DB::table('blogs_comments')
			->join('users', 'blogs_comments.id_user', '=', 'users.id')
			->where('blogs_comments.id_blog', '=', $id)->get());

		$comments_blogs = DB::table('blogs_comments')
		->join('users', 'blogs_comments.id_user', '=', 'users.id')
		->where('blogs_comments.id_blog', '=', $id)
		->select('blogs_comments.*','users.fullname')
		->orderBy('blogs_comments.created_at','desc')
		->paginate(5);
		// var_dump($comments_blogs);exit;

		return view('page.detail_blog',compact(['blog','comments_blogs','user','count']));
	}

	public function commentBlog(Request $req, $id)
	{
		$idUser = Auth::user()->id;
		$idBlog = $id;

		$this->validate($req,[
			'content' => 'required'
		]);

		$blogs_comment = new Blogs_Comment();
		$blogs_comment->id_user = $idUser;
		$blogs_comment->id_blog = $idBlog;
		$blogs_comment->content = $req->content;
		$blogs_comment->save();
		return redirect()->back();

	}

	public function likeProgram($id)
	{
		$idUser = Auth::user()->id;
		$idProgram = $id;
		$like = new Like();
		$like->id_user = $idUser;
		$like->id_program = $idProgram;
		$like->save();
		return redirect()->back();
	}

	public function commentProgram(Request $req,$id)		
	{
		$idUser = Auth::user()->id;
		$idProgram = $id;

		$this->validate($req,[
			'content' => 'required'
		]);

		$program_comment = new Comment_Program();
		$program_comment->id_user = $idUser;
		$program_comment->id_program = $idProgram;
		$program_comment->content = $req->content;
		$program_comment->save();
		return redirect()->back();
	}

	public function getTopLike()
	{
		$program = Program::all();
		$count = count($program);

		$program = DB::table('likes')
		->join('programs', 'likes.id_program', '=', 'programs.id')
		->select('programs.*',\DB::raw("COUNT('likes.id_program') AS like_count"))
		->orderBy('like_count', 'desc')
		->groupBy('likes.id_program','programs.id','programs.title','programs.image','programs.level')
		->get();

		
		$coach = DB::table('training')
		->join('users', 'training.id_user', '=', 'users.id')
		->select('users.fullname','training.id_program','users.id')
		->get();


		$idUser = Auth::user()->id;
		$practice = Practice::where('id_user',$idUser)->get();

		$like = Like::all();
		$comment = Comment_Program::all();

		return view('page.top_like',compact(['program','practice','coach','count','like','comment']));
	}

	// public function getAllCoachs()
	// {
	// 	$coachs = User::whereIn('aim',[2,3])->paginate();
	// 	return view('page.all_coachs',compact(['coachs']));
	// }

	public function showFormRegisterLesson()
	{
		$programs_hard = Program::where('level',3)->orderBy('title','asc')->get();
		$programs_medium = Program::where('level',2)->orderBy('title','asc')->get();
		$programs_light = Program::where('level',1)->orderBy('title','asc')->get();

		$idUser = Auth::user()->id;
		$trainings = Training::where('id_user',$idUser)->get();
		return view('page.show_form_register_lesson',
			compact(['programs_hard','programs_medium','programs_light','trainings']));

	}

	public function registerLesson(Request $request)
	{
		$countLesson = count($request->register_lesson);
		if($countLesson == 0) {
			return redirect()->route('show_form_register_lesson')->with('failed','Register failed');
		}
		$idUser = Auth::user()->id;
		

		for ($i=0; $i < $countLesson; $i++) { 
			$training = new Training();
			$training->id_user = $idUser;
			$training->id_program = $request->register_lesson[$i];
			$training->save();
		}

		return redirect()->route('show_form_register_lesson')->with('success','Register successfuly');

	}

	public function getAllCoachs()
	{
		$coachs = User::where('aim','<>', 1)->orderBy('fullname','asc')->paginate(5);
		return view('page.all_coachs',compact(['coachs']));

	}

}
