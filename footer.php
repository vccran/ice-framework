</section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		<script type="text/javascript">

		
		
		for (var prop in modJsList) {
			if(modJsList.hasOwnProperty(prop)){
				modJsList[prop].setPermissions(<?=json_encode($modulePermissions['perm'])?>);
				modJsList[prop].setFieldTemplates(<?=json_encode($fieldTemplates)?>);
				modJsList[prop].setTemplates(<?=json_encode($templates)?>);
				modJsList[prop].setCustomTemplates(<?=json_encode($customTemplates)?>);
				<?php if(isset($emailTemplates)){?>
				modJsList[prop].setEmailTemplates(<?=json_encode($emailTemplates)?>);
				<?php } ?>
				modJsList[prop].initFieldMasterData();
				modJsList[prop].setBaseUrl('<?=BASE_URL?>');
				modJsList[prop].setUser(<?=json_encode($user)?>);
				modJsList[prop].setCurrentProfile(<?=json_encode($activeProfile)?>);
				modJsList[prop].setInstanceId('<?=$baseService->getInstanceId()?>');
				modJsList[prop].setGoogleAnalytics(ga);
				modJsList[prop].setNoJSONRequests('<?=$noJSONRequests?>');
				
			}
			
	    }


		//Other static js objects
		
		var timeUtils = new TimeUtils();
		timeUtils.setServerGMToffset('<?=$diffHoursBetweenServerTimezoneWithGMT?>');
		
		var notificationManager = new NotificationManager();
		notificationManager.setBaseUrl('<?=CLIENT_BASE_URL?>service.php');
		notificationManager.setTimeUtils(timeUtils);
		
		<?php 
			$notificationTemplates = array();
			$notificationTemplates['notification'] = file_get_contents(BASE_URL."/templates/notifications/notification.html");
			$notificationTemplates['notifications'] = file_get_contents(BASE_URL."/templates/notifications/notifications.html");
		?>
		notificationManager.setTemplates(<?=json_encode($notificationTemplates)?>);
		
		//-----------------------
	   

		$(document).ready(function() {
			$('#modTab a').click(function (e) {
				e.preventDefault();
				$(this).tab('show');
				modJs = modJsList[$(this).attr('id')];
				modJs.get([]);
			});

			var tabName = window.location.hash.substr(1);

			if(tabName!= undefined && tabName != "" && modJsList[tabName] != undefined && modJsList[tabName] != null){
				$("#"+tabName).click();	
			}else{
				modJs.get([]);
			}
			

			notificationManager.getNotifications();

			$("#delegationDiv").on('click', "#notifications", function(e) {
				$(this).find('.label-danger').remove();
				notificationManager.clearPendingNotifications();
				
			});

			$("#switch_emp").select2();
		});
		var clientUrl = '<?=CLIENT_BASE_URL?>';

		$(document).ready(function() {

			$(".dataTables_paginate ul").addClass("pagination");
			
			var refId = "";
			<?php if(empty($_REQUEST['m'])){?>
				<?php if($user->user_level == 'Admin'){?>
					refId = '<?="admin_".str_replace(" ", "_", $adminModules[0]['name'])?>';
					$("[ref = '"+refId+"'] a").first().click();
				<?php }else{?>
					refId = '<?="module_".str_replace(" ", "_", $userModules[0]['name'])?>';
					$("[ref = '"+refId+"'] a").first().click();
				<?php }?>
			<?php } else{?>
				refId = '<?=$_REQUEST['m']?>';
				$("[ref = '"+refId+"'] a").first().click();
			<?php }?>
		});
		
	</script>
	<?php include 'popups.php';?>
	<?php include APP_BASE_PATH.'js/bootstrapDataTable.php';?>
    </body>
</html>