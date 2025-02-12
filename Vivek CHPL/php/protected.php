<?php
    class language
    {
        public $name,$city;
        public function __construct($name,$city)
        {
            $this->name=$name;
            $this->city=$city;
        }
        protected function data()
        {
            echo "Hello : {$this->name}"," || ","Your city is : {$this->city}";
        }
    }
    class information extends language 
    {
        function msg()
        {
            echo "Extended Msg <br>";
            $this->data();
        }
    }
    $info=new information("Vivek","A'bad");
    $info->msg();
?>