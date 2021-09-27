<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\LogoRequest;
use App\Http\Requests\Setting\StoreGeneralRequest;
use App\Http\Requests\Setting\UpdateContactRequest;
use App\Http\Requests\Setting\UpdateGeneralRequest;
use App\Models\Language;
use App\Models\Setting;
use App\Models\SettingTranslatable;
use App\Repositories\Setting\SettingInterface;
use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $settingRepo;

    public function __construct(SettingInterface $settinginterface)
    {
        $this->settingRepo = $settinginterface;
    }



    public function files()
    {
        $robot = _readFile('robots.txt');
        $sitemap = _readFile('sitemap.xml');
        $logo = Setting::first()->logo;

        return view('admin.setting.files', compact('robot', 'sitemap', 'logo'));
    }
    public function logo(LogoRequest $request)
    {
        $logo = $this->settingRepo->logo($request->validated());

        return _stsCheck($logo);
    }

    public function robot(Request $request)
    {
        $oldText = _readFile('robots.txt');
        try {
            _writeFile('robots.txt', $request->robot);
            $msg =  response()->json(['operation' => true, 'data' => [], 'msg' => 'Robots.txt Uğurla Dəyişdirildi !'], 200);
        } catch (Exception $e) {
            _writeFile('robots.txt', $oldText);
            $msg = response()->json(['operation' => false, 'data' => [], 'msg' => 'Yükləmə Zamanı Xəta Yarandı !'], 200);
        }
        return _stsCheck($msg);
    }
    public function sitemap(Request $request)
    {
        $oldText = _readFile('sitemap.xml');
        try {
            _writeFile('sitemap.xml', $request->sitemap);
            $msg =  response()->json(['operation' => true, 'data' => [], 'msg' => 'Sitemap Uğurla Dəyişdirildi !'], 200);
        } catch (Exception $e) {
            _writeFile('sitemap.xml', $oldText);
            $msg = response()->json(['operation' => false, 'data' => [], 'msg' => 'Yükləmə Zamanı Xəta Yarandı !'], 200);
        }
        return _stsCheck($msg);
    }
    public function contact()
    {
        $contact = Setting::first();

        return view('admin.setting.contact',compact('contact'));
    }
    public function contactUpdate(UpdateContactRequest $request)
    {
        $contact = $this->settingRepo->contact($request->validated());

        return _stsCheck($contact);
    }
}
