<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
        const STATUS_SUCCESS         = 200;
        const STATUS_BAD_REQUEST     = 400;
        const STATUS_SEVER_ERROR     = 500;

        protected function responseSuccess ($data= Null, $message='') {
            $data = (object) [
              'data' => $data,
              'message' => $message,
                'status_code' => static::STATUS_SUCCESS
            ];
            return response()->json($data,static::STATUS_SUCCESS);
        }

        public function responseBadRequest ($message='') {
            $newData = [
                'message' => $message,
                'status_code' => static::STATUS_BAD_REQUEST
            ];
            return response()->json($newData, static::STATUS_BAD_REQUEST);
        }

        public function responseSeverError($message) {
            $data= [
                'message' => $message,
                'status_code' => static::STATUS_SEVER_ERROR
            ];
            return response()->json($data,static::STATUS_SEVER_ERROR);
        }
}
