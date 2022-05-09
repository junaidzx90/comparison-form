<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Comparison_Form
 * @subpackage Comparison_Form/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
if(!is_admin(  )){
    ?>
    <style>
        #comparison_form{
            display: none;
        }
    </style>
    <?php
}
?>

<div id="comparison_form">
    <div class="comparison__form_inputs">
        <div class="form__input">
            <select id="product__one">
                <option value="">Select a product</option>
                <?php
                $options = $this->get_products();
                if(sizeof($options) > 0){
                    foreach($options as $option){
                        echo $option;
                    }
                }
                ?>
            </select>
        </div>

        <h1 class="inp_devider">VS</h1>

        <div class="form__input">
            <select id="product__two">
                <option value="">Select a product</option>
                <?php
                $options = $this->get_products();
                if(sizeof($options) > 0){
                    foreach($options as $option){
                        echo $option;
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div class="compare__button">
        <a href="#" target="_blank" disabled id="do_compare" class="do_compare">Compare</a>
    </div>
</div>