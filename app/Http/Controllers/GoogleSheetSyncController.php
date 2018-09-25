<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Sheets;
use Google_Service_Drive;
use DB;
use Schema;
use App\Utils\Util;
use App\Models\Product;
use App\Models\Category;

class GoogleSheetSyncController extends AppBaseController
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function sync(Request $request)
    {
        $config = $this->getConfig();
        // clear data
        DB::table('categories')->truncate();

        header('Content-type: text/html; charset=utf-8');
        for ($i = 0; $i < 10; $i++) {
            echo $i;
            flush();
            sleep(1);
        }

        // run setting
        // foreach ($config as $index => $setting) {
        //     $this->format($setting);
        // }
    }

    public function format(array $data)
    {
        $tableType               = array_shift($data);
        list($tableName, $type)  = array_pad(explode(':', $tableType), 2, null);
        if ($tableName == 'category' && $type) {
            $this->setCategory($type, $data);
        }

        $method = 'set'.ucfirst($tableName);
        if (empty($type) && method_exists($this, $method)) {
            $this->$method($data);
        }
    }

    public function getProductField($data, $changType = false)
    {
        $setting = [];
        foreach ($data as $value) {
            list($fieldName, $fieldKey, $fieldType) = array_pad(explode(':', $value), 3, null);
            if (empty($fieldName) || empty($fieldKey)) {
                // 格式錯誤
                return false;
            }
            if ($fieldKey == 'null') {
                continue;
            }

            if ($changType) {
                $setting[$fieldKey] = $fieldType;
            } else {
                $setting[$fieldKey] = $fieldName;
            }
        }

        return $setting;
    }

    public function setProducts($data)
    {
        # code...
        $setting    = $this->getProductField($data);
        $categories = DB::table('categories')->where('type', 'products')->get();
        $products   = [];
        foreach ($categories as $category) {
            $sheets = $this->run($category->name);
            $key    = array_shift($sheets);

            $productIndex = [];
            foreach ($setting as $field => $value) {
                foreach ($key as $index => $keyVal) {
                    if ($value == $keyVal) {
                        $productIndex[$field] = $index;
                        continue;
                    }
                }
            }
            // dd($productIndex, $key, $sheets);
            $type = $this->getProductField($data, true);
            foreach ($sheets as $sheet) {
                foreach ($productIndex as $field => $index) {
                    if (isset($sheet[$index])) {
                        if (isset($type[$field]) && $type[$field]) {
                            if ($type[$field] == 'array') {
                                $product[$field] = Util::JsonEncode(explode("\n", $sheet[$index]));
                            }
                        } else {
                            $product[$field] = $sheet[$index];
                        }
                    }
                }
                $product['category_id'] = $category->id;
                $products[]             = $product;
            }
        }
        // dd($products);
        $db = DB::table('products');
        $db->truncate();
        $db->insert($products);
        // copy image
    }

    public function setCategory($type, $data)
    {
        $data = array_map(function ($row) use ($type) {
            return [
                'name' => $row,
                'type' => $type
            ];
        }, $data);

        DB::table('categories')->insert($data);
    }

    /**
     *
     */
    public function getConfig()
    {
        $config = $this->run(env('SHEET_CONFIG_NAME', '設定'));
        $key    = array_shift($config);

        return $config;
    }

    /**
     *
     */
    public function run($range = '設定')
    {
        $client = new Google_Client();
        $client->setApplicationName('Foodsafy');
        $client->setDeveloperKey(env('GOOGLE_CLIENT_KEY'));

        $spreadsheetId = env('GOOGLE_SPREAD_SHEET_Id');

        // File 修改時間
        $service       = new Google_Service_Drive($client);
        $response      = $service->files->get($spreadsheetId, ['fields' => 'id,name,modifiedTime']);
        $modifiedTime  = $response->modifiedTime;

        // Sheet
        $service       = new Google_Service_Sheets($client);
        $response      = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values        = $response->getValues();

        if (empty($values)) {
            print "No data found.\n";

            return $this->sendError('No data found.');
        }

        return $values;
    }
}
