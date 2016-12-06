
<p><a href="/ci/index.php/paleocontext/search/" alt="Search Paleo Context">Search Paleocontext</a>
<a href="/ci/index.php/paleocontext/" alt="Reset Search">Reset Search</a></p>
<p>SLQ = <?php print_r($sql); ?></p>
<table border="1" cellpadding="0" cellspacing="0">
  <tr><th>LATESTPERIOD</th><th>GEOLOGICALCONTEXTGROUP</th><th>LATESTEPOCH</th></tr>
<?php foreach ($pc as $pc_item): ?>        
  <tr>
 <td><?php echo $pc_item['LATESTPERIOD']; ?></td>
 <td><?php echo $pc_item['GEOLOGICALCONTEXTGROUP']; ?></td>
 <td><?php echo $pc_item['LATESTEPOCH']; ?></td>
 
 </tr>

<?php endforeach; ?>
</table>