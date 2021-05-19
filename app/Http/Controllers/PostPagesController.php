<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;


class PostPagesController extends Controller
{
	public function index()  {}
	public function create() { return view("post_pages/create")->with("user_id", auth()->user()->id); }
	public function show($id){ return view("post_pages/show")->with("post", Post::where("id", $id)->get()[0]); }
	public function edit($id){ return view("post_pages/edit")->with("post", Post::where("id", $id)->get()[0]); }
	
	private function validate_data(Request $request, $action)
	{
		$validations =	[ "title" => "required|max:255", "content" => "required", "file" => "max:3500" ];
		$validator = Validator::make($request->all(), $validations);
		
		if($validator->fails())
		{
			switch($action)
			{
				case "store":	return redirect("/posts/create")->withErrors($validator)->withInput();	break;
				case "update":	return redirect("/posts/edit")->withErrors($validator)->withInput();	break;
			}
		}
	}

	private function upload_image(Request $request)
	{
		$image_path		= "";
		$cover_image	= $request->file("cover_image");
		$current_image	= $request->file("current_image");

		if($cover_image)
		{
			$image_name		= auth()->user()->id  . "_" . time() . "_" . $cover_image->getClientOriginalName();
			$request->file("cover_image")->storeAS("public/images", $image_name);
			$image_path		= "images/" . $image_name;

			if($current_image != "images/no_image.jpg" && file_exists($current_image)) unlink($current_image);
		}

		if($current_image  && !$cover_image) $image_path = $current_image;
		if(!$current_image && !$cover_image) $image_path = "images/no_image.jpg";

		return $image_path;
	}

	public function store(Request $request)
	{
		switch($request->input("action"))
		{
			case "Save":
				$this->validate_data($request, "store");
				
				$post 				= new Post;
				$post["user_id"]	= auth()->user()->id;
				$post["title"]		= $request->input("title");
				$post["content"]	= $request->input("content");
				$post["image_url"]	= $this->upload_image($request);
				$post->save();

				return redirect("/dashboard")->with("success", "Post Created Successfully");
			break;

			case "Cancel":
				return redirect("/dashboard");
			break;
		}
	}

	public function update(Request $request, $id)
	{
		switch($request->input("action"))
		{
			case "Save":
				$this->validate_data($request, "update");
				
				$post		=	Post::find($id);
				$variables	=	[
									"title"		=> $request->input("title"),
									"content"	=> $request->input("content"),
									"image_url"	=> $this->upload_image($request)
								];
				
				$post->update($variables);
		
				return redirect("/dashboard")->with("success", "Post Updated Successfully");
			break;

			case "Cancel":
				return redirect("/dashboard");
			break;
		}
	}

	public function destroy($id)
	{
		$post = Post::where("id", $id)->get()[0];

		if($post->image_url != "images/no_image.jpg" && file_exists($post->image_url)) unlink($post->image_url);

		if($post->destroy($id))
			return redirect("/dashboard")->with("success", "Post Deleted Successfully");
		else
			return redirect("/dashboard")->with("error", "Post Deletion Failed");
	}
}
