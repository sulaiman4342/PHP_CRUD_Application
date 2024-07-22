<?php

namespace App\Models;

require_once 'C:/xampp/htdocs/crud_application/src/config/config.php';

class DataModel
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = API_URL;
    }

    private function sendRequest($method, $endpoint, $data = [])
    {
        $url = $this->apiUrl . $endpoint;
        $ch = curl_init();

        switch ($method) {
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case 'PUT':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                if ($data)
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case 'DELETE':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
            default:
                if ($data)
                    $url = sprintf('%s?%s', $url, http_build_query($data));
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $result = curl_exec($ch);
        if (!$result) {
            die('Connection Failure');
        }
        curl_close($ch);
        return json_decode($result, true);
    }

    public function getAll()
    {
        return $this->sendRequest('GET', '/users');
    }

    public function create($data)
    {
        return $this->sendRequest('POST', '/users', $data);
    }

    public function update($id, $data)
    {
        return $this->sendRequest('PUT', "/users/{$id}", $data);
    }

    public function delete($id)
    {
        return $this->sendRequest('DELETE', "/users/{$id}");
    }
}
