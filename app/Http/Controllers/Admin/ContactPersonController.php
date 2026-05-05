<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ContactPerson::query();

        // Handle category filtering
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $contacts = $query->orderBy('category')->orderBy('order')->orderBy('name')->paginate(20);
        $categories = ContactPerson::select('category')->distinct()->orderBy('category')->pluck('category');

        // Return JSON if AJAX request
        if ($request->expectsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json([
                'contacts' => $contacts
            ]);
        }

        return view('admin.contact-persons.index', compact('contacts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = [
            'dept-commerce' => 'Department of Commerce and Industries',
            'directorate' => 'Directorate of Industries',
            'sipb' => 'State Investment Promotion Board',
            'dtic' => 'District Trade and Industry Centres',
            'csidc' => 'Chhattisgarh State Industrial Development Corporation',
            'boiler' => 'Inspectorate of Boilers',
            'registrar' => 'Registrar Firms and Society',
            'investment-commissioner' => 'Investment Commissioner',
        ];

        return view('admin.contact-persons.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|string|max:20',
            'category' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'sectors' => 'nullable|string|max:500',
            'order_position' => 'required|in:first,after',
            'order_reference_id' => 'nullable|exists:contact_persons,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Calculate order based on position
        $data['order'] = $this->calculateOrder(
            $request->category,
            $request->order_position,
            $request->order_reference_id ?? null
        );

        // Remove temporary fields
        unset($data['order_position'], $data['order_reference_id']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/contact-images'), $imageName);
            $data['image'] = 'contact-images/' . $imageName;
        }

        ContactPerson::create($data);

        return redirect()->route('admin.contact-persons.index')
            ->with('success', 'Contact person created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactPerson $contactPerson)
    {
        return view('admin.contact-persons.show', compact('contactPerson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactPerson $contactPerson)
    {
        $categories = [
            'dept-commerce' => 'Department of Commerce and Industries',
            'directorate' => 'Directorate of Industries',
            'sipb' => 'State Investment Promotion Board',
            'dtic' => 'District Trade and Industry Centres',
            'csidc' => 'Chhattisgarh State Industrial Development Corporation',
            'boiler' => 'Inspectorate of Boilers',
            'registrar' => 'Registrar Firms and Society',
            'investment-commissioner' => 'Investment Commissioner',
        ];

        return view('admin.contact-persons.edit', compact('contactPerson', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactPerson $contactPerson)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|string|max:20',
            'category' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'sectors' => 'nullable|string|max:500',
            'order_position' => 'required|in:first,after',
            'order_reference_id' => 'nullable|exists:contact_persons,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Calculate order based on position
        $data['order'] = $this->calculateOrder(
            $request->category,
            $request->order_position,
            $request->order_reference_id ?? null
        );

        // Remove temporary fields
        unset($data['order_position'], $data['order_reference_id']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($contactPerson->image && Storage::disk('public')->exists($contactPerson->image)) {
                Storage::disk('public')->delete($contactPerson->image);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/contact-images'), $imageName);
            $data['image'] = 'contact-images/' . $imageName;
        }

        $contactPerson->update($data);

        return redirect()->route('admin.contact-persons.index')
            ->with('success', 'Contact person updated successfully.');
    }

    /**
     * Calculate order value based on position and reference person.
     */
    private function calculateOrder($category, $position, $referenceId = null)
    {
        if ($position === 'first') {
            // Get the lowest order in this category and subtract 10
            $minOrder = ContactPerson::where('category', $category)
                ->min('order') ?? 0;
            return max(0, $minOrder - 10);
        } elseif ($position === 'after' && $referenceId) {
            // Get the reference person's order and add 10
            $referenceOrder = ContactPerson::where('id', $referenceId)
                ->value('order') ?? 0;
            return $referenceOrder + 10;
        }

        return 0;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactPerson $contactPerson)
    {
        // Delete image if exists
        if ($contactPerson->image && Storage::disk('public')->exists($contactPerson->image)) {
            Storage::disk('public')->delete($contactPerson->image);
        }

        $contactPerson->delete();

        return redirect()->route('admin.contact-persons.index')
            ->with('success', 'Contact person deleted successfully.');
    }
}