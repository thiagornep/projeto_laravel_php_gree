<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexLogin()
    {
        return view('login');
    }

    public function checkLogin(Request $request)
    {
        $user = User::where('email', '=', $request->input('email'))->get();        

        if(count($user) > 0) {   
            if($request->input('senha') === $user[0]["senha"]) {
                $request->session()->put('email', $request->input('email'));
                echo json_encode(array("status" => "success", "value" => "/home"));
            } else {
                echo json_encode(array("status" => "fail", "value" => "Senha Invalida"));
            }
        } else {
            echo json_encode(array("status" => "fail", "value" => "E-mail Inexistente na base de dados"));
        }
        
    }

    public function indexHome(Request $request)
    {
        if($request->session()->has('email')) {
            return view('home');
        }
        return redirect()->to('/');
    }

    public function registerLogin(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'senha' => $request->input('senha'),
        ]);
        
        if($user) {
            echo json_encode("Cadastro realizado com sucesso");
        } else {
            echo json_encode("Erro ao efetuar o cadastro");  
        }
    }

    public function indexList(Request $request)
    {
        if($request->session()->has('email')) {
            $users = User::simplePaginate(10);
            return view('list', ["users" => $users]);
        }

        return redirect()->to('/');
    }

    public function update(User $user, Request $request)
    {
        $user->name =  $request->input('name');
        $user->email = $request->input('email');
        $user->senha = $request->input('senha');
        $user->save();

        echo '<script> alert ("Alterado com sucesso"); location.href=("http://127.0.0.1:8000/home/lista");</script>';
    }

    public function delete(User $user)
    {
        $user->delete();

        echo '<script> alert ("Excluido com sucesso"); location.href=("http://127.0.0.1:8000/home/lista");</script>';

    }

    public function logout(Request $request)
    {
        $request->session()->forget('email');
        return redirect()->to('/');
    }
}
