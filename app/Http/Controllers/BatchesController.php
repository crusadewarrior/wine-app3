<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BatchesController extends Controller
{

    /**
     * Get the api data
     * @param $page
     * @return mixed
     */
    public function getApiData($page)
    {
        $client = new Client();

        $request = $client->get('http://www.nataliemaclean.com/api/winedata/v1/', [
            'query' => ['mode' => 'batches',
                        'page' => $page
            ],
            'headers' => [
                'apikey' => 'XaIyxWEh4Mr5Fpfe0P6jf3F93f',
                'apipass' => 'Of2rKFpwY49JJwzl3xxVzZs45x'
            ]
        ]);
        $result = $request->getBody(true)->getContents();
        $data = json_decode($result, true);

        return $data;
    }

    /**
     * Paginate the fetch result
     * Divide the total records to get the right number of pages
     * @return LengthAwarePaginator
     */

    public function paginateDataRequest($page){
        $datacollection = $this->getApiData($page);

        $datacollectionarray = $datacollection['totalrecords'];

        $pages = $datacollectionarray / 30;

        $searchResults = range(1, ceil($pages));

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection($searchResults);

        //Define how many items we want to be visible in each page
        $perPage = 1;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $paginatedSearchResults = new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
        return $paginatedSearchResults;
    }

    /**
     * Show the batches page
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $result = $this->paginateDataRequest($page)->setPath('/admin/batches');
        $data = $this->getApiData($page);
        return view('admin.batches', compact('data', 'result'));
    }
}
