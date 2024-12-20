<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class StudentController extends Controller
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }

    public function index()
    {
        $data['students'] = $this->studentModel->orderBy('id', 'DESC')->findAll();
        return view('students/index', $data);
    }

    public function new()
    {
        return view('students/add');
    }

    public function create()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'prenom' => $this->request->getPost('prenom'),
            'telephone' => $this->request->getPost('telephone'),
            'email' => $this->request->getPost('email'),
            'date_naissance' => $this->request->getPost('date_naissance'),
            'niveau_etudes' => $this->request->getPost('niveau_etudes')
        ];

        if ($this->studentModel->save($data)) {
            return redirect()->to('/students')->with('success', 'Étudiant ajouté avec succès');
        } else {
            return redirect()->back()
                ->with('errors', $this->studentModel->errors())
                ->withInput();
        }
    }

    public function edit($id = null)
    {
        if ($id === null) {
            return redirect()->to('/students');
        }

        $data['student'] = $this->studentModel->find($id);
        if (empty($data['student'])) {
            return redirect()->to('/students')->with('error', 'Étudiant non trouvé');
        }

        return view('students/edit', $data);
    }

    public function update($id = null)
    {
        if ($id === null) {
            return redirect()->to('/students');
        }

        $data = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'prenom' => $this->request->getPost('prenom'),
            'telephone' => $this->request->getPost('telephone'),
            'email' => $this->request->getPost('email'),
            'date_naissance' => $this->request->getPost('date_naissance'),
            'niveau_etudes' => $this->request->getPost('niveau_etudes')
        ];

        if ($this->studentModel->save($data)) {
            return redirect()->to('/students')->with('success', 'Étudiant mis à jour avec succès');
        } else {
            return redirect()->back()
                ->with('errors', $this->studentModel->errors())
                ->withInput();
        }
    }

    public function delete($id = null)
    {
        if ($id === null) {
            return redirect()->to('/students');
        }

        if ($this->studentModel->delete($id)) {
            return redirect()->to('/students')->with('success', 'Étudiant supprimé avec succès');
        }
        return redirect()->to('/students')->with('error', 'Erreur lors de la suppression');
    }
}
