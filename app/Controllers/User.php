<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('user/index', $data);
    }

    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        // Define validation rules
        $validationRules = [
            'username' => 'required|max_length[30]|min_length[3]',
            'email' => 'required|valid_email|max_length[100]|is_unique[users.email]',
            'password' => 'required|max_length[255]|min_length[8]',
            'passconf' => 'required|max_length[255]|matches[password]'
        ];

        // Load validation library and check validation
        if (!$this->validate($validationRules)) {
            // Validation failed, redirect back with input and errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

        try {
            $model->insert($data);
            return redirect()->to('/users')->with('message', 'User added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('errors', ['db_error' => 'An error occurred while saving the user. Please try again.']);
            // return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function edit($id = null)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('user/edit', $data);
    }

    public function update($id = null)
    {
        $model = new UserModel();
        if($this->request->getVar('password')) {
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
            ];
        } else {
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
            ];
        }

        $model->update($id, $data);
        return redirect()->to('/users');
    }

    public function delete($id = null)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/user');
    }
}
