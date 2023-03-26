<?php

class navHeader {

    public function nav($header){
        $nav = <<<NAV

        <header style="background-color: #333; color: #fff;">
            <div class="container">
                <nav class="nav-header">
                    <ul>
                        <li><a href="index.php">New Callback</a></li>
                        <li><a href="callbacksPage.php">Outbound Calls</a></li>
                    </ul>
                </nav>
                <div class="logo-container"> 
                    <div style="padding-right: 15px;">
                        <a href="https://russet-v8.wccnet.edu/~bjpetroski/projects/playground" target="_self"> <img src="../src/tmo-logo-v4.svg" alt="T-Mobile"></a> 
                    </div> 
                    <div class="header-text">
                        <h1>$header</h1>
                        <a href='https://github.com/bpetroski'>Web App by Brenden Petroski</a>
                    </div>
                </div>
            </div>
        </header>
        NAV;
        return $nav;
        
    }
}