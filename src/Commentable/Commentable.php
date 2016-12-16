<?php namespace Ican\Commentable;

trait Commentable
{
    /**
     * This model has many comments.
     *
     * @return Comment
     */
    public function comments()
    {
        return $this->morphMany('Ican\Commentable\Comment', 'commentable');
    }
}
