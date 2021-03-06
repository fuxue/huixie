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
							下订单
						</h3>
					</div>

				</div>
				<!-- END PAGE HEADER-->

				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box blue" id="form_wizard_1">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-reorder"></i> 请仔细填写(<font color='red'>*</font>为必填)
								</div>
								<div class="tools hidden-phone">
									<a href="javascript:;" class="collapse"></a>

								</div>

							</div>

							<div class="portlet-body center">

							<?php if(isset($notice) and $notice!= ""):?>
							<div class="alert">
									<button class="close" data-dismiss="alert"></button>
									<strong>Notice!</strong> <?php echo $notice; ?>
							</div>
						<?php  endif?>

			<form action="<?php echo site_url('customer/order/addOrder');?>" method="post" onsubmit="return checkForm()">
  			<div class="form-group">
    			<label for="major">专业<font color='red'>*</font></label>
    			<div id="city_5">
					<select class="prov small m-wrap" name="prov" required="required" data-placeholder="请选择专业"></select>
					<select class="city small m-wrap" name="city" disabled="disabled" required="required" data-placeholder="请选择专业"></select>
				</div>
  			</div>
  			<div class="form-group">
    			<label for="courseName">课程名<font color='red'>*</font></label>
    			<input type="text" class="form-control m-wrap span6" id="courseName" name="courseName" placeholder="请输入课程名称" required="required">
  			</div>
  			<div class="form-group">
    			<label for="email">Email<font color='red'>*</font></label>
    			<input type="email" class="form-control m-wrap span6" id="email" name="email" placeholder="请输入邮箱" required="required">
  			</div>
  			<div class="form-group">
    			<label for="pageNum">页数<font color='red'>*</font></label>
    			<select class="form-control m-wrap span6" name="pageNum" id="pageNum" data-placeholder="请选择文章页数">
    			<?php for($i=1;$i<=100;$i++){ ?>
  					<option><?php echo $i; ?></option>
				<?php } ?>
				</select>
    		</div>
  			<div class="form-group">
    			<label for="refDoc">阅读材料页数<font color='red'>*</font></label>
    			<select class="form-control m-wrap span6" name="refDoc" id="refDoc" data-placeholder="请选择阅读材料数量">
    			<?php for($i=0;$i<=100;$i++){ ?>
  					<option><?php echo $i; ?></option>
				<?php } ?>
				</select>
  			</div>
  			<div class="form-group">
    			<label for="endTime">截止日期<font color='red'>*</font></label>
          		<input type="date" class="form-control m-wrap small" id="endDate" name="endDate" required="required" placeholder="请选择日期">
    			<input type="time" class="form-control m-wrap small" id="endTime" name="endTime" required="required" placeholder="请选择时间">
  				

    			<label for="endTime">请选择时区<font color='red'>*</font></label>
  				<select class="form-control m-wrap span6" name="timezone" id="timezone" required="required" data-placeholder="请选择您的时区">
  					<option></option>
  					<option value="PST8PDT">UTC-8(太平洋时间,洛杉矶)</option>
  					<option value="MST7MDT">UTC-7(山地时间,丹佛)</option>
  					<option value="CST6CDT">UTC-6(中央时间,芝加哥)</option>
  					<option value="EST5EDT">UTC-5(东部时间,纽约)</option>
  					<option value="Australia/Perth">UTC+8(澳大利亚时间,珀斯)</option>
  					<option value="Australia/Darwin">UTC+9:30(澳大利亚东部时间,达尔文)</option>
  					<option value="Australia/Sydney">UTC+10(澳大利亚中央东部时间,悉尼)</option>
				</select>
  			</div>
  			<div class="form-group">
    			<label for="requirement">补充要求</label>
    			<textarea rows="5" class="form-control m-wrap span6" id="requirement" name="requirement" placeholder="如有额外要求，请在这里填写~"></textarea>
  			</div>
			<div class="form-group">
    			<a link="" href="<?php echo site_url("customer/order/privacy");?>">保密政策</a>
  			</div>
  			<div class="form-actions">
  			<button type="submit" class="btn blue"><i class="icon-ok"></i> 提交</button>
  			</div>
		</form>


							</div>

						</div>

					</div>

				</div>
				<!-- END PAGE CONTENT-->         

			</div>
			<!-- END PAGE CONTAINER-->

		</div>
		<!-- END PAGE -->  


		<script>
		jQuery(document).ready(function() {
		   	//初始化专业二级选框
			var json = new Object();
	   		var citylist = new Array();
			for (var i = 0; i < major_array.length; i++) {
				// majorArray[i]
				var p = new Object();
				var c = new Array();

				for (var j = 0; j < sub_array[i].length; j++) {
					var n = new Object();
					n.n = sub_array[i][j];
					c.push(n);
				};

				p.p = major_array[i];
				p.c = c;
				citylist.push(p);
				// alert(JSON.stringify(p));
			};
			json.citylist = citylist;

			$("#city_5").citySelect({
				url: json,
				prov:"",
				city:"",
				dist:"",
				nodata:"none"
			});
		});
		function checkForm(){
			var today = new Date();
			var date = $('#endDate').val();
			var time = $('#endTime').val();
			var endTime = date+' '+time;
			entTime = moment(endTime, "YYYY-MM-DD h:mm");
			if(moment(endTime).isBefore(today)){
				alert('请选择合适的截止日期，应该大于当前日期！');
				return false;
			}
			return true;
		}
	</script>