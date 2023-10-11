<?php

namespace App\Http\Controllers;

use App\Domain\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();
        return view('users.index', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        if ($user) {
            return view('users.edit', ['user' => $user]);
        } else {
            return redirect()->route('users.index')->with('error', 'User with ID ' . $id . ' not found.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|integer',
        ]);
        
        $data = $request->only(['name', 'email', 'age']);
        if ($this->userRepository->update($id, $data)) {
            return redirect()->route('users.index')->with('success', 'User with ID ' . $id . ' Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Failed to update user with ID ' . $id);
        }
    }

    public function destroy($id)
    {
        if ($this->userRepository->delete($id)) {
            return redirect()->route('users.index')->with('success', 'User with ID ' . $id . ' Deletado com sucesso!');
        } else {
            return back()->with('error', 'Failed to delete user with ID ' . $id);
        }
    }
}

?>