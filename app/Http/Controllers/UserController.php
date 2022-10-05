<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use PharIo\Manifest\Application;
use Yajra\DataTables\DataTables;
class UserController extends Controller
{
    public function apiIndex(): jsonResponse
    {
        $builder = User::query();
            return Datatables::of($builder)->make();

    }
    public function apiNotes(request $request): jsonResponse
    {
        $builder = Note::Query()
            ->where('user_id', $request['id'])
            ->orderByDesc('id');
        return Datatables::of($builder)->make();
    }

    public function index(): Factory|View|Application
    {
        return view('users/index');
    }

    public function view(Request $request) : Factory|View|Application
    {
        $user = user::query()->find($request['id']);

        return \view('users.view', [
            'user'=>$user
      ]);
    }

    public function add(Request $request): Factory|View|Application|RedirectResponse
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'name' => 'required|min:6|max:100',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|min:6|max:100',
                'password' => 'required|min:4|max:100|confirmed',
            ]);

            $user = User::query()->create([
               'name'=> $data['name'],
               'email'=> $data['email'],
               'username' => $data['username'],
               'password' =>Hash::make($data['password']),
            ]);

            return redirect()->route('users.view', $user['id']);
        }

        return \view('users.add');


    }

    public function edit(Request $request):Factory|View|Application|RedirectResponse
    {
        $user = User::query()->find($request['id']);

        if(empty($user)){
            redirect()->route('users.index');
        }

        if($request->isMethod('post')){
            $data = $request->validate([
               'name' => 'required|min:6|max:100',
               'email' => 'required|email',
               'username' => 'required',
            ]);

            if($user['email'] != $data['email']){
                $userWithEmail = User::query()
                    ->select('id')
                    ->where('email', $data['email'])
                    ->exists();
                if ($userWithEmail){
                    return redirect()
                        ->back()
                        ->withInput($request->post());
                }
            }

            $user->update($data);
            return redirect()->route('users.view' , $user['id']);
        }
        return \view('users.edit' , compact('user'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->destroy($id);
        return redirect()->route('users.index');

    }
}
