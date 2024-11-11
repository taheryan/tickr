<?php

namespace App\Controllers;

use App\Models\Ticket;
use App\Models\TicketResponse;
use App\Models\User;

class Tickets extends BaseController
{
    public function index(): string
    {
        // $tickets = [
        //     [
        //         'id'        => 1,
        //         'title'     => 'Issue with login',
        //         'question'  => 'I am unable to log into my account. Please assist.',
        //         'status'    => 'open',
        //         'created_at'=> '2024-10-01 10:30:00',
        //     ],
        //     [
        //         'id'        => 2,
        //         'title'     => 'Payment not processed',
        //         'question'  => 'My payment failed when trying to make a purchase.',
        //         'status'    => 'closed',
        //         'created_at'=> '2024-10-02 15:45:00',
        //     ],
        //     [
        //         'id'        => 3,
        //         'title'     => 'Page not loading',
        //         'question'  => 'The website is not loading correctly in my browser.',
        //         'status'    => 'open',
        //         'created_at'=> '2024-10-03 09:00:00',
        //     ],
        //     [
        //         'id'        => 4,
        //         'title'     => 'Feature request',
        //         'question'  => 'Can you add a dark mode to the app?',
        //         'status'    => 'closed',
        //         'created_at'=> '2024-10-04 14:30:00',
        //     ],
        // ];

        $ticketModel = new Ticket();

        // Retrieve all tickets from the database (you can modify the query if needed)
        $tickets = $ticketModel->orderBy('created_at', 'asc')->findAll();  // You can add conditions like ->where('user_id', $userId) if you want to filter by user


        return view('tickets/view_tickets', ['tickets' => $tickets]);
    }

    public function NewTicket(): string
    {
        return view("tickets/new_ticket");
    }

    public function store()
    {
        // Get the request object to access input data
        // $request = \Config\Services::request();

        // // Validate the form data
        // if (!$this->validate([
        //     'title' => 'required|min_length[3]|max_length[255]',
        //     'description' => 'required|min_length[10]',
        //     'attachment' => 'uploaded[attachment]|max_size[attachment,10240]|ext_in[attachment,jpg,jpeg,png,pdf]', // File validation
        // ])) {
        //     // If validation fails, return with error messages
        //     return redirect()->to('/tickr/create')->withInput()->with('errors', $this->validator->getErrors());
        // }

        // Handle the file upload
        $attachment = $this->request->getFile('attachment');
        $attachmentPath = null;

        if ($attachment->isValid() && !$attachment->hasMoved()) {
            // Set the upload path
            $attachmentPath = 'uploads/tickets/' . $attachment->getName();

            // Move the file to the desired location
            $attachment->move(WRITEPATH . 'uploads/tickets', $attachment->getName());
        }

        $session = session();  // or $this->session if using the Controller class

        // Retrieve the user_id from the session
        $userId = $session->get('user_id');

        // Prepare ticket data
        $ticketData = [
            'title' => $this->request->getPost('title'),
            'question' => $this->request->getPost('question'),
            'status' => 'open',  // Assuming the default status is 'open'
            'attachment' => $attachmentPath, // Save the file path
            'user_id' => $userId
        ];

        // Save the ticket using the model
        $ticketModel = new Ticket();
        $ticketModel->save($ticketData);

        // Redirect to a success page or back to the ticket list
        return redirect()->to('/tickets')->with('success', 'Ticket created successfully!');
    }

    public function view($ticketId)
    {
        $ticketModel = new Ticket();
        $userModel = new User();
        $ticketResponse = new TicketResponse();
        // // Find the ticket by its ID
        $ticket = $ticketModel->find($ticketId);
        $user = $userModel->getUserById($ticket['user_id']);

        // Fetch all responses for the specific ticket
        // $responses = $ticketResponse->where('ticket_id', $ticketId)->findAll();
        $responses = $ticketResponse->getResponsesWithUser($ticketId);

        // // Check if the ticket exists
        // if (!$ticket) {
        //     // Ticket not found
        //     return redirect()->to('/tickets')->with('error', 'Ticket not found');
        // }

        // $ticket = [
        //     [
        //         'author_name' => 'John Doe',
        //         'message' => 'I am unable to log in. It gives an error when I try to submit my credentials.',
        //         'created_at' => '2024-11-01 10:30:00',
        //         'avatar_url' => 'path_to_avatar1.jpg'
        //     ],
        //     [
        //         'author_name' => 'Support Team',
        //         'message' => 'Thank you for reaching out. We are looking into the issue and will get back to you shortly.',
        //         'created_at' => '2024-11-01 11:00:00',
        //         'avatar_url' => 'path_to_avatar2.jpg'
        //     ]
        // ];


        // Pass the ticket data to the view
        return view('tickets/single_ticket', ['ticket' => $ticket, 'user' => $user, 'responses' => $responses]);
    }


    public function respond($ticketId)
    {
        // Validate the response
        // $validation = \Config\Services::validation();
        // $validation->setRules([
        //     'response' => 'required|string|min_length[10]',
        // ]);

        // if (!$this->validate($validation->getRules())) {
        //     // If validation fails, redirect back with errors
        //     return redirect()->back()->withInput()->with('error', 'پاسخ باید حداقل 10 کاراکتر باشد.');
        // }

        // Get the current user ID (assuming it's stored in session or similar)
        $userId = session()->get('user_id');  // Replace this with actual user session retrieval

        // Save the response
        $ticketResponseModel = new TicketResponse();
        $ticketResponseModel->insert([
            'ticket_id' => $ticketId,
            'user_id'   => $userId,
            'answer'    => $this->request->getPost('response'),
        ]);

        // Redirect to the ticket view page with a success message
        return redirect()->to('/tickets/view/'.$ticketId)->with('success', 'پاسخ شما با موفقیت ارسال شد.');
    }
}
