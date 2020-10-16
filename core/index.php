<?php
    header('Content-type:application/json;charset=utf-8');
    header('Access-Control-Allow-Origin:http://localhost:5000');

    if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
    {
        /**
         * mb_ucfirst - преобразует первый символ в верхний регистр
         * @param string $str - строка
         * @param string $encoding - кодировка, по-умолчанию UTF-8
         * @return string
         */
        function mb_ucfirst($str, $encoding='UTF-8')
        {
            $str = mb_ereg_replace('^[\ ]+', '', $str);
            $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
                   mb_substr($str, 1, mb_strlen($str), $encoding);
            return $str;
        }
    }
    

    spl_autoload_register();
    $request = new Request();
    
    $db = new PDO('sqlite:db/mf-phones.db');

    
$val = "";
if ($request->fam != "") {
    $val = "q.fam LIKE '%".mb_ucfirst($request->fam)."%'";
}

if ($request->name != "") {
    if ($val != "") {
        $val = $val." and ";
    }
    $val = $val."q.name LIKE '%".mb_ucfirst($request->name)."%'";
}

if ($request->otch != "") {
    if ($val != "") {
        $val = $val." and ";
    }
    $val = $val."q.otch LIKE '%".mb_ucfirst($request->otch)."%'";
}

if ($val != "") {
    $val = " where ".$val;
}

    $q = $db->query('select q.id, q.fam, q.name, q.otch, p.name as post, d.name as dept, q.phone from person as q join post as p on q.post = p.id join department as d on q.department = d.id '.$val.' order by  q.fam, q.name, q.otch');
    $result = $q->fetchAll(PDO::FETCH_CLASS);
    
    $db->exec('insert into stat (ip, timestamp, data) values ("'.$_SERVER['REMOTE_ADDR'].'", '.$_SERVER['REQUEST_TIME'].', "'.$request->fam.' '.$request->name.' '.$request->otch.'")');

echo json_encode($result, JSON_UNESCAPED_UNICODE);

    