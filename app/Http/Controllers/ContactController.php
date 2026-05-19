<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // ── 1. Validate input ────────────────────────────────
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|min:2|max:100',
            'email'   => 'required|email|max:150',
            'message' => 'required|string|min:10|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        // ── 2. Store in Supabase PostgreSQL ──────────────────
        $contact = Contact::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'message'    => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // ── 3. Send email notification ───────────────────────
        try {
            Mail::send(
                'emails.contact',
                ['contact' => $contact],
                function ($mail) use ($contact) {
                    $mail->to(env('MAIL_PORTFOLIO_RECIPIENT', 'harsha230302@gmail.com'))
                         ->subject("New Portfolio Message from {$contact->name}")
                         ->replyTo($contact->email, $contact->name);
                }
            );
        } catch (\Throwable $e) {
            // Log but don't fail the request — message is already saved
            \Log::warning('Contact email failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => "Your message has been received! I'll get back to you soon.",
            'data'    => ['id' => $contact->id],
        ], 201);
    }
}
