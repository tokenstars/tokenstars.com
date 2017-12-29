<?php

use App\Models\Accounts\Currency;

function currencies()
{
    $currencies = config("app.default_wallet_currencies");
    return Currency::whereIn('code', $currencies)->get();
}

function long_number_format($number)
{
    if (! is_string($number)) {
        $number = (string) $number;
    }
    $number = rtrim($number, '0');
    if (strlen($number) === 0) {
        return '0';
    }
    $decimals = 0;
    if (str_contains($number, '.')) {
        $decimals = strlen(str_after($number, "."));
    }
    return number_format($number, $decimals);
}

/**
 * @param $user_id - User ID
 * @param $type - 1 Logged, 2 Changed profile, 3 Add request tallant
 * @param $data 1 [ip], 2, 3
 */
function save_to_history($user_id, $type, $data = [])
{
    $statuses = [
        1 => 'You logged into this account from IP address [ip]',
        2 => 'You have changed your profile',
        3 => 'You added a scouting application № [talant_id]',
        4 => 'Change player status',
        5 => 'Application accepted and submitted for expert’s review. You’ve earned [amount] [token_name] tokens',
        6 => 'Application approved by experts. You’ve earned [amount] [token_name] tokens.',
        7 => 'Voting finished, application supported by community. You’ve earned [amount] [token_name] tokens.',
        8 => 'Contract with player signed. You’ve earned [amount] [token_name] tokens.',
        9 => 'Application rejected.',
        10 => 'Application rejected by experts.',
        11 => 'Votting finished, application rejected by community.',
    ];

    if(empty($statuses[$type])) return false;

    $history = new \App\Models\History();
    $history->user_id = $user_id;
    $history->data = json_encode($data);
    $history->event_type = $type;
    $history->event = $statuses[$type];
    $history->save();
}


function get_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
