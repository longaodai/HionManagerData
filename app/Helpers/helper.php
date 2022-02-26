<?php

if(!function_exists('getTitlePage')) {
    function getTitlePage($param)
    {
        switch ($param) {
            case CATEGORY_ID_FASHION:

                return __('title_page.lbl_title_pages_fashion');
            case CATEGORY_ID_COSMETIC:

                return __('title_page.lbl_title_pages_cosmetic');
            case CATEGORY_ID_HOUSEWARE:

                return __('title_page.lbl_title_pages_houseware');
            case CATEGORY_ID_EAT:

                return __('title_page.lbl_title_pages_eat');
            case CATEGORY_ID_FUNCTION_FOOD:

                return __('title_page.lbl_title_pages_func_food');
            case CATEGORY_ID_ORTHER:
                
                return __('title_page.lbl_title_pages_orther');
            default:
                return __('title_page.lbl_title_pages_data');
        }
    }
}