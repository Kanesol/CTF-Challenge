<?php
/**
 * Created by PhpStorm.
 * User: redfernsolomon
 * Date: 14/09/15
 * Time: 4:05 PM
 */

namespace app\Http\Controllers;

use App\User;
use App\Game;
use App\Http\Controllers\Controller;


class GenericStaticController extends Controller
{


    public function contact () {
        return view("pages.contact");
    }

    public function about (){

        $name = 'Solomon';
        return view('pages.about')->with('name', $name);
    }


}