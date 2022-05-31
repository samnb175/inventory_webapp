<?php
class Furniture extends ProductTypeAbstract {
    public function addAttribute($post) {
        $dimension;
        $dimension = empty($post['height'] && $post['width'] && $post['length']) ? null : 'Dimension: ' . $post['height'] . 'x' . $post['width'] . 'x' . $post['length'];
        
        return $dimension;
    }

    public function getAttributeName() {
        return "dimensions";
    }
}