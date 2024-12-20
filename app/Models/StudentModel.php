<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'prenom', 'telephone', 'email', 'date_naissance', 'niveau_etudes'];

    protected $validationRules = [
        'id' => 'permit_empty|is_natural_no_zero',
        'name' => [
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Le nom est obligatoire',
                'min_length' => 'Le nom doit contenir au moins 3 caractères'
            ]
        ],
        'prenom' => [
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Le prénom est obligatoire',
                'min_length' => 'Le prénom doit contenir au moins 3 caractères'
            ]
        ],
        'telephone' => [
            'rules' => 'required|min_length[10]|max_length[15]',
            'errors' => [
                'required' => 'Le numéro de téléphone est obligatoire',
                'min_length' => 'Le numéro doit contenir au moins 10 chiffres',
                'max_length' => 'Le numéro ne doit pas dépasser 15 chiffres'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[students.email,id,{id}]',
            'errors' => [
                'required' => 'L\'email est obligatoire',
                'valid_email' => 'Veuillez entrer une adresse email valide',
                'is_unique' => 'Cette adresse email est déjà utilisée'
            ]
        ],
        'date_naissance' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'La date de naissance est obligatoire',
                'valid_date' => 'Veuillez entrer une date valide'
            ]
        ],
        'niveau_etudes' => [
            'rules' => 'required|in_list[bac,bac+1,bac+2,bac+3,bac+4,bac+5]',
            'errors' => [
                'required' => 'Le niveau d\'études est obligatoire',
                'in_list' => 'Veuillez sélectionner un niveau d\'études valide'
            ]
        ]
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
