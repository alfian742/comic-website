<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;

    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_komik') ? $this->request->getVar('page_komik') : 1;

        // Pencarian data
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->komikModel->search($keyword);
        } else {
            $this->komikModel->findAll();
        }

        // Tampilkan data
        $data = [
            'title'         => 'Comic List',
            'komik'         => $this->komikModel->orderBy('id', 'DESC')->paginate(10, 'komik'),
            'pager'         => $this->komikModel->pager,
            'currentPage'   => $currentPage
        ];

        return view('/komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Comic Detail',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        // Jika tidak ada komik
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Comic ' . $slug . ' Not Found.');
        }

        return view('/komik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Comic',
        ];

        return view('/komik/create', $data);
    }

    public function save()
    {
        // Validasi input data
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required'  => 'Title is required.',
                    'is_unique' => 'Title already exists.'
                ]
            ],

            'penulis' => [
                'rules' => 'required[komik.penulis]',
                'errors' => [
                    'required' => 'Author is required.'
                ]
            ],

            'penerbit' => [
                'rules' => 'required[komik.penerbit]',
                'errors' => [
                    'required' => 'Publisher is required.'
                ]
            ],

            // Jika file boleh kosong
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size'  => 'Image size is too large.',
                    'is_image'  => 'The one you selected is not an image.',
                    'mime_in'   => 'The one you selected is not an image.'
                ]
            ]
        ])) {
            return redirect()->to('/komik/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil gamber
        $fileSampul = $this->request->getFile('sampul');

        // Apakah tidak ada gambar yang diupload?
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            // Generate nama file
            $namaSampul = $fileSampul->getRandomName();

            // Pindah file
            // Generate nama file
            $fileSampul->move('img/uploads', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'sampul'    => $namaSampul
        ]);

        session()->setFlashdata('pesan', "<i class='bi bi-check-circle-fill'></i> Data added successfully.");

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $komik = $this->komikModel->find($id);

        // Cek jika fil gambar default
        if ($komik['sampul'] != 'default.png') {
            // Hapus gambar
            unlink('img/uploads/' . $komik['sampul']);
        }

        $this->komikModel->delete($id);

        session()->setFlashdata('pesan', "<i class='bi bi-check-circle-fill'></i> Data has been deleted.");

        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Comic',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        return view('/komik/edit', $data);
    }

    public function update($id)
    {
        // Cek judul
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));

        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }

        // Validasi input data
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required'  => 'Title is required.',
                    'is_unique' => 'Title already exists.'
                ]
            ],

            'penulis' => [
                'rules' => 'required[komik.penulis]',
                'errors' => [
                    'required' => 'Author is required.'
                ]
            ],

            'penerbit' => [
                'rules' => 'required[komik.penerbit]',
                'errors' => [
                    'required' => 'Publisher is required.'
                ]
            ],

            // Jika file boleh kosong
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size'  => 'Image size is too large.',
                    'is_image'  => 'The one you selected is not an image.',
                    'mime_in'   => 'The one you selected is not an image.'
                ]
            ]
        ])) {
            // Menyimpan pesan error dalam array flashdata
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileSampul = $this->request->getFile('sampul');

        // Cek gambar, apakah tetap gambar lama?
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // Pilih salah satu antara generate atau asli

            // Generate nama sampul baru
            $namaSampul = $fileSampul->getRandomName();

            //Pindah gambar
            $fileSampul->move('img/uploads', $namaSampul);

            // Hapus file
            if ($this->request->getVar('sampulLama') != 'default.png') {
                unlink('img/uploads/' . $this->request->getVar('sampulLama'));
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id'        => $id,
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'sampul'    => $namaSampul
        ]);

        session()->setFlashdata('pesan', "<i class='bi bi-check-circle-fill'></i> Data updated successfully.");

        return redirect()->to('/komik');
    }
}
