<?php
//Задача 1:
//Добавить фразы в массив:
//Тут как тут
//Коту тащат уток
//15.01.2002 10:51
//Я разуму уму заря
//Искать такси
//Дивен мне вид.
//В цикле проверить, является ли фраза полиндромом (т.е. одинаково читается задом наперед,
// например "А роза упала на лапу Азора"). Вывести фразы и ответы

function mb_strrev($str)
{
    $r = '';
    for ($i = mb_strlen($str); $i >= 0; $i--) {
        $r .= mb_substr($str, $i, 1);
    }
    return $r;
}

$phrases = ['Тут как тут', 'Коту тащат уток', '15.01.2002 10:51', 'Я разуму уму заря', 'Искать такси', 'Дивен мне вид'];


function checkPalindromes($phrases, $callback_strtolower, $callback_strrev)
{
    $palindromes = [];
    foreach ($phrases as $phrase) {
        $start_phrase = $phrase;
        $phrase = $callback_strtolower(str_replace([' ', '.', ':'], '', $phrase));
        $phrase_reverse = $callback_strrev($phrase);
        if ($phrase === $phrase_reverse) $palindromes[] = $start_phrase;
    }
    return $palindromes;
}

//var_dump(checkPalindromes($phrases,'mb_strtolower','mb_strrev'));