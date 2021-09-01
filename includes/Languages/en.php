<?php

function lang($word)
{
    static  $lang = array(
        //Dashboard 
        'HOME_ADMIN' => "Dashboard",
        'CATEGORYS'=>'Category',
        'ITEMS'=>'Items',
        'MEMBER'=>'Member',
        'STATISTICS'=>'Statistics',
        'LOGS'=>'Logs',
        'COMMENT' => "Comments"
    );

    return $lang[$word];
}
