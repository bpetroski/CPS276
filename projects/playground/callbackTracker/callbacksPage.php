<?php
    require_once 'Classes/navHeader.php';
    require_once 'Classes/Crud.php';
    $navBar = new navHeader();
    $crud = new Crud();

    echo $navBar->security();
    echo $navBar->head("Callbacks")
?>
        <style>
            div.cxBox{
                /* text-align: left; */
                /* padding: 15px; */
                border-style: groove;
                border-color: gray;
                border-radius: 15px;
                /* height: 60px; */
            }

        </style>
    <body>
        <?php echo $navBar->nav("Outbound Calls"); ?>
        <main class="container" style="padding: 2px;">
            <div class="container cxBox">
                <!-- <a>Schwartzburger</a><a>Home internet</a> -->
                <!-- <p>Jerald Schwartzburger 2489362956 0 interested Home internet He was very nice 🙂</p> -->
            </div>
            <?php echo $crud->showCustomers(true) ?>
        </main>
    </body>
</html> 