<?php

abstract class ProductTypeAbstract {
    abstract public function addAttribute($post);
    abstract public function getAttributeName();
}