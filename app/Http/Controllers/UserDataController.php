<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserDataController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Filter untuk pengguna dengan level 'user'
        $query->where('level', 'user');

        // Filter pencarian berdasarkan nama, email, atau alamat
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('address', 'like', '%' . $request->search . '%');
            });
        }

        // Ambil data yang difilter dengan pagination
        $users = $query->paginate(10);

        // Susun data yang akan diteruskan ke view
        $data = [
            'title' => 'User Data',
            'users' => $users,
        ];

        return view('admin.userdata.index', $data);
    }


}