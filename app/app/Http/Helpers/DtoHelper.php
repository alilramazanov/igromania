<?php

namespace App\Http\Helpers;

trait DtoHelper
{

    /**
     * Метод для преобразования объекта DTO в ассоциативный массив.
     * Метод работает используя функции-геттеры, чтобы использовать название функций без
     * префикса 'get' в качестве ключа, и результат выполнения этих функций в качестве значений.
     * Если метод возвращает null, то запись "ключ => значение" не создается
     *
     * Этот метод принимает в себя объект класса, префикс функции, и возвращает ассоциативный массив
     *       имя_функции_без_префикса => значение_функции
     * чтобы указать, какие функции нужно включить, используется префикс
     *
     * Чтобы метод работал, в классе dto должны быть реализованы геттеры свойств
     *
     * @param $object
     * @param $prefixMethod
     * @return array
     */

    public static function getArrayOfMethodValues($object, $prefixMethod){
        $class = get_class($object);
        $data = [];
        $functions = get_class_methods($class);
        $functions = array_filter($functions, function ($value) use ($prefixMethod){
            return preg_match("/$prefixMethod/",$value);
        });

        foreach ($functions as $function){
            if (!is_null($object->$function())){
                $key = strtolower( str_replace($prefixMethod, '',$function));
                $data[$key] = $object->$function();

            }
        }
        return $data;

    }


    /**
     * Этот метод заполняет DTO объект значениями из массива.
     * Чтобы метод заполнил dto класс значениями, структура в массиве должна быть следующей:
     *      название_сеттера_функции => значение
     * Название сеттера функции должно быть без префикса set, оно будет добавлено автоматически
     *
     * Чтобы автозаполнение работало, у класса DTO должны быть сеттеры, и массив должен содержать
     * правильные ключи
     *
     *
     * @param $object
     * @param $fields
     * @return bool
     */

    public static function makeDtoObjectFromArray($object, $fields){

        foreach($fields as $key => $value){
            $method = "set" . str_replace($key[0], strtoupper($key[0]),$key);
            $object->$method($value);

        }
        return true;

    }

}