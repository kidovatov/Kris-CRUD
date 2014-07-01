<?php
	class Post extends Eloquent {
		protected $guarded	= array('id');
		protected $fillable	= array('author', 'title', 'body');
		
		public static $rules= array(
			'author'=> 'required|min:4',
			'title'	=> 'required',
			'body'	=> 'required',
		);
	}