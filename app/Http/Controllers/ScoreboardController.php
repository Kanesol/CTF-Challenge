<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class ScoreboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function __construct () {
        $this->middleware('auth');
    }

    public function scoreboard (){

        $results = DB::table('Games')->select('start')->first();
        
        if( $results->start > Carbon::now() ){
            return view("pages.countdown");
        }

        $results = DB::select( DB::raw("select users.name as name, sum(challenges.point_value) as Total, submitted_flags.created_at as time from users
                                        inner join submitted_flags
                                        on submitted_flags.user_id = users.id
                                        inner join challenges
                                        on challenges.id = submitted_flags.challenge_id
                                        group by users.name
                                        order by Total DESC, submitted_flags.created_at "));

        $game = Game::first();

        $startd = DB::table('Games')->select('start')->first();
        if( $startd->start > Carbon::now() ){
            $start = true;
        }else{
            $start = false;
        }


        $data = array('game' => $game, 'scores'=> $results, 'start' => $start);

        return view('pages.scoreboard')->with('data', $data);
    }
}
