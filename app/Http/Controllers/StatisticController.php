<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Respon;
use Carbon\CarbonPeriod;
use App\Models\Kuesioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function allStatistic()
    {
        $kuesioners = Kuesioner::all()->where('user_id', Auth::user()->id);
        return view('dashboard.client.allstatistic', compact('kuesioners'));
    }

    public function detailStatistic($id)
    {
        $kuesioners = Kuesioner::all()->where('id', $id);
        return view('dashboard.client.detailstats', compact('kuesioners'));
    }

        // Controller for question stats
        public function getQuestionStats(Request $req)
        {
            // get kuesioner where id 
            $kuesioner = Kuesioner::all()->where('id', $req->query('kuesioner_id'))->first();
            // get question where id
            $question = $kuesioner->questions->where('id', $req->query('question_id'))->first();
    
            $stats = [];
            $stats["choices"] = $question->choices->pluck('option');
    
            foreach ($question->choices as $key => $choice) {
                $question_id = $question->id;
                // hitung respon yang type nya multiple
    
                $stats['choices_count'][$key] = Respon::all()->where('question_id', $question_id)->where('answer', $choice->id)->count();
            }
            return response()->json($stats);
        }
    
        // controller for responstats
        public function getResponStats(Request $req)
        {
            $kuesioner = Kuesioner::all()->where('id', $req->query('kuesioner_id'))->first();
            $startDate = Carbon::parse($req->query('start_date'));
            $endDate = Carbon::parse($req->query('end_date'));
            $diff_day = $startDate->diffInDays($endDate);
            $stats = [
                'respon_count' => [],
                'date_range' => []
            ];
            $period = CarbonPeriod::create($startDate, $endDate)->toArray();

            foreach ($period as $key => $p) {
                $period[$key] = $p->format('Y-m-d');
            }

            $stats['date_range'] = $period;
            foreach ($period as $keyDate => $date) {
                foreach ($kuesioner->responses as $key => $respon) {
                    $_date_response = Carbon::parse($respon->created_at);
                    if (!isset($stats['respon_count'][$keyDate])) {
                        $stats['respon_count'][$keyDate] = 0;
                    }
                    if ($_date_response->isSameDay($date)) {
                        $stats['respon_count'][$keyDate]++;
                    }
    
                }
            }
            return response()->json($stats);
        }
}