<?php

namespace App\Models;

use DateTime;

class Post extends Model{

    protected $table = 'posts';

    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à h:m');
    }

    public function getExcerpt(): string
    {
        return substr($this->content, 0, 200) . '...';
    }

    public function getButton()
    {
        return <<<HTML
        <a href="/posts/$this->id" class="btn btn-primary">Lire plus</a>
HTML;
    }

}