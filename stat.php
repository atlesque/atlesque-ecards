<?php
function odudecard_stat_page()
{
	$options = get_option( 'odudecard_settings','' );	
	$title="";
	
	?>
	<div class="wrap">
	<h2>Statistieken</h2>
	
<?php
	global $wpdb;
  echo '<h3>';
  echo __('Meest populaire kaarten:','odudecard');
  echo '</h3>';
  $query="SELECT COUNT(post_id) as Totaal, meta_value as Afbeelding, post_id as ID FROM ".$wpdb->prefix."odudecard_view odude JOIN( SELECT post_id, meta_value FROM ".$wpdb->prefix."postmeta WHERE meta_key='_odudecard_product_Thumbnail' ) AS meta ON odude.card=meta.post_id WHERE status='Y' GROUP BY post_id, meta_value ORDER BY Totaal DESC";
  $cron_cards = $wpdb->get_results($query);


  if($cron_cards)
  {
    echo '<table class="pure-table pure-table-horizontal">
    <thead>
        <tr>
            <th>Totaal</th>
            <th>Afbeelding</th>
        </tr>
    </thead>

    <tbody>';

    foreach($cron_cards as $card)
    {
      echo '<tr>
            <td>'.$card->Totaal.'</td>
            <td><img src="'.$card->Afbeelding.'" style="max-width: 80px;"/></td>
        </tr>';
    }
    
  echo '</tbody>
  </table>';  
  }

	echo '<h3>';
	echo __('Laatste 50 verstuurde kaarten:','odudecard');
	echo '</h3>';
	$query="SELECT * FROM ".$wpdb->prefix."odudecard_view WHERE status='Y' order by id desc	limit 0,50";
	$cron_cards = $wpdb->get_results($query);
	
	
	if($cron_cards)
	{
		echo '<table class="pure-table pure-table-horizontal">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam afzender</th>
            <th>Email afzender</th>
            <th>Naam ontvanger</th>
			<th>Email ontvanger</th>
			<th>Onderwerp</th>
        </tr>
    </thead>

    <tbody>';
	
		foreach($cron_cards as $card)
		{
			echo '<tr>
            <td>'.$card->id.'</td>
            <td>'.$card->SN.'</td>
            <td>'.$card->SE.'</td>
            <td>'.$card->RN.'</td>
			<td>'.$card->RE.'</td>
			<td>'.$card->sub.'</td>
        </tr>';
		}
		
	echo '</tbody>
</table>';	
	}
	echo '<h3>';
	echo __('Kaarten in wachtrij:','odudecard');
	echo '</h3>';
	$query="SELECT * FROM ".$wpdb->prefix."odudecard_view WHERE status='N' order by clock desc	limit 0,50";
	$cron_cards = $wpdb->get_results($query);
	
	
	if($cron_cards)
	{
		echo '<table class="pure-table pure-table-horizontal">
    <thead>
        <tr>
            <th>ID</th>
            <th>Sender Name</th>
            <th>Sender Email</th>
            <th>Receiver Name</th>
			<th>Receiver Email</th>
			<th>Subject</th>
			<th>schedule Date</th>
        </tr>
    </thead>

    <tbody>';
	
		foreach($cron_cards as $card)
		{
			echo '<tr>
            <td>'.$card->id.'</td>
            <td>'.$card->SN.'</td>
            <td>'.$card->SE.'</td>
            <td>'.$card->RN.'</td>
			<td>'.$card->RE.'</td>
			<td>'.$card->sub.'</td>
			<td>'.$card->clock.'</td>
        </tr>';
		}
		
	echo '</tbody>
</table>';	
}
?>
	</div>
	
	
	<?php
}

?>