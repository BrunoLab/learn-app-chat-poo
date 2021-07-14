<?php

namespace App\Controllers\Admin;

use App\Models\Post;
use App\Controllers\Controller;
use App\Models\Tag;

class PostController extends Controller {

    public function index()
    {
        $posts = (new Post($this->getDB()))->all();

        return $this->view('admin.post.index', compact('posts'));
    }

    public function edit(int $id)
    {
        $post = (new Post($this->getDB()))->findById($id);
        $tags = (new Tag($this->getDB()))->all();
        return $this->view('admin.post.edit', compact('post', 'tags'));
    }

    public function update(int $id)
    {
        $post = new Post($this->getDB());

        $tags = array_pop($_POST);

        $result = $post->update($id, $_POST, $tags);

        if($result){
            return header('location: /admin/posts');
        }
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