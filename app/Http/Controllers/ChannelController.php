<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Channel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use League\Csv\Reader;
use League\Csv\Statement;
use Carbon\Carbon;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $channel = Channel::all();
        return view('channel.index', compact('channel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('channel.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'channel_code' => 'string',
            'channel_type' => 'string',
            'channel_desc' => 'string',
        ]);

        Channel::create($request->all());

        return redirect()->route('channel.index')
            ->with('success', 'Channel Type berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Channel $channel)
    {
        return view('channel.show', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Channel $channel)
    {
        return view('channel.edit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Channel $channel)
    {
        $request->validate([
            'channel_code' => 'string',
            'channel_type' => 'string',
            'channel_desc' => 'string',
        ]);

        $channel->update($request->all());

        return redirect()->route('channel.index')
            ->with('success', 'Channel Type berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();

        return redirect()->route('channel.index')
            ->with('success', 'Channel Type berhasil dihapus.');
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
                    Channel::create([
                        'channel_code' => $row['channel_code'], 
                        'channel_type' => $row['channel_type'], 
                        'channel_desc' => $row['channel_desc'],
                    ]);
                }

                return redirect()->route('channel.index')
                    ->with('success', 'Data dari file CSV berhasil diimpor ke database.');
            } else {
                throw new \Exception('Gagal mengimpor data dari file CSV.');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
