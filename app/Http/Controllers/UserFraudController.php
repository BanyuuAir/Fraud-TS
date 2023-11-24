<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User_Fraud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use League\Csv\Reader;
use League\Csv\Statement;

class UserFraudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User_Fraud::orderBy('id','asc')->paginate(10);
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'string',
            'username' => 'string',
            'account_number' => 'string',
            'email' => 'string',
            'phone' => 'string',
        ]);

        User_Fraud::create($request->all());

        return redirect()->route('user.index')
            ->with('success', 'user berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User_Fraud $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User_Fraud $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_Fraud $user)
    {
        $request->validate([
            'id' => 'string',
            'username' => 'string',
            'account_number' => 'string',
            'email' => 'string',
            'phone' => 'string',
        ]);

        $user->update($request->all());

        return redirect()->route('user.index')
            ->with('success', 'user berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User_Fraud $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'user berhasil dihapus.');
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
                    User_Fraud::create([
                        'id' => $row['id'],
                        'username' => $row['username'], 
                        'account_number' => $row['account_number'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],
                    ]);
                }

                return redirect()->route('user.index')
                    ->with('success', 'Data dari file CSV berhasil diimpor ke database.');
            } else {
                throw new \Exception('Gagal mengimpor data dari file CSV.');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
