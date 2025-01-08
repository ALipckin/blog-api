<?php

namespace frontend\resource;

class Post extends \common\models\Post
{
    public function fields()
    {
        return ['id', 'title', 'body'];
    }

    public function extraFields()
    {
        return ['comments', 'created_at', 'updated_at', 'updated_by'];
    }

//    public function getComments()
//    {
//        return $this->hasOne(Comment::class, ['id' => 'post_id']);
//    }
}