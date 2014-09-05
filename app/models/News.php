<?php

class News extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    public static $rules = array(
        'title' => 'required',
        'content' => 'required',
        'author_id' => 'required'
    );

    protected $fillable = array('title', 'content', 'author_id');

    public function user()
    {
        return $this->belongsTo('User', 'author_id');
    }
}
