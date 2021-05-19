<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\HtmlString;

class Post extends Model
{
	protected $table	= "posts";
	protected $fillable	= [ "title", "content", "image_url" ];
	
	public function get_content_html()
	{
		return new HtmlString($this->content);
	}
}
