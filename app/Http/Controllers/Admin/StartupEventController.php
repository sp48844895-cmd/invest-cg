<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StartupEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StartupEventController extends Controller
{
    public function index(Request $request)
    {
        $query = StartupEvent::query();

        if ($request->filled('search')) {
            $query->where('event_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('event_type')) {
            $query->where('event_type', $request->event_type);
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $events = $query->ordered()->paginate(20);
        $eventTypes = StartupEvent::EVENT_TYPES;

        return view('admin.startup-events.index', compact('events', 'eventTypes'));
    }

    public function create()
    {
        $eventTypes = StartupEvent::EVENT_TYPES;

        return view('admin.startup-events.create', compact('eventTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_type' => ['required', 'string', 'in:' . implode(',', StartupEvent::EVENT_TYPES)],
            'event_name' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date'],
            'pre_event_promotion' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:5120'],
            'post_event_report' => ['nullable', 'file', 'mimes:pdf'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data = [
            'event_type' => $validated['event_type'],
            'event_name' => $validated['event_name'],
            'event_date' => $validated['event_date'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ];

        if ($request->hasFile('pre_event_promotion')) {
            $file = $request->file('pre_event_promotion');
            $fileSize = $file->getSize() / 1024 / 1024;
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('startup-events/pre-event', 'public');

            $data['pre_event_promotion_path'] = $filePath;
            $data['pre_event_promotion_name'] = $fileName;
            $data['pre_event_promotion_size'] = round($fileSize, 2);
        }

        if ($request->hasFile('post_event_report')) {
            $file = $request->file('post_event_report');
            $fileSize = $file->getSize() / 1024 / 1024;
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('startup-events/post-event', 'public');

            $data['post_event_report_path'] = $filePath;
            $data['post_event_report_name'] = $fileName;
            $data['post_event_report_size'] = round($fileSize, 2);
        }

        StartupEvent::create($data);

        return redirect()->route('admin.startup-events.index')
            ->with('success', 'Startup event created successfully.');
    }

    public function edit(StartupEvent $startupEvent)
    {
        $eventTypes = StartupEvent::EVENT_TYPES;

        return view('admin.startup-events.edit', ['event' => $startupEvent, 'eventTypes' => $eventTypes]);
    }

    public function update(Request $request, StartupEvent $startupEvent)
    {
        $validated = $request->validate([
            'event_type' => ['required', 'string', 'in:' . implode(',', StartupEvent::EVENT_TYPES)],
            'event_name' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date'],
            'pre_event_promotion' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:5120'],
            'post_event_report' => ['nullable', 'file', 'mimes:pdf'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $updateData = [
            'event_type' => $validated['event_type'],
            'event_name' => $validated['event_name'],
            'event_date' => $validated['event_date'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ];

        if ($request->hasFile('pre_event_promotion')) {
            if ($startupEvent->pre_event_promotion_path && Storage::disk('public')->exists($startupEvent->pre_event_promotion_path)) {
                Storage::disk('public')->delete($startupEvent->pre_event_promotion_path);
            }

            $file = $request->file('pre_event_promotion');
            $fileSize = $file->getSize() / 1024 / 1024;
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('startup-events/pre-event', 'public');

            $updateData['pre_event_promotion_path'] = $filePath;
            $updateData['pre_event_promotion_name'] = $fileName;
            $updateData['pre_event_promotion_size'] = round($fileSize, 2);
        }

        if ($request->hasFile('post_event_report')) {
            if ($startupEvent->post_event_report_path && Storage::disk('public')->exists($startupEvent->post_event_report_path)) {
                Storage::disk('public')->delete($startupEvent->post_event_report_path);
            }

            $file = $request->file('post_event_report');
            $fileSize = $file->getSize() / 1024 / 1024;
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('startup-events/post-event', 'public');

            $updateData['post_event_report_path'] = $filePath;
            $updateData['post_event_report_name'] = $fileName;
            $updateData['post_event_report_size'] = round($fileSize, 2);
        }

        $startupEvent->update($updateData);

        return redirect()->route('admin.startup-events.index')
            ->with('success', 'Startup event updated successfully.');
    }

    public function destroy(StartupEvent $startupEvent)
    {
        if ($startupEvent->pre_event_promotion_path && Storage::disk('public')->exists($startupEvent->pre_event_promotion_path)) {
            Storage::disk('public')->delete($startupEvent->pre_event_promotion_path);
        }

        if ($startupEvent->post_event_report_path && Storage::disk('public')->exists($startupEvent->post_event_report_path)) {
            Storage::disk('public')->delete($startupEvent->post_event_report_path);
        }

        $startupEvent->delete();

        return redirect()->route('admin.startup-events.index')
            ->with('success', 'Startup event deleted successfully.');
    }
}
