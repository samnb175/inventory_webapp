<?php
class Dvd extends ProductTypeAbstract {
    public function addAttribute($post) {
        $size;
        $size = empty($post['size']) ? null : 'Size: '. $post['size'] . ' MB';
        
        return $size;
    }

    public function getAttributeName() {
        return "size";
    }
}