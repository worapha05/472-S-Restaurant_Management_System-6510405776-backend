<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    /**
     * Handle direct file upload through the backend
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadFile(Request $request)
    {
        Gate::authorize('uploadImage', User::class);
        // Validate the request
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max size
        ]);

        try {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();

            // Create a filename with year_month format
            $timestamp = now(); // Or use Carbon::now() if you're using Carbon
            $fileName = $timestamp->format('Y_m_') . Str::uuid() . '.' . pathinfo($originalName, PATHINFO_EXTENSION);
            $filePath = $fileName;

            // Upload the file to S3
            $uploaded = Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');

            if (!$uploaded) {
                throw new \Exception('Failed to upload file to storage');
            }

            // Extract just the relative path (you may need to adjust this depending on your exact URL structure)
            $relativePath = '/images/' . basename($filePath);

            return response()->json([
                'success' => true,
                'fileUrl' => $relativePath,
                'fileName' => $fileName
            ]);


        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
