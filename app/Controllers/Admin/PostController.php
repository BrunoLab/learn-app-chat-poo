<?php

namespace App\Controllers\Admin;

use App\Models\Post;
use App\Controllers\Controller;

class PostController extends Controller {

    public function index()
    {
        $posts = (new Post($this->getDB()))->all();

        return $this->view('admin.post.index', compact('posts'));
    }

    public function delete(int $id)
    {
        $post = new Post($this->getDB());
        $result = $post->delete($id);

        if($result){
            return header('Location: /admin/posts');
        }
    }

}