<?php include "top.php"; ?>
<main>
    <p>Create Table SQL</p>
    <pre>
        CREATE TABLE tblBirchTrees(
            pmkIssuesId INT AUTO_INCREMENT PRIMARY KEY,
            fldTreeName VARCHAR(40),
            fldTreeSize VARCHAR(100),
            fldBark VARCHAR(100),
            fldBuds VARCHAR(100),
            fldWillProduceSyrup VARCHAR(40)
        )

        INSERT INTO `tblBirchTrees` 
        (fldTreeName,fldTreeSize,fldBark,fldBuds,fldWillProduceSyrup)
        VALUES
        ('Grey Birch','pretty small','Greyish white with a chalky texture, comes off spaghetti like pieces','Round','No'),
        ('Yellow Birch','Very large (up to 1000ft!)','Like rice paper, also comes off in small pieces, golden colored','Pointy','Yes'),
        ('Paper Birch','Small to medium','Feels like paper, tears off in large sheets','Pointy','Yes!!')

        SELECT fldTreeName,fldTreeSize,fldBark,fldBuds,fldWillProduceSyrup FROM `tblBirchTrees`

        CREATE TABLE tblSyrupSurvey (
            pmkSyrupSurvey int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldUnhealthySyrup varchar(5) DEFAULT NULL,
            fldGolden tinyint(1) DEFAULT 0,
            fldAmber tinyint(1) DEFAULT 0,
            fldDark tinyint(1) DEFAULT 0,
            fldVeryDark tinyint(1) DEFAULT 0,
            fldFirstName varchar(30) DEFAULT NULL,
            fldLastName varchar(30) DEFAULT NULL,
            fldEmail varchar(50) DEFAULT NULL
        )
        
        INSERT INTO `tblSyrupSurvey`(`fldUnhealthySyrup`, `fldGolden`, `fldAmber`, `fldDark`, `fldVeryDark`, `fldFirstName`, `fldLastName`, `fldEmail`) 
        VALUES ('yes',1,1,1,1,'Joe','Shmo','joe@shmo.com')
    </pre>
</main>
<?php include "footer.php"; ?>
</body>
</html>