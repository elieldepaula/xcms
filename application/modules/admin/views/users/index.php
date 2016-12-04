<div class="row">
	<div class="col-md-12">
		<h2>Blank Page</h2>
	</div>
</div>
<hr />
<div class="row">
	<div class="col-sm-12 col-md-12">
		<?= anchor('', 'Create User', array('class' => 'btn btn-primary')); ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 col-md-12">

		<table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach($users as $row){ ?>
	                <tr>
	                    <td><?= $row->id; ?></td>
	                    <td><?= $row->first_name; ?></td>
	                    <td><?= $row->last_name; ?></td>
	                    <td>@<?= $row->username; ?></td>
	                    <td>Alt | Del</td>
	                </tr>
	            <?php } ?>
            </tbody>
        </table>

	</div>
</div>