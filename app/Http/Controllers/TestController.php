<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class TestController extends Controller
{
    public function getWineCollection()
    {
        $client = new Client();

        $request = $client->get('http://www.nataliemaclean.com/api/winedata/v1/', [
            'query'   => ['mode'    => 'winerecords',
                          'batchid' => '758'
            ],
            'headers' => [
                'apikey'  => 'XaIyxWEh4Mr5Fpfe0P6jf3F93f',
                'apipass' => 'Of2rKFpwY49JJwzl3xxVzZs45x'
            ]
        ]);

        $result = $request->getBody(true)->getContents();
        $wineresult = json_decode($result, true);

        //$collectionresult = $collection->count();
        //$collectionresult = count($collection);

        return $wineresult;
    }

    public function paginateRecords(){

        $searchResults = $this->getWineCollection();
        $searchResultsData = collect($searchResults)->all();
        foreach ($searchResultsData['records'] as $item) {
            echo $item['id'];
            echo '<br>';
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection($item);

        //Define how many items we want to be visible in each page
        $perPage = 5;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $paginatedSearchResults = new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        return view('admin.testcollection', compact('paginatedSearchResults'));
    }

    public function index() {
        $winecollection = $this->getWineCollection();

        return view('admin.testcollection', compact('winecollection'));
    }
}
