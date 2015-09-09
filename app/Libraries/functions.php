<?php

function password($password)
{
    return md5('k' . md5($password . 5));
}