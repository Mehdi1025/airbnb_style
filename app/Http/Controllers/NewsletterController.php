<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Subscribe to newsletter (basic implementation).
     * Returns JSON for AJAX requests.
     */
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        // TODO: Store email in database or send to email service
        // For now, we return success

        return response()->json([
            'success' => true,
            'message' => __('Merci pour votre inscription ! Vous recevrez bientôt nos meilleures offres.'),
        ]);
    }
}
