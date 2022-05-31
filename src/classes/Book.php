<?php
class Book extends ProductTypeAbstract {
    public function addAttribute($post) {
        $weight;
        $weight = empty($post['weight']) ? null : 'Weight: '. $post['weight'] . ' kg';
        
        return $weight;
    }
    
    public function getAttributeName() {
        return "weight";
    }

}