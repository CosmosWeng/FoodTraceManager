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
        DB::transaction(function () {
            DB::table('categories')->delete();
            // run setting
            $config = $this->getConfig();
            foreach ($config as $index => $setting) {
                $this->format($setting);
            }
        });

        echo '最後請確認 圖片 是否上傳至 指定資料夾!'.'<br>';
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

    public function setKnowledge($data)
    {
        $setting   = $this->getField($data);
        $sheets    = $this->run('新知');
        $key       = array_shift($sheets);
        $itemIndex = [];
        foreach ($setting as $field => $value) {
            foreach ($key as $index => $keyVal) {
                if ($value == $keyVal) {
                    $itemIndex[$field] = $index;
                    continue;
                }
            }
        }
        //
        $items = [];
        $type  = $this->getField($data, true);
        foreach ($sheets as $sheet) {
            $item = [];
            foreach ($itemIndex as $field => $index) {
                if (isset($sheet[$index])) {
                    if (isset($type[$field]) && $type[$field]) {
                        if ($type[$field] == 'array') {
                            $item[$field] = Util::JsonEncode(explode("\n", $sheet[$index]));
                        }
                    } else {
                        $item[$field] = $sheet[$index];
                    }
                }
            }
            $items[]              = $item;
        }

        $db = DB::table('knowledges');
        $db->delete();
        $db->insert($items);

        echo '食安新知 同步完成'.'<br>';
    }

    public function setProducts($data)
    {
        # code...
        $setting    = $this->getField($data);
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
            $type = $this->getField($data, true);
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
        $db->delete();
        $db->insert($products);
        // copy image
        echo '食安資訊 同步完成'.'<br>';
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
        echo $type.' 分類 同步完成'.'<br>';
    }

    public function getField($data, $changType = false)
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
