<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketResponse extends Model
{
    protected $table            = 'ticket_responses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['ticket_id', 'user_id', 'answer', 'created_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Get responses with user details
    public function getResponsesWithUser($ticketId)
    {
        return $this->select('ticket_responses.*, users.username, users.role')  // select user data along with ticket responses
            ->join('users', 'users.id = ticket_responses.user_id')  // join users table on user_id
            ->where('ticket_responses.ticket_id', $ticketId)  // filter by ticket_id
            ->findAll();  // return all results
    }
}
