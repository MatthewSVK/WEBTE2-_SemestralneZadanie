<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function submit(Request $request)
    {
// Fetch the entire request body
        $formData = $request->all();

// Separate the checkboxes into separate arrays
        $checkboxFields = [];

        foreach ($formData as $key => $value) {
            if (strpos($key, 'checkbox') !== false) {
                $field = str_replace('_texcheckbox', '.tex', $key);
                $toPush= ["name" => $field, "value" => $value];
                $checkboxFields[$field] = $toPush;
                unset($formData[$key]);
            }
        }

// Do something with the form data
        $name = $formData['name'];
        $startDate = $formData['start_date'];
        $endDate = $formData['end_date'];

        // Process checkbox fields
        foreach ($checkboxFields as $field => $checkbox) {
            $isChecked = $checkbox['value'] == '1';
            //ddd($checkbox['name']);
            if ($isChecked) {
                DB::table("latexFiles")->where("name", $checkbox['name'])->update([
                    "active" => true,
                    "from" => $startDate,
                    "to" => $endDate
                ]);
            } else {
                DB::table("latexFiles")->where("name", $checkbox['name'])->update([
                    "active" => false,
                    "from" => null,
                    "to" => null
                ]);
            }
        }

        // Return a response or redirect as needed
        return redirect()->back();
    }
}
