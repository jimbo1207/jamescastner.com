<?php include "top.php"; ?>
<!-- ************ Start of Main Content ************ -->
<main>
    <h1>Maple Syrup on an industrial scale</h1>
    <section class="flex-container">
        <h2>Some Stats</h2>
        <p>Believe it or not maple syrup was not always such a hot commodity.
            In fact since the year 2000 maple syrup sales have tripled in
            Vermont alone! In number language what that means is we went
            from producing 570k gallons per year in 1992 to a wopping 1.3 Million
            in 2014 and it just continues to grow.</p>
    </section>
    <section class="flex-container">
        <h2>Canada the Syrup Titan</h2>
        <p>Canada takes a lot of the bread here, since they produce 70% of the 
           entire worlds supply of maple syrup (While Vermont claims just 40% of 
           the national supply). The majority of this comes from a group of 
           syrup producers under The Federation of Quebec Syrup Producers. All
           this competition has inspired a change in syrup culture with products
           becoming much blingyer to try and win over consumers with clever
           marketing.</p>
    </section>
    <section class="flex-container">
        <?php
        $topSyrupProducers = array(
            array(1, "Canada", "471.6 mil", "84.9%"),
            array(2, "United State", "25.8 mil", "4.6%"),
            array(3, "Netherlands", "13.2 mil", "2.4%"),
            array(4, "Denmark", "12.7 mil", "2.3%"),
            array(5, "Germany", "11.6 mil", "2.1%")
        );
        ?>

        <h3>Row count: <?php echo count($topSyrupProducers); ?></h3>

        <ol>
            <?php
            foreach ($topSyrupProducers as $syrupProducer) {
                print '<li>';
                print $syrupProducer[0] . ', ';
                print $syrupProducer[1] . ', ';
                print $syrupProducer[2] . ', ';
                print $syrupProducer[3];
                print '</li>' . PHP_EOL;
            }            
            ?>
        </ol>

    </section>

    <section class="flex-container">
        <h2>Sources</h2>
        <ul>
            <li><a href="https://www.worldstopexports.com/maple-syrup-exporters-by-country/">Top Syrup exporters</a></li>
            <li><a href="https://learn.uvm.edu/foodsystemsblog/2018/03/15/why-vermont-maple-industry-is-booming/">UVM based Syrup research article</a></li>
        </ul>
    </section>
</main>

<?php include "footer.php"; ?>
</body>
</html>