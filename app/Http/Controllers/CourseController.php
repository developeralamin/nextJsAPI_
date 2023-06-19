<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course =  Course::all();
        return CourseResource::collection($course);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data   = $request->all();
        $course =  Course::create($data);

        return new CourseResource($course);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course =  Course::findOrFail($id);

        return new CourseResource($course);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course        =  Course::findOrFail($id);
        $course->title = $request->title;

        $course->save();

        return response()->json([
            'message' => 'Updated successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course =  Course::findOrFail($id);
        $course->delete();

        return response()->json([
            'message' => 'Deleted successfully'
        ], 201);
    }
}
