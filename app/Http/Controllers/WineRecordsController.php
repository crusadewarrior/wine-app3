<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Client;
class WineRecordsController extends Controller {

    /**
     * Fetch wine records
     * @param $batchid
     * @return mixed
     */
    public function getWineRecords($batchid)
    {
        $client = new Client();

        $request = $client->get('http://www.nataliemaclean.com/api/winedata/v1/', [
            'query'   => ['mode'    => 'winerecords',
                          'batchid' => $batchid
            ],
            'headers' => [
                'apikey'  => 'XaIyxWEh4Mr5Fpfe0P6jf3F93f',
                'apipass' => 'Of2rKFpwY49JJwzl3xxVzZs45x'
            ]
        ]);

        $result = $request->getBody(true)->getContents();

        $winerecords = json_decode($result, true);

        return $winerecords;
    }

    /**
     * Display the result
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $batchid = $request->input('batchid');
        $winerecords = $this->getWineRecords($batchid);

        return view('admin.winerecords', compact('winerecords', 'batchid'));
    }
}
