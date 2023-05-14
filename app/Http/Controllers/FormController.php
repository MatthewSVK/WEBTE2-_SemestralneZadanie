<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        // Handle the form submission
        // Access form data using $request->input('name')
        // Example: $name = $request->input('name');

        // Perform necessary actions (e.g., save to database, send email, etc.)

        // Redirect to a success page or back to the form page
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
