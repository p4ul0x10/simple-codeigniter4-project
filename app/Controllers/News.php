<?php namespace App\Controllers;

use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller
{
    public function index()
    {
        $model = new NewsModel();
        $slug = false;

        $data = [
            'news'  => $model->getNews($slug),
            'title' => 'News archive',
        ];

        echo view('templates/header', $data);
        echo view('news/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = NULL)
    {
        $model = new NewsModel();
        $slug = false;
        $news['news'] = $model->getNews($slug);

        if (empty($news['news']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
        }
        
        $title_header = "Header title";
        $title_footer = "Footer title";
        
        echo view('templates/header', ['title_header' => $title_header]);
        echo view('news/overview', ['news' => $news['news']]);
        echo view('templates/footer', ['title_footer' => $title_footer]);
    }

    public function create()
    {
        $model = new NewsModel();

        if ($this->request->getMethod() === 'POST' && $this->validate([
                'title' => 'required|min_length[3]|max_length[255]',
                'body'  => 'required'
            ]))
        {   
            $data = [
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
                'body'  => $this->request->getPost('body'),
            ];

            $model->insertNewsDb($data);

            echo view('news/success');

        }
        else
        {
            echo view('templates/header', ['title_header' => 'Header title', 'h1' => 'h1 added', 'h2' => 'h2 added']);
            echo view('news/create');
            echo view('templates/footer', ['title_footer' => 'Footer title']);
        }
    }

    public function update($slug = NULL)
    {
        $model = new NewsModel();
        $slug = false;
        
        if ($this->request->getMethod() === 'POST' && $this->validate(['update-news'  => 'required'
            ]))
        {   

            $data = [
                'id' => $this->request->getPost("update-id"),
                'body' => $this->request->getPost('update-news'),
            ];
           
            $model->updateNewsDb($data);
        }
        
        $news['news'] = $model->getNews($slug);

        if (empty($news['news']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
        }

        $title_header = "Header title";
        $title_footer = "Footer title - update";
        
        echo view('templates/header', ['title_header' => $title_header]);
        echo view('news/update', ['news' => $news['news']]);
        echo view('templates/footer', ['title_footer' => $title_footer]);
    }

    public function delete(){

        $model = new NewsModel();
        $slug = false;
        
        if ($this->request->getMethod() === 'POST' && $this->validate(['remove-id'  => 'required'
            ]))
        {   

            $data = [
                'id' => $this->request->getPost("remove-id"),
            ];
           
            $model->removeNewsDb($data);
        }
        
        $news['news'] = $model->getNews($slug);

        if (empty($news['news']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
        }

        $title_header = "Header title";
        $title_footer = "Footer title - delete";
        
        echo view('templates/header', ['title_header' => $title_header]);
        echo view('news/delete', ['news' => $news['news']]);
        echo view('templates/footer', ['title_footer' => $title_footer]);
    }

}