<?php


namespace App\Repositories\Eloquent;


use App\Blog;
use App\Repositories\BlogRepositoryInterface;

class BlogEloquentRepository implements BlogRepositoryInterface
{
    protected $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function getAll()
    {
        return $this->blog->all();
    }

    public function save($obj)
    {
        $obj->save();
    }

    public function findById($id)
    {
        return $this->blog->findOrFail($id);
    }

    public function delete($obj)
    {
        $obj->delete();
    }
}
