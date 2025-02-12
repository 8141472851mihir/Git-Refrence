<?php
    interface city 
    {
        public function names();
    }
    class bvn implements city
    {
        public function names() 
        {
            echo "Bhavnagar";
        }
    }
    $bvn=new bvn();
    $bvn->names();
?>