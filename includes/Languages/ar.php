<?php

function lang($word)
{
    static  $lang = array(
        //Dashboard 
        'HOME_ADMIN' => "الرئيسيه",
        'CATEGORYS'=>'الفئات',
        'ITEMS'=>'المنتجات',
        'MEMBER'=>'الاعضاء',
        'STATISTICS'=>'الاحصائيات',
        'LOGS'=>'Logs',
        'COMMENT' => "التعليقات"
    );
    
    return $lang[$word];
}



