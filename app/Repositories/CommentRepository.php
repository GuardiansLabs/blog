<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/18/17
 * Time: 2:54 PM
 */

namespace App\Repositories;

use App\Comment;

class CommentRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(new Comment());
    }

}