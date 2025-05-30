<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\VisitsRecords;
use App\Models\Tweets as twt;
use App\Models\Hmlh as Hm;
use App\Livewire\HomePage;
use App\Livewire\Hmlh;
use App\Livewire\Tweets;
use App\Livewire\Showvist;
use App\Livewire\Reports1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\TelegramController;

Route::get('/', function () {
    $user=User::get();
    
    if(count($user)==0)
    {
        $data=new User();
        $data->name='admin';
        $data->email="admin@gmail.com";
        $data->password=Hash::make('YemenBank778899@#$');
        $data->save();
    }
    return view('welcome',['tw'=>[]]);
});

Route::get('/campaign/{id}', function ($id,Request $request) {
    // dd($request->ip());
    $tw = twt::where('hmlh_id',$id)->get();
    // dd($tw);
    $hm = Hm::where('uid',$id)->first();
    $ip = $request->ip();
    
    // جلب بيانات الموقع الجغرافي من ip-api.com
    $response = Http::get("http://ip-api.com/json/{$ip}?fields=status,continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,currency,isp,org,as,asname,mobile,proxy,hosting");
    $data = $response->json();

    $tweetr = new VisitsRecords();
    $tweetr->ip = $ip;
    $tweetr->hmlh_id = $id;
    if ($data['status'] === 'success') {
        $tweetr->continent = $data['continent'] ?? null;
        $tweetr->continent_code = $data['continentCode'] ?? null;
        $tweetr->country = $data['country'] ?? null;
        $tweetr->country_code = $data['countryCode'] ?? null;
        $tweetr->region = $data['region'] ?? null;
        $tweetr->region_name = $data['regionName'] ?? null;
        $tweetr->city = $data['city'] ?? null;
        $tweetr->district = $data['district'] ?? null;
        $tweetr->zip = $data['zip'] ?? null;
        $tweetr->lat = $data['lat'] ?? null;
        $tweetr->lon = $data['lon'] ?? null;
        $tweetr->timezone = $data['timezone'] ?? null;
        $tweetr->offset = $data['offset'] ?? null;
        $tweetr->currency = $data['currency'] ?? null;
        $tweetr->isp = $data['isp'] ?? null;
        $tweetr->org = $data['org'] ?? null;
        $tweetr->as = $data['as'] ?? null;
        $tweetr->asname = $data['asname'] ?? null;
        $tweetr->mobile = $data['mobile'] ?? false;
        $tweetr->proxy = $data['proxy'] ?? false;
        $tweetr->hosting = $data['hosting'] ?? false;
    }
    $tweetr->save();
    // if (!$request->hasCookie('visited')) {
       
    
    //     // ضبط كعكة الزيارة لمنع التكرار لمدة 10 دقائق
    //     Cookie::queue('visited', '1', 10);
    // }

    return view('welcome',['tw'=>$tw,'hm'=>$hm]);
})->name('campaign');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/homepage', HomePage::class)->name('homepage');
    Route::get('/hamlh', Hmlh::class)->name('hamlh');
    Route::get('/Tweets', Tweets::class)->name('Tweets');
    Route::get('/Reports1/{id}', Reports1::class)->name('Reports1');
    Route::get('/Showvist/{id}', Showvist::class)->name('Showvist');
});
Route::post('/telegram/webhook', [TelegramController::class, 'webhook'])->name('webhook');
