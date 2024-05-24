<?php



use App\Models\Setting;


function update_static_option($key,$value){

    $static_option = null;
    if ($static_option === null){
        $static_option = Setting::query();
    }
    $static_option->updateOrCreate(['key' => $key],[
        'key' => $key,
        'value' => $value
    ]);
    \Illuminate\Support\Facades\Cache::forget($key);
    return true;

}

function get_static_option($key,$default = null)
{
    global $option_name;
    $option_name = $key;
    $value = \Illuminate\Support\Facades\Cache::remember($option_name,6400, function () {
        global $option_name;
        return Setting::where('key', $option_name)->first();
    });

    return $value->value ?? $default;
}