<?php
$dir = 'public/images/house/';
$file = 'imageList.json';
$json = file_get_contents($dir . $file);
$arr = json_decode($json, true);

function getSlider()
{
    global $dir;
    global $arr;
    foreach ($arr as $key => $value): ?>
        <li>
            <img id='house<?= $key; ?>' src='<?= $dir . $value; ?>' class='<?= $key; ?>' alt='<?= $key; ?>'/>
        </li>
    <? endforeach;
    echo '<script src="../public/js/runSlider.js"></script>';
}

function getSelect()
{
    global $arr;
    $index = 1;
    foreach ($arr as $key => $value) :?>
        <option value="<?= $index++ ?>"><?= $key; ?> </option>
    <? endforeach;
}
