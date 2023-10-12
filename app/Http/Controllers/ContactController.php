<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class ContactController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'contacts';
    }

    public function index(){
        $contacts = $this->database->getReference($this->tablename)->getValue();
        return response()->json($contacts);
    }
}
