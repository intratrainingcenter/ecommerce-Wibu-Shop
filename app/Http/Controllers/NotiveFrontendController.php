<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotiveFrontendController extends Controller
{
  public function sendMessage(Request $request) {
      $content      = array(
          "en" => $request->message
      );
      $headings     = array(
          "en" => 'New Massage!!!'
      );
      $url     = "test";

      $fields = array(
          'app_id' => "4f816c01-60fc-425e-9c4c-57cd67cffb1b",
          'contents' => $content,
          'headings' => $headings,
          'url' => $url,
      );

      $fields = json_encode($fields);
      print("\nJSON sent:\n");
      print($fields);

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json; charset=utf-8',
          'Authorization: Basic MzdiMGNkNjgtNjQzYS00MmYxLThjYTMtOTExOWE5MGM2MTY2'
      ));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_POST, TRUE);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

      $response = curl_exec($ch);
      curl_close($ch);
  }

}
