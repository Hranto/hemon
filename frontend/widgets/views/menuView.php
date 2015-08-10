<?php
/**
 * Created by PhpStorm.
 * @author VOLODYA AVETISYAN <volodya.avetisyan@gmail.com>
 * Date: 04/08/2015
 * Time: 13:54
 */
?>
<nav class="menu">
    <ul>
        <?php if(!empty($menu)){
            foreach($menu as $value){ ?>
                <li><span class="border-bottom"></span><a href="<?php echo '/category/' . $value->id . '/' . $value->title ?>"><?php echo $value->title ?></a></li>
            <?php }
        } ?>
        <li><span class="border-bottom"></span><a href="/live">LIVE</a></li>
        <li><span class="border-bottom"></span><a href="/contact">Contact us</a></li>
    </ul>
</nav>

<!-- Mobile menu -->
<select class="mobile-menu" onchange='document.location.href=this.options[this.selectedIndex].value;'>
    <option value="">Go To...</option>
    <?php if(!empty($menu)){
        foreach($menu as $value){ ?>
            <option value="<?php echo '/category/' . $value->id . '/' . $value->title ?>"><?php echo $value->title ?></option>
        <?php }
    } ?>
    <option value="/live">LIVE</option>
    <option value="/contact">Contact us</option>
</select>