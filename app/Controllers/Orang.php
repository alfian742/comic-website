<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrangModel;

class Orang extends BaseController
{
    protected $orangModel;

    public function __construct()
    {
        $this->orangModel = new OrangModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->orangModel->search($keyword);
        } else {
            $this->orangModel->findAll();
        }

        $data = [
            'title'         => 'Poeple List',
            'orang'         => $this->orangModel->orderBy('nama', 'ASC')->paginate(10, 'orang'),
            'pager'         => $this->orangModel->pager,
            'currentPage'   => $currentPage
        ];

        return view('/orang/index', $data);
    }
}
