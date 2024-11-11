<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Config\Services;

class Auth extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }

    public function signup(): string
    {
        return view('auth/signup');
    }

    public function register()
    {
        // Get input data
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');



        // Validate inputs (you can add more validation as needed)
        if (empty($username) || empty($password) || empty($role)) {
            return redirect()->back()->with('error', 'All fields are required.');
        }



        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare user data
        $userData = [
            'username' => $username,
            'password' => $hashedPassword,
            'role' => $role,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Save the user to the database
        $userModel = new User();
        if ($userModel->save($userData)) {
            return redirect()->to('/auth')->with('success', 'User registered successfully!');
        } else {
            return redirect()->back()->with('error', 'There was an issue registering the user.');
        }
    }


    public function login()
    {
        $model = new User();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Check if user exists
        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // User is authenticated, store user data in session
            $session = Services::session();
            $session->set('user_id', $user['id']);
            $session->set('username', $user['username']);
            $session->set('role', $user['role']);

            return redirect()->to('/tickets');
        }

        // If authentication fails
        return redirect()->to('/auth')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        $session = Services::session();
        $session->destroy(); // Destroy session to log out

        return redirect()->to('/auth');
    }
}
