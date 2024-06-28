<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Controller;

class Employee extends Controller
{
    public function index()
    {
        $model = new EmployeeModel();
        $data['employees'] = $model->findAll();
        return view('employee/index', $data);
    }

    public function create()
    {
        return view('employee/create');
    }

    public function store()
    {
        // Define validation rules
        $validationRules = [
            'fname' => 'required|alpha_space|max_length[50]',
            'lname' => 'required|alpha_space|max_length[50]',
            'position' => 'required|string|max_length[100]',
            'department' => 'required|string|max_length[100]',
            'salary' => 'required|decimal|greater_than[0]',
            'birthdate' => 'required|valid_date',
            'email' => 'required|valid_email|max_length[100]|is_unique[employees.email]',
            'phone' => 'required|numeric|max_length[15]',
            'address' => 'required|string',
            'zipcode' => 'required|numeric|max_length[10]',
            // 'photo' => 'uploaded[photo]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg]|max_size[photo,300]'
            'photo' => 'max_size[photo,300]'
        ];

        // Load validation library and check validation
        if (!$this->validate($validationRules)) {
            // Validation failed, redirect back with input and errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new EmployeeModel();
        $img = $this->request->getFile('photo');
        $newName = $img->getRandomName();
        $img->move(WRITEPATH . 'uploads', $newName);

        $data = [
            'fname' => $this->request->getPost('fname'),
            'lname' => $this->request->getPost('lname'),
            'position' => $this->request->getPost('position'),
            'department' => $this->request->getPost('department'),
            'salary' => $this->request->getPost('salary'),
            'birthdate' => $this->request->getPost('birthdate'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'zipcode' => $this->request->getPost('zipcode'),
            'photo' => $newName,
        ];

        try {
            $model->insert($data);
            return redirect()->to('/employees')->with('message', 'Employee added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('errors', ['db_error' => 'An error occurred while saving the employee. Please try again.']);
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function edit($id = null)
    {
        $model = new EmployeeModel();
        $data['employee'] = $model->find($id);
        return view('employee/edit', $data);
    }

    public function update($id = null)
    {
        $model = new EmployeeModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
        ];

        $img = $this->request->getFile('photo');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads', $newName);
            $data['photo'] = $newName;
        }

        $data['fname'] = $this->request->getPost('fname');
        $data['lname'] = $this->request->getPost('lname');
        $data['position'] = $this->request->getPost('position');
        $data['department'] = $this->request->getPost('department');
        $data['salary'] = $this->request->getPost('salary');
        $data['birthdate'] = $this->request->getPost('birthdate');
        $data['email'] = $this->request->getPost('email');
        $data['phone'] = $this->request->getPost('phone');
        $data['address'] = $this->request->getPost('address');
        $data['zipcode'] = $this->request->getPost('zipcode');

        $model->update($id, $data);
        return redirect()->to('/employees');
    }

    public function delete($id = null)
    {
        $model = new EmployeeModel();
        $model->delete($id);
        return redirect()->to('/employees');
    }
}
