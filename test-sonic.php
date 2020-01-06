<?php 

class SonicTest{

    private function findPatternMode(array $list_integer)
    {
        $diffArr = [];
        $n = sizeof($list_integer);
        for($i=0; $i < ($n - 1); $i++):
            $first_num  = $list_integer[$i];
            $second_num = $list_integer[$i + 1];
            
                $diffArr[] = $second_num - $first_num;
        endfor;

        $values_diff  = array_count_values($diffArr); 
        $pattern_mode = array_search(max($values_diff), $values_diff);
        return $pattern_mode;
    }

    public function missingTermAP(int $n = 0, array $list_integer)
    {
        $pattern_mode = $this->findPatternMode($list_integer);
        $n            = sizeof($list_integer);
        $missing_num = []; 
        for($i = 0; $i < ($n -1); $i++):
            $first_num      = $list_integer[$i];
            $second_num     = $list_integer[$i + 1];
            $diff_each_num  = $second_num - $first_num;

            if($diff_each_num != $pattern_mode){
                $missing = $second_num - $pattern_mode ;
                $missing_num[] = $missing;
            }
        endfor;
        return implode(",",$missing_num);
    }

    public function countPrimesNumber(int $limit)
    {
        $prime_numbers = [];
        for($i = 1; $i <= $limit; $i++): 
            $counter = 0; 
            for($j = 1; $j <= $i; $j++):
                if($i % $j == 0){ 
                    $counter++; 
                }
            endfor;

            if($counter == 2){ 
             $prime_numbers[] = $i;
            }
        endfor;
        return sizeof($prime_numbers);
    }
}

$sonic = new SonicTest;

/*-------------------Test Case Find Missing term in Arithmatic Progression Function---------------------------*/
$array_integer = array(1,3,5,9,11);
$n = 5;
echo 'Result Find Missing term in Arithmatic Progression Function => '.$sonic->missingTermAP($n, $array_integer).'<br>';

/*-------------------Test Case for Count Primes Number Function---------------------------*/

$limit = 100;
$pcount_prime = $sonic->countPrimesNumber($limit);
echo 'Result Count Primes Number Function Function => '.json_encode($pcount_prime);

