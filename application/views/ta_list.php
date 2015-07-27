<!-- BEGIN PAGE -->  
<div class="page-content">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h3 class="page-title">
					TA管理
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
							<i class="icon-reorder"></i> TA列表
						</div>
						<div class="tools hidden-phone">
							<a href="javascript:;" class="collapse"></a>

						</div>

					</div>

					<div class="portlet-body">
						<div>
							<table class="table" id="taList">
								<thead>
									<tr>
										<th>Open ID</th>
										<th>姓名</th>
										<th>邮箱</th>
										<th>技能</th>
										<th>评级</th>
										<th>每页收费（元）</th>
										<th>创建时间</th>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($taList))foreach ($taList as $ta):?>
									<tr>
										<td> <?php echo $ta['openid'];?> </td>
										<td> <?php echo $ta['name'];?> </td>
										<td> <?php echo $ta['email'];?> </td>
										<td> <?php echo $ta['skills'];?> </td>
										<td> <?php echo $ta['star'];?> </td>
										<td> <?php echo $ta['unitPrice'];?> </td>
										<td> <?php echo $ta['createTime'];?> </td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
					<?=$page_info?>
				</div>
			</div>

		</div>

	</div>
	<!-- END PAGE CONTENT-->         

</div>
<!-- END PAGE CONTAINER-->

</div>
<!-- END PAGE -->  