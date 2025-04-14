<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        echo "<h1>Ini halaman dashboard</h1>";
        echo "<a href='" . base_url('auth/logout') . "'>Log out</a>";
    }
}
