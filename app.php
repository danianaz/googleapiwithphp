<?php
/**
 * Created by PhpStorm.
 * User: dania.naz
 * Date: 3/13/2019
 * Time: 8:04 AM
 */

 require __DIR__ . '/vendor/autoload.php';

/*if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}*/
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */


    $client = new Google_Client();
    $client->setApplicationName('');
    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
    $client->setAuthConfig('MyPHPSheet-13319-sheets_api_secret.json');
    $client->setAccessToken('9b95f76178c6e4e75582284b3dcfdfe9a6e81fed');

    $service = new Google_Service_Sheets($client);

    $sheetInfo = $service->spreadsheets->get('1QfnhDa69TvbdwVlu29BT9VvWJUNCMPNGFKZ8D1z5-L8')->getProperties();

    print('Sheet Title = '.$sheetInfo['title'] . PHP_EOL);
    echo "<br />";

    $options = array('valueInputOption' => 'RAW');

    /*$values = [
        ["Name", "Roll No.", "Contact"],
        ["Anis", "001", "+88017300112233"],
        ["Ashik", "002", "+88017300445566"]
    ];

    $body   = new Google_Service_Sheets_ValueRange(['values' => $values]);
    $result = $service->spreadsheets_values->update('1QfnhDa69TvbdwVlu29BT9VvWJUNCMPNGFKZ8D1z5-L8', 'A1:C3', $body, $options);
    print($result->updatedRange. PHP_EOL);*/

    $values = [
        ["DAnny", "003", "+88017300778899"]
    ];

    $body   = new Google_Service_Sheets_ValueRange(['values' => $values]);
    $result = $service->spreadsheets_values->append('1QfnhDa69TvbdwVlu29BT9VvWJUNCMPNGFKZ8D1z5-L8', 'A1:C1', $body, $options);

    echo "<br />";
    printf("Updated Cells = " . $result->getUpdates()->getUpdatedRange(). PHP_EOL);
    printf("%d cells appended.", $result->getUpdates()->getUpdatedCells());

    /* Getting the updating data */
    //$range = $result->updatedRange;
    $spreadsheetId = '1QfnhDa69TvbdwVlu29BT9VvWJUNCMPNGFKZ8D1z5-L8';
    $result = $service->spreadsheets_values->get($spreadsheetId, 'A1:C24');
    $numRows = $result->getValues() != null ? count($result->getValues()) : 0;
    printf("%d rows retrieved.", $numRows);
    /*
    foreach ($result->getValues() as $rows){

    }*/
    echo "<pre>";
        print_r($result->getValues());

echo "<pre/>";
