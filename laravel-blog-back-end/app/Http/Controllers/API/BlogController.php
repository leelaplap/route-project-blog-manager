<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\BlogServiceInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    public function getAllBlog()
    {
        try {
            $blogs = $this->blogService->getAll();
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $blogs
        ]);
    }

    public function store(Request $request)
    {
        try {
            $this->blogService->create($request);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'tạo mới thành công'
        ]);
    }

    public function getById($id)
    {
        $blog = $this->blogService->findById($id);
        return response()->json($blog);
    }

    public function updateBlog(Request $request, $id)
    {
        try {
            $this->blogService->update($request, $id);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật thành công'
        ]);
    }

    public function delete($id)
    {

        try {
            $this->blogService->delete($id);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Xoa thành công'
        ]);
    }

}
