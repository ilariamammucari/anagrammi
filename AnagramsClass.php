<?php

class Anagrams {
    public function anagrams(string $word1, string $word2)
    {
        $result = [];

        // controllo case-insensitive
        $word1 = strtolower(trim($word1));
        $word2 = strtolower(trim($word2));
    
        // compongo tutti gli anagrammi della parola inserita
        $count = 0;
        while (count($result) !== $this->countAnagrams($word1)) {
            $str = str_split($word1);
            shuffle($str);
            $anagram = implode($str);
            if (!in_array($anagram, $result)) {
                $result[$count++] = $anagram;
                // echo $anagram . '</br>';
            }
        }

        // verifico se nella seconda stringa esiste un anagramma della prima stringa
        $check = false;
        $anagram_checked = '';
        foreach ($result as $res) {
            if(str_contains($word2, $res)){
                $check = true;
                $anagram_checked = $res;
                break;
            }
        }

        if( $check ){
            echo '<div style="color:green;">Vero, nella stringa ' . $word2 . ' è contenuto un anagramma di ' . $word1 . ': ' . $anagram_checked . '</div>';
        }else{
            echo '<div style="color:red;">Falso, nella stringa ' . $word2 . ' non è contenuto un anagramma di ' . $word1 . '</div>';
        }
    }

    private function countAnagrams($param)
    {
        // conto le ripetizioni delle lettere nella parola
        $result = [];
        $letters = str_split($param);
        foreach ($letters as $letter) {
            if( isset($result[$letter]) ){
                $result[$letter][0] += 1;
            }else{
                $result[$letter] = array(1);
            }
        }


        // determino i fattoriali al denominatore
        $denominators = [];
        foreach ($result as $key => $val) {
            if( $result[$key][0] > 1 ){
                $denominators[] = $result[$key][0];
            }
        }

        if (empty($denominators)) {
            //svolgo il fattoriale al numeratore
            $n = strlen($param);
            $i = strlen($param) - 1;
            while($i !== 1){
                $n *= $i;
                $i--;
            }

            $combination = $n;
        }else {
            //svolgo il fattoriale al numeratore
            $n = strlen($param);
            $i = strlen($param) - 1;
            while($i !== 1){
                $n *= $i;
                $i--;
            }

            //svolgo i fattoriali al denominatore
            $denominators_product = [];
            foreach ($denominators as $denominator) {
                $nd = $denominator;
                $j = $denominator - 1;
                while($j !== 1){
                    $nd *= $j;
                    $j--;
                }

                $denominators_product[] = $nd;
            }
            
            $combination = $n/array_product($denominators_product);
        }

        return $combination;
    }
}

?>