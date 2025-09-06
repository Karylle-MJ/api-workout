<?php

namespace App\Http\Controllers;

use App\Models\DayPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class ScheduleController extends Controller
{
    private array $days = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];

    public function index()
    {
        return response()->json([
            'data' => DayPlan::ordered()->get()
        ]);
    }

    public function show(string $day)
    {
        $day = strtolower($day);
        if (!in_array($day, $this->days)) {
            return response()->json(['message' => 'Invalid day'], 422);
        }

        $plan = DayPlan::where('day', $day)->first();
        return $plan
            ? response()->json(['data' => $plan])
            : response()->json(['message' => 'Not found'], 404);
    }

    public function today()
    {
        // Uses app timezone (config/app.php), e.g., Asia/Manila
        $today = strtolower(Carbon::now()->dayName); // e.g., "sunday"
        $plan  = DayPlan::where('day', $today)->first();
        return response()->json([
            'date' => Carbon::now()->toDateString(),
            'day'  => $today,
            'data' => $plan
        ]);
    }

    public function update(Request $request, string $day)
    {
        $day = strtolower($day);
        if (!in_array($day, $this->days)) {
            return response()->json(['message' => 'Invalid day'], 422);
        }

        $validated = $request->validate([
            'workout_title' => ['required_without:is_rest','string','max:255'],
            'details'       => ['nullable','string'],
            'is_rest'       => ['sometimes','boolean'],
        ]);

        $isRest = (bool)($validated['is_rest'] ?? false);

        $payload = [
            'day'           => $day,
            'workout_title' => $isRest ? 'Rest' : ($validated['workout_title'] ?? 'Workout'),
            'details'       => $isRest ? null : ($validated['details'] ?? null),
            'is_rest'       => $isRest,
        ];

        $plan = DayPlan::updateOrCreate(['day' => $day], $payload);

        return response()->json(['message' => 'Updated', 'data' => $plan]);
    }
}
