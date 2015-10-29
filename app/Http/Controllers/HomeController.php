<?php namespace App\Http\Controllers;
use DB;
use Auth;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pokazz = DB::table('reservations')->count();
		$pokaz = DB::table('reservations')->get();
        $stetting2 = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
            
		return view('glownastrona')->with('katalog','users')
        ->with('folder','logos')
        ->with('plikjpg',Auth::user()->id)
     	->with('pokaz',$pokaz)
        ->with('pokazz',$pokazz)
        ->with('stetting2',$stetting2)
        ->with('plikpng',Auth::user()->id);
	}
	
}
