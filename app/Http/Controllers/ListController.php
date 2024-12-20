<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\User;
use Inertia\Inertia;


class ListController extends Controller
{
    public function index()
    {
        $search = Request::input('search');
        if ($search)
        {
            $users = User::select('id','first_name','last_name','username')
            ->where('first_name','like','%'.$search.'%')
            ->orWhere('last_name','like','%'.$search.'%')
            ->orWhere('username','like','%'.$search.'%')
            ->paginate(15)
            ->withQueryString();

        }
        else
        {
            $users = User::select('id','first_name','last_name','username')->paginate(15);
        }
        Return inertia::render('Users',['users'=>$users, 'filters'=>Request::only(['search']) ]);
    }

    public function remove_users()
    {
        $user_ids = request('users');
        if (!empty($user_ids) && is_array($user_ids))
        {
            User::destroy($user_ids);
        }
        return redirect('/users');
    }
}
