<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use League\Csv\Reader;
use League\Csv\Statement;
use Carbon\Carbon;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activity = Activity::all();
        return view('activity.index', compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activity.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'integer',
            'time' => 'required',
            'activity' => 'string',
        ]);

        $activity = new Activity;
        $activity->time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('time'));
        $activity->id_user = $request->input('id_user');
        $activity->activity = $request->input('activity');
        $activity->save();

        return redirect()->route('activity.index')
            ->with('success', 'activity berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        return view('activity.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        return view('activity.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'id_activity' => 'integer',
            'time' => 'required',
            'activity' => 'string',
        ]);

        $activity->time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('time'));
        $activity->id_user = $request->input('id_user');
        $activity->activity = $request->input('activity');
        $activity->save();

        return redirect()->route('activity.index')
            ->with('success', 'activity berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('activity.index')
            ->with('success', 'activity berhasil dihapus.');
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
                    Activity::create([
                        'id_user' => $row['id_user'], 
                        'time' => $row['time'],
                        'activity' => $row['activity'],
                    ]);
                }

                return redirect()->route('activity.index')
                    ->with('success', 'Data dari file CSV berhasil diimpor ke database.');
            } else {
                throw new \Exception('Gagal mengimpor data dari file CSV.');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
