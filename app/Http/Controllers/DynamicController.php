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
use App\User;
use App\Challenge;
use App\Http\Controllers\Controller;
use Auth;
use Storage;

class DynamicController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }

    public function index () {
        
        $num_users = User::count();
        $completed = Submitted_flag::count();
        $num_challenges = Challenge::count();




        $average_c = ( $completed / $num_users) / $num_challenges * 100;


        $stats = array('num_users' => $num_users, 'completed' => $completed, 'average' => (int)$average_c);

        $game = Game::first();
        $categories = Category::get();
        $categories = $categories->toArray();



        foreach($categories as $category)
        {
            $challenges = Challenge::where('category_id', $category['id'])->get()->toArray();
            $categories[(int)$category['id'] - 1]['challenges'] =  $challenges;
        }
        $directory = base_path().'/public/Challenges_Repo/';
        $files = scandir($directory);


        $data = array('user' => Auth::user() , 'game' => $game, 'categories' => $categories,'stats' => $stats, 'files' => $files);

        return view("pages.index")->with('data', $data);
    }


    public function challenges () {
        /*$game = Game::first();
        $categories = Category::get();
        $categories = $categories->toArray();

        foreach($categories as $category)
        {
            $challenges = Challenge::where('category_id', $category['id'])->get()->toArray();
            $categories[(int)$category['id'] - 1]['challenges'] =  $challenges;
        }


        $data = array('game' => $game, 'categories' => $categories);*/
                $num_users = User::count();
        $completed = Submitted_flag::count();
        $num_challenges = Challenge::count();

        $average_c = ( $completed / $num_users) / $num_challenges * 100;

        $stats = array('num_users' => $num_users, 'completed' => $completed, 'average' => $average_c);

        $game = Game::first();
        $categories = Category::get();
        $categories = $categories->toArray();



        foreach($categories as $category)
        {
            $challenges = Challenge::where('category_id', $category['id'])->get()->toArray();
            $categories[(int)$category['id'] - 1]['challenges'] =  $challenges;
        }
        $directory = base_path().'/public/Challenges_Repo/';
        $files = scandir($directory);


        $data = array('user' => Auth::user() , 'game' => $game, 'categories' => $categories, 'stats' => $stats, 'files' => $files);

        
        return view("pages.challenges")->with('data', $data);
    }


}