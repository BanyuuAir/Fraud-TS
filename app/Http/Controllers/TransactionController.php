<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use League\Csv\Reader;
use League\Csv\Statement;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::all();
        return view('transaction.index', compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'integer',
            'time' => 'required',
            'account_number' => 'string',
            'amount' => 'integer',
            'account_destination' => 'string',
            'channel' => 'required',
        ]);

        $transaction = new Transaction;
        $transaction->time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('time'));
        $transaction->id_user = $request->input('id_user');
        $transaction->account_number = $request->input('account_number');
        $transaction->amount = $request->input('amount');
        $transaction->account_destination = $request->input('account_destination');
        $transaction->channel = $request->input('channel');
        $transaction->save();

        return redirect()->route('transaction.index')
            ->with('success', 'transaction berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'id_user' => 'integer',
            'time' => 'required',
            'account_number' => 'string',
            'amount' => 'integer',
            'account_destination' => 'string',
            'channel' => 'required',
        ]);

        $transaction->time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('time'));
        $transaction->id_user = $request->input('id_user');
        $transaction->account_number = $request->input('account_number');
        $transaction->amount = $request->input('amount');
        $transaction->account_destination = $request->input('account_destination');
        $transaction->channel = $request->input('channel');
        $transaction->save();

        return redirect()->route('transaction.index')
            ->with('success', 'transaction berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transaction.index')
            ->with('success', 'transaction berhasil dihapus.');
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
                    Transaction::create([
                        'id_user' => $row['id_user'], 
                        'time' => $row['time'],
                        'account_number' => $row['account_number'],
                        'amount' => $row['amount'],
                        'account_destination' => $row['account_destination'],
                        'channel' => $row['channel'],
                    ]);
                }

                return redirect()->route('transaction.index')
                    ->with('success', 'Data dari file CSV berhasil diimpor ke database.');
            } else {
                throw new \Exception('Gagal mengimpor data dari file CSV.');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
