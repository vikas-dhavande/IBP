<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SimulatorController extends Controller
{
    public function run(Request $request): JsonResponse
    {
        $command = $request->input('command');

        $commands = [
            'email' => [
                ['text' => '$ php artisan dispatch:event InviteBachelorsEvent --id=102', 'delay' => 100],
                ['text' => '[INFO] Dispatching event: App\Events\InviteBachelorsEvent', 'delay' => 500],
                ['text' => '[INFO] Compiling guestlist from Mumbai & Pune regions...', 'delay' => 300],
                ['text' => '[INFO] Dispatching 124 invites to queued emails...', 'delay' => 400],
                ['text' => '[SUCCESS] Invites pushed to mail gateway queue. Job ID: 887212', 'delay' => 300],
                ['text' => '[INFO] Processing job: App\Jobs\SendQueuedInvites (ID: 887212)', 'delay' => 500],
                ['text' => '[SUCCESS] Mail notifications dispatched to guests successfully.', 'delay' => 400]
            ],
            'schema' => [
                ['text' => '$ php artisan inspect:database --table=events', 'delay' => 100],
                ['text' => '[INFO] Scanning event metadata schema structures...', 'delay' => 600],
                ['text' => '[INFO] Found table columns: id, title, description, starts_at, city_id, location_details, capacity, membership_id, created_at, updated_at', 'delay' => 300],
                ['text' => '[INFO] Status: Database tables indexing matching all constraints.', 'delay' => 400],
                ['text' => '[SUCCESS] DB metadata analysis successfully complete.', 'delay' => 200]
            ],
            'test' => [
                ['text' => '$ php artisan test --filter=EventBookingTest', 'delay' => 100],
                ['text' => '   INFO  Running tests...', 'delay' => 400],
                ['text' => '  ✓ App\Tests\Feature\EventBookingTest > user_can_book_available_seat', 'delay' => 300],
                ['text' => '  ✓ App\Tests\Feature\EventBookingTest > user_cannot_book_filled_seats', 'delay' => 200],
                ['text' => '', 'delay' => 100],
                ['text' => '  Tests:    2 passed (2 assertions)', 'delay' => 100],
                ['text' => '  Duration: 0.12s', 'delay' => 100],
                ['text' => '[SUCCESS] All execution validation tests completed.', 'delay' => 200]
            ]
        ];

        return response()->json([
            'lines' => $commands[$command] ?? [['text' => '[ERROR] Command not found.', 'delay' => 100]]
        ]);
    }
}
