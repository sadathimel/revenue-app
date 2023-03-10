<?php

namespace App\Http\Controllers;

use App\Models\Vat;
use Illuminate\Http\Request;
use App\Models\client\Client;
use App\Models\campaign\Campaign;
use Illuminate\Support\Facades\DB;
use App\Models\campaign\CampaignBilling;

class DashboardController extends Controller
{
    public function topCards()
    {
        $vat = Vat::where('id', '=', '1')->value('value');
        $total_client = Client::count();
        $total_campaign = Campaign::count();
        $total_billing = 10;
        // $total_billing = CampaignBilling::count();
        //return $vat;
        $campaignes = Campaign::all();

        $cam1 = DB::select("SELECT year , sum(bill_amount) as total_amount, sum(due) as total_due, sum(received_amount) as total_received_amount FROM campaigns GROUP BY year");

        return view('admin2.pages.home', compact('vat', 'total_client', 'total_campaign', 'total_billing', 'campaignes', 'cam1'));
    }
}
