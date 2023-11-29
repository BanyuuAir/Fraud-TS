<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ActivityType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use League\Csv\Reader;
use League\Csv\Statement;
use Carbon\Carbon;

class ActivityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activityType = ActivityType::all();
        return view('activityType.index', compact('activityType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activityType.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity_type' => 'string',
            'activity_desc' => 'string',
        ]);

        ActivityType::create($request->all());

        return redirect()->route('activityType.index')
            ->with('success', 'Activity Type berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityType $activityType)
    {
        return view('activityType.show', compact('activityType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityType $activityType)
    {
        return view('activityType.edit', compact('activityType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivityType $activityType)
    {
        $request->validate([
            'activity_type' => 'string',
            'activity_desc' => 'string',
        ]);

        $activityType->update($request->all());

        return redirect()->route('activityType.index')
            ->with('success', 'Activity Type berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityType $activityType)
    {
        $activityType->delete();

        return redirect()->route('activityType.index')
            ->with('success', 'Activity Type berhasil dihapus.');
    }

    public function import(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'csv_file' => 'required|mimes:csv,txt', // Validate file type
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            if ($request->hasFile('csv_file')) {
                $file = $request->file('csv_file');
                
                $csv = Reader::createFromPath($file->getPathname(), 'r');
                $csv->setHeaderOffset(0);
                
                foreach ($csv as $row) {
                    ActivityType::create([
                        'activity_type' => $row['activity_type'], 
                        'activity_desc' => $row['activity_desc'],
                    ]);
                }

                return redirect()->route('activityType.index')
                    ->with('success', 'Data dari file CSV berhasil diimpor ke database.');
            } else {
                throw new \Exception('Gagal mengimpor data dari file CSV.');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
