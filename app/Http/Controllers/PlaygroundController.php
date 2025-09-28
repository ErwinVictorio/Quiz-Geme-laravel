<?php
// app/Http/Controllers/PlaygroundController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class PlaygroundController extends Controller
{
    public function index()
    {
        return view('playground'); // resources/views/playground.blade.php
    }

    public function run(Request $request)
    {
        // validate incoming payload
        $data = $request->validate([
            'source'       => 'required|string|max:20000', // ~20KB cap; adjust as needed
            'language_id'  => 'nullable|integer',          // Judge0 language id
            'stdin'        => 'nullable|string|max:10000',
        ]);

        $languageId = $data['language_id'] ?? 51; // 51 = C# (.NET Core) in Judge0 CE
        $stdin      = $data['stdin'] ?? '';

        // Judge0 CE base url (public instance). You can self-host and change this via .env
        $baseUrl = config('services.judge0.url', 'https://ce.judge0.com');

        // submit to Judge0 CE (wait=true so we get the result directly)
        $resp = Http::asJson()
            ->timeout(25)
            ->post($baseUrl . '/submissions?base64_encoded=false&wait=true', [
                'source_code' => $data['source'],
                'language_id' => $languageId,
                'stdin'       => $stdin,
            ]);

        if ($resp->failed()) {
            throw ValidationException::withMessages([
                'source' => ['Code execution failed. Please try again.'],
            ]);
        }

        // return raw Judge0 response to the client
        return response()->json($resp->json());
    }
}
