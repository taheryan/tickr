<?php

namespace App\Models;

use CodeIgniter\Model;

class Ticket extends Model
{
    protected $table      = 'tickets';    // The table name
    protected $primaryKey = 'id';         // Primary key
    protected $allowedFields = ['title', 'question', 'status', 'department', 'attachment', 'user_id']; // Fields to be inserted

    protected $useTimestamps = true;      // Automatically handles created_at and updated_at fields
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Optionally, set validation rules
    // protected $validationRules = [
    //     'title'       => 'required|min_length[3]|max_length[255]',
    //     'description' => 'required|min_length[10]',
    // ];
}
