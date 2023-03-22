<?php

class navHeader {

    public function nav($header){
        $nav = <<<NAV

        <header style="background-color: #333; color: #fff;">
            <div class="container">
                <nav class="nav-header">
                    <ul>
                        <p style="padding-right: 75px;"></p>
                        <li><a href="plansPage.php">Voice Plans</a></li>
                        <li><a href="phonesPage.php">Phones</a></li>
                        <li><a href="dataPlansPage.php">Data Plans</a></li>
                        <li><a href="cartPage.php">Cart</a></li>
                    </ul>
                </nav>
                <div class="logo-container"> 
                    <div style="padding-right: 15px;">
                        <a href="https://russet-v8.wccnet.edu/~bjpetroski/projects/playground" target="_self"> <img src="../src/tmo-logo-v4.svg" alt="T-Mobile"></a> 
                    </div> 
                    <div class="header-text">
                        <h1>$header</h1>
                        <p>Web App by Brenden Petroski</p>
                    </div>
                </div>
            </div>
        </header>
        NAV;
        return $nav;
        
    }
}