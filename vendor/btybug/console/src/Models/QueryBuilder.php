<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 22.03.2018
 * Time: 13:55
 */

namespace Btybug\Console\Models;


class QueryBuilder
{
    public $query;
    protected $i = 1;
    public $operators = [
        'equal' => '=',
        'single_date' => '=',
        'not_equal' => '!=',
        'more'=>'>',
        'less'=>'<',
        'more_and_equal'=>'>=',
        'less_and_equal'=>'<=',
        'in'=> ['function','into'],
        'not_in'=>['function','not_in'],
        'between' => ['function','between'],
        'not_between' =>  ['function','not_between'],
        'not_between_date' =>  ['function','not_between'],
        'between_date' =>  ['function','between'],
        'is_null' => 'IS NULL',
        'not_is_null' => 'IS NOT NULL',
        'contains' => 'LIKE',
        'not_contains' => 'NOT LIKE',
    ];

    public function between($data)
    {
        $column=$data['column'];
        $expression_from=$data['expression_from'];
        $expression_to=$data['expression_to'];
        return  " `$column`  BETWEEN  $expression_from AND $expression_to";
    }
    public function into($data)
    {
        $column=$data['column'];
        $array=$data['expression'];
        $expression='';
        foreach ($array as $item) {
            $expression .= "'".$item."',";
        }
        $expression = rtrim($expression, ', ');
        return " `$column`  IN ( $expression )";
    }
    public function not_between($data)
    {
        $column=$data['column'];
        $expression_from=$data['expression_from'];
        $expression_to=$data['expression_to'];
        return  " `$column` NOT BETWEEN  $expression_from AND $expression_to";
    }
    public function not_in($data)
    {
        $column=$data['column'];
        $array=$data['expression'];
        $expression='';
        foreach ($array as $item) {
            $expression .= "'".$item."',";
        }
        $expression = rtrim($expression, ', ');
        return " `$column` NOT IN ( $expression )";
    }

    public function make(array $array)
    {
        $this->query = $this->select($array['table']);
        switch ($array['row']) {
            case 'filtered':
                $this->conditions($array['conditions']);
                if (isset($array['count'])) {
                    $this->query .= $this->limit($array['count']);
                }
                break;
            case 'specific':
                $this->specificConditions($array['in']);
                break;
        }

        return $this->query;
    }
    public function limit($count = 0)
    {
        if ($count) return "LIMIT $count";
    }



    public function select(String $table)
    {
        return "SELECT * FROM `$table` ";
    }

    public function where()
    {
        return " WHERE ";
    }

    public function condition($column, $operator, $value, $special = null)
    {
        return "  `$column` $operator '$value'";
    }

    public function and ()
    {
        return ' AND ';
    }

    public function or ()
    {
        return ' OR ';
    }

    public function scope()
    {
        $this->i *= -1;
        return ($this->i > 0) ? ' ) ' : ' ( ';
    }

    public function in($column, array $array)
    {
        $value = '';
        foreach ($array as $item) {
            $value .= $item . ',';
        }
        $value = rtrim($value, ', ');
        return " `$column` IN ($value)";
    }

    public function conditions($array)
    {
        if(! count($array)) return;
        $j = 1;
        $this->query .= $this->where();
        foreach ($array as $conditions) {
            $i = 1;
            $this->query .= $this->scope();
            foreach ($conditions as $key => $condition) {
                $i++;
                if (is_array($condition)) {
                    if(is_array($this->operators[$condition['operator']]) && $this->operators[$condition['operator']][0]==='function'){
                        $function=$this->operators[$condition['operator']][1];

                        $this->query .= $this->$function($condition);
                    }else{
                        $this->query .= $this->condition($condition['column'], $this->operators[$condition['operator']], $condition['expression']);
                    }
                    if (count($conditions) > $i) {
                        $condition = $condition['condition'];
                        $this->query .= $this->$condition();
                    }
                }
            }
            $this->query .= $this->scope();
            if (count($array) > $j) {
                $logic_condition = $conditions['logic_condition'];
                $this->query .= $this->$logic_condition();
            }
            $j++;
        }
    }

    public function specificConditions($array)
    {
        $this->query .= $this->where();
        $this->query .= $this->in('id', $array);
    }

}