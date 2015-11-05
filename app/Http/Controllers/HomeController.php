<?php namespace App\Http\Controllers;
use DB;
use Auth;
use App\Reservation;
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
		$films = DB::table('movies')
            ->join('repertoire','repertoire.movie_id','=','movies.id')
            ->join('reservations', 'reservations.repertoire_id','=','repertoire.id')
            ->where('movies.user_id',Auth::User()->id)
            ->get();
		$new = DB::table('reservations')->where('status',1)->count();
		$canceled = DB::table('reservations')->where('status',4)->count();
		$null = NULL;
		$unfinished = DB::table('reservations')->where('date_end','=',$null)->count();
		$notification = DB::table('reservations')->get();
        $settings = DB::table('users')
            ->where('id', Auth::user()->id)    
            ->get();
        $datachart = Reservation::all();
		$dates = $datachart->lists('date_start');
		$totals = $datachart->lists('id');
		
		return view('home')
		->with('films',$films)
		->with('catalog','users')
        ->with('folder','logos')        
     	->with('notifications',$notification)
        ->with('new',$new)
        ->with('canceled',$canceled)
        ->with('unfinished',$unfinished)
        ->with('settings',$settings)
        ->with('filepng',Auth::user()->id)
        ->with('filejpg',Auth::user()->id)
        ->with('dates',$dates)
		->with('totals',$totals);

	}
	
}
