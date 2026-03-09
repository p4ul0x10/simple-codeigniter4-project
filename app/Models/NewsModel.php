<?php namespace App\Models;
use CodeIgniter\Model;
use Config\Database; //add db configs

class NewsModel extends Model
{
    protected $table = 'news';

    protected $allowedFields = ['title', 'slug', 'body'];
	
	public function getNews($slug)
	{
	    if ($slug === false)
	    {
	        return $this->findAll();
	    }

	    return $this->asArray()
	                ->where(['slug' => $slug])
	                ->first();
	}

	public function insertNewsDb($data)
	{

		$db = Database::Connect();

		$builder = $db->table('news');
		$builder->insert($data);

	}

	public function updateNewsDb($data)
	{
		$db = DataBase::Connect();
		
		$builder = $db->table('news');
		$builder->set($data);
		$builder->where('id', $data['id']);
		$builder->update();

	}

	public function removeNewsDb($data){

		$db = Database::Connect();
		
		$builder = $db->table("news");
		$builder->where('id', $data['id']);
		$builder->delete();
	}
}