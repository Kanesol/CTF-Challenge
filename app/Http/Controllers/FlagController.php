<?php
/**
 * Created by PhpStorm.
 * User: redfernsolomon
 * Date: 14/09/15
 * Time: 6:46 PM
 */

namespace app\Http\Controllers;

use App\Category;
use App\Game;
use App\Submitted_flag;
use App\Flag;
use App\User;
use App\Challenge;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\SubmitFlagRequest;

class FlagController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }

    public function submit (){

        return view('flags.submit');
    }

    public function store (SubmitFlagRequest $request){

        $request = $request->all();
        $flags = Flag::where('flag', $request['flag'])->first();

        if(!empty($flags))
        {
            $flags = $flags->toArray();
            $submission['created_at'] = Carbon::now()->toDateTimeString();
            $submission['updated_at'] = Carbon::now()->toDateTimeString();
            $submission['user_id'] = Auth::user()->id;
            $submission['challenge_id'] = $flags['challenge_id']; //to do yo
            $submission['text'] = $request['flag'];

            Submitted_flag::create($submission);
            return redirect('flags/submit')->with('message', 'Correct!');
        }


        return redirect('flags/submit')->with('message', 'Incorrect, sorry try again!');
    }


}