<?php
/**
 * Created by PhpStorm.
 * User: valeria
 * Date: 4/22/18
 * Time: 10:07 PM
 */

namespace App\Services;
use CristianPontes\ZohoCRMClient\ZohoCRMClient;
use Illuminate\Support\Facades\Config;

class ZohoService
{
    private $client;

    public function __construct()
    {
        $this->client = new ZohoCRMClient('Contacts', ZohoAuthorization::getAuthToken());
    }

    public function show($id, $field){
        return $this->client->getRecordById($id)->selectColumns($field)->request()[1]->data;
    }

    public function update($id, $field, $value){
        $this->client->updateRecords()->addRecord(
            [
                'Id' => $id,
                $field => $value
            ]
        )->request();
    }
}