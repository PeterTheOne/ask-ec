<?php

class Question extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'questions';

    protected $fillable = array('title', 'fulltext');

    public function voters() {
        return $this->belongsToMany('User', 'votes', 'question_id', 'user_id');
    }

}
