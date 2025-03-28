<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

/**
 * @OA\Info(
 *     title="My API Documentation",
 *     version="1.0.0",
 *     description="API Documentation for My Application",
 *     @OA\Contact(
 *         email="hoangnguyendepgiai@gmail.com"
 *     )
 * )
 */
class ExampleAPI extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/test",
     *     summary="Get all blogs",
     *     tags={"Blogs"},
     *     @OA\Response(
     *         response=200,
     *         description="Thành công",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Blog"))
     *     )
     * )
     */

    public function index()
    {
        //
        $blogs = Blog::all();
        return response()->json($blogs);
    }

    /**
     * @OA\Post(
     *     path="/api/test",
     *     summary="Create a new blog",
     *     tags={"Blogs"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"location", "time_read", "content"},
     *             @OA\Property(property="location", type="string", example="Hồ Chí Minh"),
     *             @OA\Property(property="up_time", type="string", format="date-time", example="2025-03-25 14:00:00"),
     *             @OA\Property(property="time_read", type="integer", example=10),
     *             @OA\Property(property="content", type="string", example="Nội dung bài viết..."),
     *             @OA\Property(property="image", type="string", example="https://example.com/image.jpg")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Blog created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Blog")
     *     )
     * )
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        // you should create a Request to validate dât
        $validatedData = $request->validate([
            'location' => 'required|string|max:255',
            'up_time' => 'nullable|date',
            'time_read' => 'required|integer|min:1',
            'content' => 'required|string',
            'image' => 'nullable|string|max:255',
        ]);

        $blog = Blog::create($validatedData);

        return response()->json([
            'message' => 'Blog created successfully',
            'blog' => $blog
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/test/{id}",
     *     summary="Get a blog by ID",
     *     tags={"Blogs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID của blog",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Chi tiết blog",
     *         @OA\JsonContent(ref="#/components/schemas/Blog")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Blog not found"
     *     )
     * )
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }

        return response()->json($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }

        $validatedData = $request->validate([
            'location' => 'sometimes|string|max:255',
            'up_time' => 'nullable|date',
            'time_read' => 'sometimes|integer|min:1',
            'content' => 'sometimes|string',
            'image' => 'nullable|string|max:255',
        ]);

        $blog->update($validatedData);

        return response()->json([
            'message' => 'Blog updated successfully',
            'blog' => $blog
        ]);
    }
    /**
     * @OA\Delete(
     *     path="/api/test/{id}",
     *     summary="Delete blog by id",
     *     tags={"Blogs"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID của blog cần xóa",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Xóa thành công",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Blog deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Không tìm thấy blog",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Blog not found")
     *         )
     *     )
     * )
     */

    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }

        $blog->delete();

        return response()->json(['message' => 'Blog deleted successfully']);
    }
}
