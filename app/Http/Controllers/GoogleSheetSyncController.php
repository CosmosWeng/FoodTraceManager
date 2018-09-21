<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Sheets;

class GoogleSheetSyncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response response
     */
    public function index(Request $request)
    {
        //
        $client = new Google_Client();
        $client->setApplicationName('Client_Library_Examples');
        $client->setDeveloperKey(env('GOOGLE_CLIENT_KEY'));

        $service = new Google_Service_Sheets($client);

        // Prints the names and majors of students in a sample spreadsheet:
        // https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
        $spreadsheetId = '1BIqjLtauqhtIjX1b9EmmYPbY9zHS9jJs7MdcsaGEcOM';
        $range         = '麵粉!A2:E';
        $response      = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values        = $response->getValues();

        dd($values);

        if (empty($values)) {
            print "No data found.\n";
        } else {
            print "Name, Major:\n";
            // foreach ($values as $row) {
            //     // Print columns A and E, which correspond to indices 0 and 4.
            //     printf("%s, %s\n", $row[0], $row[4]);
            // }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
