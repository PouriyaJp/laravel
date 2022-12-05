<?php

use Morilog\Jalali\Jalalian;

function jalaliDate($date, $format = '%A, %d %B %Y')
{
    return Jalalian::forge($date)->format($format); // دی 02، 1391
}

function convertPersianToEnglish($number)
{
    $number = str_replace('٠', '0', $number);
    $number = str_replace('١', '1', $number);
    $number = str_replace('٢', '2', $number);
    $number = str_replace('٣', '3', $number);
    $number = str_replace('۴', '4', $number);
    $number = str_replace('۵', '5', $number);
    $number = str_replace('۶', '6', $number);
    $number = str_replace('٧', '7', $number);
    $number = str_replace('٨', '8', $number);
    $number = str_replace('٩', '9', $number);

    return $number;
}

function convertArabicToEnglish($number)
{
    $number = str_replace('٠', '0', $number);
    $number = str_replace('١', '1', $number);
    $number = str_replace('٢', '2', $number);
    $number = str_replace('٣', '3', $number);
    $number = str_replace('٤', '4', $number);
    $number = str_replace('۵', '5', $number);
    $number = str_replace('٦', '6', $number);
    $number = str_replace('٧', '7', $number);
    $number = str_replace('٨', '8', $number);
    $number = str_replace('٩', '9', $number);

    return $number;
}

function convertEnglishToPersion($number)
{
    $number = str_replace('0', '٠', $number);
    $number = str_replace('1', '١', $number);
    $number = str_replace('2', '٢', $number);
    $number = str_replace('3', '٣', $number);
    $number = str_replace('4', '۴', $number);
    $number = str_replace('5', '۵', $number);
    $number = str_replace('6', '۶', $number);
    $number = str_replace('7', '٧', $number);
    $number = str_replace('8', '٨', $number);
    $number = str_replace('9', '٩', $number);

    return $number;
}

function priceFormat($price)
{
    $price = number_format($price, 0, '/', ',');
    $price = convertEnglishToPersion($price);

    return $price;
}
