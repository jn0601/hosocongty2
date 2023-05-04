<?php
include('simple_html_dom.php');
$html = file_get_html('https://hosocongty.vn/danh-sach-cong-ty-moi-thanh-lap.htm');

$html = $html->find('.box_content', 0)->first_child();
$dataLink = [];
foreach (str_get_html($html)->find('.hsdn li div a') as $item) {
    $dataLink[] = $item->href;
}
$url = 'https://hosocongty.vn/';
$listData = [];
$listItems = [];
foreach ($dataLink as $data) {
    $getHtml = file_get_html($getData = $url . $data);
    $getData = $getHtml->find('.box_content .hsdn', 0);
    $check = $getHtml->find('.module_data .category label', 0);


    foreach ($getHtml->find('.next-page a') as $page) {
        $checkPT = $page->plaintext;
        //echo $phan_trang . "<br>";
    }
   
    if ($check->innertext != '0') {
       
        foreach (str_get_html($getData)->find('li') as $items) {
            if (!empty(str_get_html($items)->find('h3 > a', 0)->innertext)) {
                $listItems['title'] = str_get_html($items)->find('h3 > a', 0)->innertext;
                array_push($listData, $listItems);
                var_dump($checkPT);
                for ($i = 1; $i <= $checkPT; $i++) {
                    if($i >= 2){
                       
                        // $getHtmlPt = file_get_html($getData = $url . $data."page-".$i);
                        // $getDataPt = $getHtml->find('.box_content .hsdn', 0);

                        // foreach (str_get_html($getData)->find('li') as $items) {
                        //     if (!empty(str_get_html($items)->find('h3 > a', 0)->innertext)) {
                        //         $listItems['title'] = str_get_html($items)->find('h3 > a', 0)->innertext;
                        //         array_push($listData, $listItems);
                        //     } 
                        // }
                    }
                }
            }

            //$listItems['maSoThue'] = str_get_html($items)->find('div > a',0)->innertext;
        }
    }
}
echo '<pre>';
print_r($listData);
echo '</pre>';