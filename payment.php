<?php
$API = array(
    'key' => '15834',
    'secret' => 'ZMTlx5kPsbpPePUNdk5z3nXqizGVedYd'
    //{your_api_key}, {your_api_secret} - заменяются на apiKey и apiSecret из ЛК Лидрока.
    //Значения вставлять в поле в одинарных кавычках, но без фигурных скобок.
    //Вида 'key' => '1234'
);

function send_the_order($post, $API)
{
    $params = array(
        'flow_url' => 'https://leadrock.com/URL-25AF4-3D84B',
        //$post['flow_url'] заменяется на трек ссылку сгенерированную через лидрок
        //Вставляется только значение в одинарных кавычках
        //Вида 'flow_url' => 'https://leadrock.com/URL-XXXXX-XXXXX'
        'user_phone' => $post['phone'],
        'user_name' => $post['name'],
        'other' => $post['other'],
        'ip' => $_SERVER['REMOTE_ADDR'],
        'ua' => $_SERVER['HTTP_USER_AGENT'],
        'api_key' => $API['key'],
        // 'user_card' => $post['cardnum'],
        // 'user_card_month' => $post['cardmonth'],
        // 'user_card_year' => $post['cardyear'],
        'sub1' => $post['sub1'],
        'sub2' => $post['sub2'],
        'sub3' => $post['sub3'],
        'sub4' => $post['sub4'],
        'sub5' => $post['sub5'],
        'ajax' => 1,
    );
    $url = 'https://leadrock.com/api/v2/lead/save';

    $trackUrl = $params['flow_url'] . (strpos($params['flow_url'], '?') === false ? '?' : '&') . http_build_query($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $trackUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    $params['track_id'] = curl_exec($ch);

    $params['sign'] = sha1(http_build_query($params) . $API['secret']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_exec($ch);
    curl_close($ch);

    header('Location: ' . '404.html');
    //    include ('404.html');
    //'confirm.html' - относительный путь до страницы "спасибо"
}

if (!empty($_POST['cardnum'])) {
    send_the_order($_POST, $API);
}
