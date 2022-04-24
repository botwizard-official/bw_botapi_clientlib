<?php

namespace BotapiClient\Helpers;

use BotapiClient\BotapiException;
use CURLFile;

final class Util {

    private function __construct() {
        
    }

    public static function makeHeadersArray($methodName, $accessToken) {
        $auth = sprintf('authorization: bearer %s', $accessToken);
        $method = sprintf('x-method-name: %s', $methodName);
        return [
            $auth,
            $method,
            'accept: application/json',
        ];
    }

    public static function makePostbody($botid, $params, array $files = []) {
        $postbody = [
            'botid' => intval($botid),
            'payload' => json_encode($params),
        ];
        foreach ($files as $field => $file) {
            $filename = $file->getFilename();
            $mime = $file->getMimetype();
            $postname = $file->getPostname();

            if (empty($mime)) {
                $mime = mime_content_type($filename);
            }
            if (empty($postname)) {
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $postname = sprintf('%s%d.%s',
                        $field, time(), $ext);
            }

            $postbody[$field] = new CURLFile($filename, $mime, $postname);
        }
        return $postbody;
    }

    public static function doPost(
            $url, array $postbody, array $headers, $timeout) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, strval($url));
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postbody);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec($ch);
        curl_close($ch);
        if (empty($out)) {
            throw new BotapiException('server response is empty');
        }
        return $out;
    }

    public static function parseJson($raw) {
        $data = json_decode($raw, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            // TODO error code
            throw new BotapiException(json_last_error_msg() . ':' . $raw);
        }
        return $data;
    }

}
