<!-- ************ Start of Navigation ************ -->
<nav>
    <section class="flex-container">
        <a href="index.php" class="<?php
        if ($pathParts['filename'] == "index") {
            print 'activePage';
        }
        ?>">Home</a>
        
        <a href="detail.php" class="<?php
        if ($pathParts['filename'] == "detail") {
            print 'activePage';
        }
        ?>">Learn more</a>
        
        <a href="form.php" class="<?php
        if ($pathParts['filename'] == "form") {
            print 'activePage';
        }
        ?>">Syrup Survey</a>
        
        <a href="array.php" class="<?php
        if ($pathParts['filename'] == "array") {
            print 'activePage';
        }
        ?>">Capitalism</a>
    </section>
</nav>