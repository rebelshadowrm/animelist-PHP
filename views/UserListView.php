<?php
/**
 * Description of IncidentModel
 *
 * @author Aviendha
 */
class UserListView extends View
{
	
    public function output()
    {
        $title = $this->model->title;
		$items=$this->model->ListItems;
    ?> 


<script>
$(document).ready(function() {
    $('#example').DataTable( {
		 "lengthMenu": [[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]]
    } );
} );
</script>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
			<th>Username</th>
			<th>AnimeList</th>
			</tr>
			</thead>
        <tbody>
		
	<?php
			foreach($items as $elem)
	{
	?>	
	<tr>		
		
		<td> <a href="/?route=profile&action=view&p1=<?php echo $elem->userloginid; ?>"><?php echo $elem->getUsername(); ?></a></td>
		<td><a href="/?route=animelist&action=view&p1=<?php echo $elem->userloginid;  ?>">AnimeList</a></td>
		
	</tr>
	<?php
	}
	?>				
		</tbody>
</table>



 <?php
}        
}