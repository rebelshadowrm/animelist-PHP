<?php
/**
 * Description of IncidentModel
 *
 * @author Aviendha
 */
class AnimeListView extends View
{
	
    public function output()
    {
        $title = $this->model->title;
		$items=$this->model->ListItems;
    ?> 


<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]],
		 "lengthMenu": [[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]]
    } );
} );
</script>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
			<tr>
				<th id="tabletitle" colspan="6">
					<?php
					echo $items[0]->Member->getUsername() . "'s Anime"; 
					?>
				</th>
			</tr>	
            <tr>
			<th>Title</th>
			<th>Status</th>
			<th>Type</th>
			<th>Rating</th>
			<th>Episode</th>
			</tr>
			</thead>
        <tbody>
		
	<?php
			foreach($items as $elem)
	{
	?>	
	<tr>		
		
		<td> <?php echo $elem->Anime->title; ?></td>
		<td> <?php echo $elem->AnimeStatusType->statusname; ?></td>
		<td> <?php echo $elem->Anime->AnimeType->typename; ?></td>
		<?php $rating = $elem->rating == 0 ? 'Unrated' : $elem->rating; ?>
		<td data-sort="<?php echo $elem->rating  ?>"> <?php echo $rating; ?></td>
		<?php $epcount = $elem->Anime->epcount == 0 ? '∞' : $elem->Anime->epcount; ?>
		<td data-sort="<?php echo $elem->progress  ?>"> <?php echo $elem->progress . '/' . $epcount; ?></td>
		
	</tr>
	<?php
	}
	?>				
		</tbody>
</table>



 <?php
}        
}