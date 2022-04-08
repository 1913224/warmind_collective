<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        echo view('Wcbase/header');
        echo view('pages/home');
        echo view('Wcbase/footer');
    }

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        
        $data['title'] = ucfirst($page); // Capitalize the first letter

        echo view('Wcbase/header', $data);
        echo view('pages/' . $page, $data);
        echo view('Wcbase/footer', $data);
    }
}