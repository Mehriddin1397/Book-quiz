<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class AdminController extends Controller{
    public function admin(){

        return view('admin.auth.login');
    }

    // Rolni tekshiradigan funksiya
    public function checkUserRole($requiredRole)
    {
        // Foydalanuvchini olish
        $user = auth()->user();

        // Agar foydalanuvchi mavjud bo'lsa va u kerakli rolga ega bo'lsa
        if ($user && $user->role == $requiredRole) {
            return true;
        }

        // Aks holda false qaytarish
        return false;
    }


    public function dashboard()
    {
        // Agar foydalanuvchi admin bo'lsa
        if ($this->checkUserRole('admin')) {
            return view('admin.dashboard');
        }

        // Aks holda kirish taqiqlanadi
        return redirect('/')->with('error', 'Sizda bu sahifaga kirish huquqi yo\'q');
//        return view('admin.dashboard');
    }
}
