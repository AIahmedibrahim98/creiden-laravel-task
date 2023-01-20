<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    public static function delete($item_id)
    {
        try {
            $item = Http::delete(env('wordpress_url') . '/items/v1/items/' . $item_id);
            $item = json_decode($item);
            if ($item->success === true) {
                return true;
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return false;
        }
    }

    public static function get_item($item_id)
    {
        try {
            $item = Http::get(env('wordpress_url') . '/items/v1/items/' . $item_id);
            $item = json_decode($item);
            if ($item->success === true) {
                return $item->data;
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return false;
        }
    }

    public static function update_item($item_id,$data)
    {
        try {
            $item = Http::put(env('wordpress_url') . '/items/v1/items/update/' . $item_id, [
                'title' => $data['title'],
                'content' => $data['content'],
            ]);
            $item = json_decode($item);
            if ($item->success === true) {
                return true;
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return false;
        }
    }
}
