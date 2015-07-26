<!-- BEGIN PAGE -->  
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>

			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				<!-- BEGIN PAGE HEADER-->   

				<div class="row-fluid">

					<div class="span12">
						<h3 class="page-title">
							用户管理
						</h3>
						<ul class="breadcrumb">
							<li>
							</li>
						</ul>
					</div>

				</div>
				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box blue" id="form_wizard_1">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-reorder"></i> 用户列表
								</div>
								<div class="tools hidden-phone">
									<a href="javascript:;" class="collapse"></a>

								</div>

							</div>

							<div class="portlet-body">

<table class="table" id="userList">
			<thead>
				<tr>
					<th>ID</th>
					<th>用户名</th>
					<th>大学</th>
					<th>邮箱</th>
					<th>创建时间</th>
				</tr>
			</thead>
			<tbody>
			<?php if(!empty($userList))foreach ($userList as $user):?>
				<tr>
					<td> <?php echo $user['id'];?> </td>
					<td> <?php echo $user['name'];?> </td>
					<td> <?php echo $user['university'];?> </td>
					<td> <?php echo $user['email'];?> </td>
					<td> <?php echo $user['createTime'];?> </td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>


							</div>

						</div>

					</div>

				</div>
				<!-- END PAGE CONTENT-->         

			</div>
			<!-- END PAGE CONTAINER-->

		</div>
		<!-- END PAGE -->  
