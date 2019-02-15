<header class="dealsHeader">
    <div class="filterContainer">
    <?php
        $content = array('Duration', 'Price', 'Travellers', 'Package Type', 'Destination');
        $selection = array('10/01 - 19/06', '$0 - $2k' ,'2+ guests', 'Hotels + Tours', 'All' );
        for ($t = 0; $t < count($content); $t+=1 ){
            echo'<div class="filter"> <span class="selectionTitle">'.$content[$t]. '</span><br/><span class="selection">'.$selection[$t].'</span></div>';
        }
    ?>
    </div>
    <button class="moreFilter">More Filter</button>
</header>