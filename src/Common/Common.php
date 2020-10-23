<?php

function uid(){
    return md5(uniqid(rand(), true));
}