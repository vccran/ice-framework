<?php
/*
Copyright [2015] [Thilina Hasantha (thilina.hasantha[at]gmail.com)]

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
 */
 
$moduleName = 'profiles';
define('MODULE_PATH',dirname(__FILE__));
include APP_BASE_PATH.'header.php';
include APP_BASE_PATH.'modulejslibs.inc.php';
?>
<div class="span9">
			  
	<ul class="nav nav-tabs" id="modTab" style="margin-bottom:0px;margin-left:5px;border-bottom: none;">
		<li class="active"><a id="tabProfile" href="#tabPageProfile">My Details</a></li>
	</ul>
	 
	<div class="tab-content">
		<div class="tab-pane active" id="tabPageProfile">
			<div id="Profile" class="container reviewBlock" data-content="List" style="padding-left:5px;">
		
			</div>
			<div id="ProfileForm" class="reviewBlock" data-content="Form" style="padding-left:5px;display:none;">
		
			</div>
		</div>
	</div>

</div>
<script>
var modJsList = new Array();
modJsList['tabProfile'] = new ProfileAdapter('Profile');

var modJs = modJsList['tabProfile'];

</script>
<?php include APP_BASE_PATH.'footer.php';?>      