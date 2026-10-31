<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Customer Accounts page (/customers).
    public function index()
    {
        $customers = Customer::all();

        return view('customers', ['customers' => $customers]);
    }

    // Shows the empty Create Customer form (/customers/create).
    public function create()
    {
        return view('customers.create');
    }

    // Validates the form, then inserts the new customer.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'nullable|string|max:50',
        ]);

        // The phone column cannot be empty in the database, so save '' if left blank.
        $validated['phone'] = $validated['phone'] ?? '';

        Customer::create($validated);

        return redirect()->route('customers')->with('success', 'Customer added.');
    }

    // Shows the Edit Customer form, filled in with the existing record.
    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    // Validates the form, then updates the customer.
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'nullable|string|max:50',
        ]);

        $validated['phone'] = $validated['phone'] ?? '';

        $customer->update($validated);

        return redirect()->route('customers')->with('success', 'Customer updated.');
    }
}
