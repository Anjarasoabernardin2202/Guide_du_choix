<div class="bar">
    <a id="pays">
        <a style="color:white" class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">Langues</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a style="color:rgb(78,80,81);font-size:11px;" class="dropdown-item" href="#">FR</a>
        </div>
    </a>
    <?php
        $counter_madagascar = new VisitorCounter('assets/include/cookie.php', "visiteur", 315360000);
        $number_madagascar = $counter_madagascar->get_visitor_number();
        $number = $number_madagascar;
    ?>
    <a id="visiteurs" >Visiteurs: <?php echo 111777+$number?></a>
    <a id="visiteurs">Adhérents: <?php echo 2094+ $nbadherents;?></a>
    <a class="web-only">
        <form method="get" action="<?php echo site_url("Recherche_Controller/recherche");?>" class="form-inline py-1">
            <input class="form-control mr-sm-2"  type="text" name="mot"  placeholder="Recherche ..." aria-label="Search">
            <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" />
        </form>
    </a>
    <a class="mobile-only" href="javascript:void(0)" class="icon" >
        <i class="fa fa-search" id="search-icon"> </i>
        <form method="get" action="<?php echo site_url("Recherche_Controller/recherche");?>">
            <input class="search-input" type="text" name="mot"  placeholder="Recherche...">
            <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" />
        </form>
    </a>
</div>
