<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\MeetingHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MeetingHistoryController extends Controller
{
    public function index()
    {
        $meetings = MeetingHistory::where('wedding_id', Auth::user()->client->wedding->id)->where('is_deleted', false)->orderBy('id', 'DESC')->get();
        $meetings = $meetings->map(function ($meeting) {
            $meeting_date = new Carbon($meeting->meeting_date);
            $meeting->meeting_date = $meeting_date->day . " " . $meeting_date->locale('ID')->getTranslatedMonthName() . " " . $meeting_date->year;
            $meeting->meeting_day = $meeting_date->locale('ID')->getTranslatedDayName();
            return $meeting;
        });

        return view('dashboard.client.page.meeting.index', [
            "active" => "meeting",
            "meetings" => $meetings
        ]);
    }
}
