<?php

namespace App\Http\Controllers;

use App\Models\Feeding;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function index(){

        $user = User::find(1);
        $user->delete();



        // ЕДНОСТАВНИ ПРИМЕРИ
        DB::table('posts')->insert([
            'title' => 'Post Ohrid 1',
        ]);

        DB::table('posts')
            ->where('title', 'LIKE', '%Ohrid%')
            ->delete();

        DB::table('posts')
            ->where('title', 'LIKE', '%Ohrid%')
            ->update([
                'content' => 'Ohrid Lake..'
            ]);

        // ПОКОМПЛЕКСЕН ПРИМЕР
        DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.created_at', '>=', '2020-01-01 00:00:00')
            ->select(['posts.id', 'posts.name', 'users.email'])
            ->orderBy('posts.created_at', 'DESC')
            ->limit(50)
            ->get();



        /// Relationsips
        /// 1. Slika Model
        /// 2. Da se opisi relacijata, belongTo primer
        /// 3. pr: type()
        ///    $model = Model::find(1);
        ///    $model->type
        ///

        $feeding = Feeding::find(1);
        $typeName = $feeding->type->name;
        // $feeding->type()->delete();






        return null;
    }
}
