<?php

$var = "ram(.kumar)@exa//mple.com";

$var = filter_var($var, FILTER_SANITIZE_EMAIL);

if(filter_var($var, FILTER_VALIDATE_EMAIL))
{
    echo "$var is valid Email.";
}
else
{
    echo "‹br›$var is not an valid Email.";
}

?>