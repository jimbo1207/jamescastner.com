<?php include 'top.php'; ?>
<!-- ************ Start of Main Content ************ -->
<main>
	<section class="flex-container">
		<h2>A brief history and some education on Maple Syrup</h2>
		<figure class="small">
			<img src="../images/SugarHouse.jpg" alt="A vermont sugar house">
			<figcaption>
				A sugar house located in sourthern vermont <br>
				<cite><a href="https://depositphotos.com/58336025/stock-photo-maple-sugar-house-reading-vermont.html">Photo
						Source</a></cite>
			</figcaption>
		</figure>
	</section>

	<section class="flex-container">
		<h2>Origins</h2>
		<p>Maple syrup production has its start right here in the northeast, more than likley with the native
			Algonquian people.
			It was a sacred thing and used for things like ceremonies and celebrations
			In fact the first full moon of spring marked a celebration known as the Maple Dance.</p>
	</section>

	<section class="flex-container">
		<h2>Most Common trees in Vermont</h2>
		<ol>
			<li>Maple</li>
			<li>Birch</li>
			<li>Beech</li>
		</ol>
		<a href="https://vlt.org/2022/03/18/identify-common-trees-in-vermont"><cite>Vermont Land Trust - Common
				Vermont Trees</cite></a>
	</section>

	<section class="flex-container">
		<h2>The Maple</h2>
		<p>There aren't many reason not to love maple trees. From the delicious syrup to the different beautiful
			variations it can be found in, the maple tree is truly a Vermont gem. The sugar and red maple varieties
			are the most common,
			with the red maple sporting red leaves with jagged edges, and the sugar maple rocking the yellow leaves
			with smoother edges.
			The striped maple is also commonly seen throughout Vermont.</p>
		<figure class="small">
			<img alt="A sugar maple tree" src="../images/SugarMaple.jpg">
			<figcaption>A sugar maple tree grove</figcaption>
		</figure>
	</section>

	<section class="flex-container">
		<h2>The Birch</h2>
		<p>These trees are without a doubt my favorite type of tree seen throughout Vermont. The magestic white
			Birch takes me back to my childhood
			where these trees were common on every big mountiain we'd adventure to and seemed to be a symbol for
			purity and entombed the beauty of the
			forest. There are three different varieties all of whose differences are highlighted below.</p>
		<figure class="small">
			<img alt="A paper birch tree" src="../images/PaperBirch.jpg">
			<figcaption>Serene little paper birch forest grove</figcaption>
		</figure>
		<table>
			<tr>
				<th>Tree</th>
				<th>Size</th>
				<th>Bark</th>
				<th>Buds</th>
				<th>Produces Maple Syrup</th>
			</tr>
			<?php
			$sql = 'SELECT fldTreeName,fldTreeSize,fldBark,fldBuds,fldWillProduceSyrup FROM tblBirchTrees';
			$statement = $pdo->prepare($sql);
			$statement->execute();

			$records = $statement->fetchAll();

			foreach($records as $record) {
				print '<tr>';
				print '<td>' . $record['fldTreeName'] . '</td>'; 
				print '<td>' . $record['fldTreeSize'] . '</td>'; 
				print '<td>' . $record['fldBark'] . '</td>'; 
				print '<td>' . $record['fldBuds'] . '</td>'; 
				print '<td>' . $record['fldWillProduceSyrup'] . '</td>'; 
				print '</tr>' . PHP_EOL;
			}
			?>
			<tr>
				<td colspan=3><a href="https://vlt.org/2022/03/18/identify-common-trees-in-vermont/"><cite>Vermont
							Land Trust</cite></a></td>
			</tr>
		</table>
	</section>
</main>

<?php include 'footer.php'; ?>
</body>
</html>