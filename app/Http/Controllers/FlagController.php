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
use File;
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
            $previously = Submitted_flag::select('user_id')->where('text', $request['flag'])->where('user_id', Auth::user()->id)->get();

            $previously = $previously->toArray();
            var_dump($previously);
            if(empty($previously))
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
            $message = 'You have previously submitted this flag!';
            return redirect('flags/submit')->with('message', $message);
            
        }

        $filename = "../storage/failed.csv";
        $content = Auth::user()->name . "," . $request['flag'] . "\n\r";
        $bytesWritten = File::append($filename, $content);
        if ($bytesWritten === false)
        {
            die("Couldn't write to the file.");
        }

        return redirect('flags/submit')->with('message', 'Incorrect, sorry try again!');
    }


}