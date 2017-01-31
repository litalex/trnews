<?php
/**
 * Created by PhpStorm.
 * User: alexandrl
 * Date: 24.01.17
 * Time: 15:53
 *
 * @param array  $searchArray
 * @param string $needle
 * @return bool|int
 */
/*
 *  Функция для бинарного поиска элемента в упорядоченном массиве.
 *  Если искомых элементов в массиве несколько - возвращается первый из них.
 *  В случае, если массив пуст или искомое значение находится за пределами массива,
 *  возвращается false.
 * @param array $searchArray Отсортированный массив
 * @param int $needle Искомое значение
 * @return false|int вернёт позицию (int) искомого элемента в массиве или
                     вернёт false в случае, если элемент не найден или в случае какой-либо ошибки
*/
function binarySearch(array $searchArray, $needle)
{
    $arrayLength = sizeof($searchArray);
    if ( /* Проверка на пустой массив или позицию за пределами массива */
        !$arrayLength ||
        $needle < $searchArray[0] ||
        $needle > $searchArray[$arrayLength - 1]
    ) {
        return false;
    }
    $leftPosition = 0;
    $rightPosition = $arrayLength - 1;
    $returnPosition = false;

    while ($leftPosition < $rightPosition) {
        // Делим массив напополам
        $middlePosition = (int) floor($leftPosition + ($rightPosition - $leftPosition) / 2);

        if ($needle <= $searchArray[$middlePosition]) {
            $rightPosition = $middlePosition;
        } else {
            $leftPosition = $middlePosition + 1;
        }
    }

    /* Искомый элемент найден. $rightPosition - позиция искомого элемента */
    if ($searchArray[$rightPosition] === $needle) {
        $returnPosition = $rightPosition;
    }

    return $returnPosition;
}
