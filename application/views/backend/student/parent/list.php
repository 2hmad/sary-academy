<?php
$school_id = school_id();
$check_data = $this->db->get_where('users', array('school_id' => $school_id, 'role' => 'parent'));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
	<thead>
		<tr style="background-color: #1d2362; color: #ababab;">
			<th><?php echo get_phrase('parent_id'); ?></th>
			<th><?php echo get_phrase('name'); ?></th>
			<th><?php echo get_phrase('email'); ?></th>
			<th><?php echo get_phrase('options'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$users = $this->db->get_where('users', array('school_id' => $school_id, 'role' => 'parent'))->result_array();
		foreach($users as $user){
			?>
			<tr>
				<td><?php echo $user['id']; ?></td>
				<td><?php echo $user['name']; ?></td>
				<td><?php echo $user['email']; ?></td>
				<td>
					<button type="button" class="btn btn-icon btn-secondary btn-sm btn-dark" style="margin-right:5px;" onclick="rightModal('<?php echo site_url('modal/popup/parent/edit/'.$user['id'])?>', '<?php echo get_phrase('update_paren'); ?>');" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('update_parent_info'); ?>"> <i class="mdi mdi-wrench"></i></button>
					<button id="uname" type="button" class="btn btn-icon btn-secondary btn-sm" style="margin-right:5px;" onclick="confirmModal('<?php echo route('parent/delete/'.$user['id']); ?>', showAllParents )" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('delete_parent'); ?>"> <i class="mdi mdi-window-close"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php else: ?>
	<?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
