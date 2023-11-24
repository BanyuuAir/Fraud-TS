<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User_Fraud;
use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\Transaction;

class SummaryController extends Controller
{
    public function form()
    {
        return view('summary');
    }

    public function process(Request $request)
    {
        $data = $request->validate([
            'tanggal1' => 'required',
            'tanggal2' => 'required',
            'acc' => 'required',
        ]);
    
        // Simpan data dalam sesi
        $formData = $request->session()->get('formData', []);
        $formData[] = $data;
        $request->session()->put('formData', $formData);
    
        // Retrieve user data based on the provided account number (acc)
        $user = User_Fraud::where('id', $data['acc'])->first();
    
        // Retrieve activities based on user id and time range
        $activity = Activity::with(['activityType'])
            ->where('id_user', $data['acc'])
            ->whereBetween('time', [$data['tanggal1'], $data['tanggal2']])
            ->get();
    
        // Retrieve transactions based on user id and time range
        $channel = Transaction::with(['channel'])
            ->where('id_user', $data['acc'])
            ->whereBetween('time', [$data['tanggal1'], $data['tanggal2']])
            ->get();
    
        return view('summary', [
            'user' => $user,
            'activity' => $activity,
            'channel' => $channel,
            'formData' => $formData
        ])->with('success', 'Data Diproses.');
    }    
}
