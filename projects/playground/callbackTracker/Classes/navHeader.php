<?php

class navHeader {

    public function nav($header){
        $nav = <<<NAV

        <header style="background-color: #333; color: #fff;">
            <div class="container">
                <nav class="nav-header">
                    <ul>
                        <li><a href="newCallback.php">New Callback</a></li>
                        <li><a href="callbacksPage.php">Outbound Calls</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
                <div class="logo-container"> 
                    <div style="padding-right: 15px;">
                        <a href="https://russet-v8.wccnet.edu/~bjpetroski/projects/playground" target="_self"> <img src="../src/tmo-logo-v4.svg" alt="T-Mobile"></a> 
                    </div> 
                    <div class="header-text">
                        <h1>$header</h1>
                        <div class="nav-header" style="padding: 1px;">
                            <a href='https://github.com/bpetroski'>Web App by Brenden Petroski</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <br>
        NAV;
        return $nav;
    }

    public function security(){
        session_start();
        if($_SESSION['access'] !== "accessGranted"){header('location: index.php');}
    }

}