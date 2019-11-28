<?php


namespace App\Services\Impl;


use App\Blog;
use App\Repositories\BlogRepositoryInterface;
use App\Services\BlogServiceInterface;

class BlogImplService implements BlogServiceInterface
{
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getAll()
    {
        return $this->blogRepository->getAll();
    }

    public function create($request)
    {
        $blog = new Blog();
        $blog->name = $request->name;
        $blog->category = $request->category;
        $blog->date = $request->date;
        $this->blogRepository->save($blog);
    }

    public function findById($id)
    {
        return $this->blogRepository->findById($id);
    }

    public function update($request, $id)
    {
        $blog = $this->blogRepository->findById($id);
        $blog->name = $request->name;
        $blog->category = $request->category;
        $blog->date = $request->date;
        $this->blogRepository->save($blog);
    }

    public function delete($id)
    {
       $blog = $this->blogRepository->findById($id);
       $this->blogRepository->delete($blog);
    }
}
