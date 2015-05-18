var siteurl="http://appddictionstudio.biz/conferencecms";


function tableCls()
{
	oTable = $('#example').dataTable({
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"aoColumnDefs": [{"bSortable": false, "aTargets":[6] }],
				"aaSorting":[[0,"desc"]]
			});
}

function changeall(obj)
{
	if($('#checkforall').attr('checked'))
	{
		$('.dayCheck').attr('checked','checked');
	}
	else
	{
		$('.dayCheck').removeAttr('checked');
	}
}

function saveImage()
{
	var angVal=$("#angVal").val();
	var imageName=$("#imageName").val();
	$.post(siteurl+"/admin/resizeImage",{imageName:imageName,angVal:angVal},
			function(data)
			{
				alert(data);
			});
}

function addAng()
{
	var angVal=$("#angVal").val();
	newAng= Number(angVal)+90;
	$("#angVal").val(newAng);
}
function subAng()
{
	var angVal=$("#angVal").val();
	newAng= Number(angVal)-90;
	$("#angVal").val(newAng)
}
function delAppRec(RecID){
if (confirm('are you sure! want to delete?')) { 
	var hdnAppID=RecID;
 	$.post(siteurl+'/mega/DeleteApp',{hdnAppID:hdnAppID},function(data){ 
		alert('Record Delete Successfully...');
		window.location=siteurl+'/mega/index';
	});
}

}
// for getting school of adistrict
function fnSaveApp()
{
	var txt_appname= $('#txt_appname').val();
	var txt_appversion= $('#txt_appversion').val();
	var hdnAppID= $('#hdnAppID').val();
	var Error="";
	if(txt_appname==""){Error+="Enter App Name \n";}
	if(txt_appversion==""){Error+="Enter App Version";}	
	
	if(Error==""){
		$.post(siteurl+'/mega/SaveNewApp',{hdnAppID:hdnAppID,txt_appname:txt_appname,txt_appversion:txt_appversion},function(data){ 
			alert('Save Data Successfully...');
			window.location=siteurl+'/mega/index';
		});
	}else{
		alert(Error);
	}
}

function deleteDevice(RecID){
if (confirm('are you sure! want to delete?')) { 	
 	$.post(siteurl+'/mega/DeleteDevice',{RecID:RecID},function(data){ 
		alert('Record Delete Successfully...');
		window.location=siteurl+'/mega/getAppDevice';
	});
}
}

function fnSaveDevice()
{
	var sel_deviceType= $('#sel_deviceType').val();
	var txt_deviceVersion= $('#txt_deviceVersion').val();
	var txt_deviceName= $('#txt_deviceName').val();
	var device_size= $('#device_size').val();
	var homeLandScap= $('#homeLandScap').val();
	var homePortrait= $('#homePortrait').val();
	
	
	var hdnDeviceID= $('#hdnDeviceID').val();
	var Error="";
	if(sel_deviceType==""){Error+="Please Select Device Type \n";}
	if(txt_deviceName==""){Error+="Please Enter Device Name \n";}
	if(device_size==""){Error+="Please Enter Device Size \n";}
	if(txt_deviceVersion==""){Error+="Enter Device Version \n";}
	if(homeLandScap==""){Error+="Enter LandScap Size Width X Height \n";}	
	if(homePortrait==""){Error+="Enter Portrait Size Width X Height \n";}	
	
	if(device_size.toLowerCase().indexOf('x')!=-1){
		
	}else{
		Error+="Please Valid Device Size sholud be in W X H \n";
	}
	
	if(homeLandScap.toLowerCase().indexOf('x')!=-1){
		
	}else{
		Error+="Please Enter Valid LandScap Size sholud be in W X H \n";
	}
	
	if(homePortrait.toLowerCase().indexOf('x')!=-1){
		
	}else{
		Error+="Please Enter Valid Portrait Image Size sholud be in W X H \n";
	}
	
	if(Error==""){
		$.post(siteurl+'/mega/SaveNewDevice',{hdnDeviceID:hdnDeviceID,deviceType:sel_deviceType,deviceVersion:txt_deviceVersion,deviceName:txt_deviceName,device_size:device_size,homeImage:homeLandScap+"||"+homePortrait},function(data){																																															
			if(data==1){
				alert('Save Data Successfully...');
				window.location=siteurl+'/mega/getAppDevice';
			}else{
				alert('Sorry! unable to process your request...');
			}
		});
	}else{
		alert(Error);
	}
}

function fnclass(){ 
	
//$('a[rel="AddNewApp"]').colorbox({});

//$('.display_data').colorbox({iframe:false,innerWidth:400,innerHeight:355});
//$('a[rel="AddNewApp"]').colorbox({iframe:false,innerWidth:540,innerHeight:250});
		 
}

function onSelectDevioceType(Obj){
	var Options='<option value="">Select Device Name</option>';
	$('#selDeviceName').html(Options);
	$('#imageTag').html('');
	if(Obj.value!=""){
		$.post(siteurl+'/mega/getDeviceByTypeID',{RecID:Obj.value},function(data){
			var result=$.parseJSON(data).result;
			if(result.length>0){
				for(var k=0;k<result.length;k++){					
					Options+='<option value="'+result[k].id+'">'+result[k].device_name+'</option>';
				}
				$('#selDeviceName').html(Options);
				$('#imageTag').html('');
			}
		});
	}
	
}
function onSetImageTag(Obj){
	//var Options='<input type="file[]" id="file_image" /><span id="spanSize">320 X 480</span>';
	var Options='';
	$('#imageTag').html(Options);
	//$('#imageTag').html(Options);
	if(Obj.value!=""){
		$.post(siteurl+'/mega/getDeviceByID',{RecID:Obj.value},function(data){
			var result=$.parseJSON(data).result;
			if(result.length>0){
				if(result[0].device_size && result[0].device_size!=''){
					var deviceSize=result[0].device_size;
					if(deviceSize.indexOf('||')!=-1){
						var array=deviceSize.split('||');
						for(var k=0;k<array.length;k++){					
							Options+='<input onChange="validImage(this)" type="file" id="image_'+array[k].replace(/ /g,'')+'" name="image_'+array[k].replace(/ /g,'')+'"/><span id="spanSize_'+k+'">'+array[k]+'</span>';
						}
						$('#imageTag').html(Options);
					}else{
						if(deviceSize.toLowerCase().indexOf('x')!=-1){
							
						}else{
							alert('Device Image Size Not define...');
						}
					}
				}
				//$('#selDeviceName').html(Options);
			}
		});
	}
	
}
function onSetHomeImageTag(Obj){
	//var Options='<input type="file[]" id="file_image" /><span id="spanSize">320 X 480</span>';
	var Options='';
	$('#HomeImageTag').html(Options);
	//$('#imageTag').html(Options);
	if(Obj.value!=""){
		$.post(siteurl+'/mega/getDeviceByID',{RecID:Obj.value},function(data){
			var result=$.parseJSON(data).result;
			if(result.length>0){
				if(result[0].home_image_size && result[0].home_image_size!=''){
					var deviceSize=result[0].home_image_size;
					if(deviceSize.indexOf('||')!=-1){
						var array=deviceSize.split('||');
						for(var k=0;k<array.length;k++){					
							Options+='<input onChange="validImage(this)" type="file" id="image_'+array[k].replace(/ /g,'')+'" name="image_'+array[k].replace(/ /g,'')+'"/><span id="spanSize_'+k+'">'+array[k]+'</span>';
						}
						$('#HomeImageTag').html(Options);
					}else{
						if(deviceSize.toLowerCase().indexOf('x')!=-1){
							
						}else{
							alert('Device Image Size Not define...');
						}
					}
				}
				//$('#selDeviceName').html(Options);
			}
		});
	}
	
}
function fnSaveSplashScreen(){
	var selDeviceType= $('#selDeviceType').val();
	var selDeviceName= $('#selDeviceName').val();
	var hdnAppID= $('#hdnAppID').val();
	
	var Error="";
	if(selDeviceType==""){Error+="Please Select Device Type \n";}
	if(selDeviceName==""){Error+="Please Enter Device Name \n";}
		
	
  		if(Error==""){			
		var data = new FormData();	
		var FileTagName="Image_";
		jQuery.each($("#imageTag input[type='file']"), function(i, file) {
			FileTagName=file.id;
			jQuery.each($("input[type='file']")[i].files, function(j, file) {				
				data.append(FileTagName, file);	
			});
		});
		
		data.append('selDeviceType', selDeviceType);	
		data.append('selDeviceName', selDeviceName);	
		data.append('hdnAppID', hdnAppID);
		
		$.ajax({
		url: siteurl+'/mega/SaveSplashScreens',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){			
			window.location=siteurl+'/mega';		
			//console.log(res);				
		}
		});	

		}else{
			alert(Error);
			return false;
		}
	

	
}
function fnSaveHomeScreenImage(){
	var selDeviceType= $('#selDeviceType').val();
	var selDeviceName= $('#selDeviceName').val();
	var hdnAppID= $('#hdnAppID').val();
	
	var Error="";
	if(selDeviceType==""){Error+="Please Select Device Type \n";}
	if(selDeviceName==""){Error+="Please Enter Device Name \n";}
		
	
  		if(Error==""){			
		var data = new FormData();	
		var FileTagName="Image_";
		jQuery.each($("#HomeImageTag input[type='file']"), function(i, file) {
			FileTagName=file.id;
			jQuery.each($("input[type='file']")[i].files, function(j, file) {				
				data.append(FileTagName, file);	
			});
		});
		
		data.append('selDeviceType', selDeviceType);	
		data.append('selDeviceName', selDeviceName);	
		data.append('hdnAppID', hdnAppID);
		
		$.ajax({
		url: siteurl+'/mega/SaveHomeScreensImage',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){			
			window.location=siteurl+'/mega';		
			//console.log(res);				
		}
		});	

		}else{
			alert(Error);
			return false;
		}
	

	
}
function fnSaveMenuIcon(){
	var selDeviceType= $('#selDeviceType').val();
	var selDeviceID= $('#selDeviceName').val();
	var AppID= $('#selApp').val();
	var menuTitle= $('#menuTitle').val();	
	var file_image= $('#file_image').val();
	var SortOrder= $('#menuSortOrder').val();	
	var hdnRecID= $('#hdnRecID').val();
	
	var Error="";
	if(selDeviceType==""){Error+="Please Select Device Type \n";}
	if(selDeviceID==""){Error+="Please Select Device Name \n";}
	if(AppID==""){Error+="Please Select App Name \n";}
	if(menuTitle==""){Error+="Please Enter Title Name \n";}
	
	if($('#hdnImage').val()==0){
		if(file_image==""){Error+="Please Select Image \n";}
	}
	
	if(SortOrder==""){Error+="Please Enter SortOrder \n";}
		
	
  		if(Error==""){			
		var data = new FormData();	
		var FileTagName="Image_";
		jQuery.each($("#menuIconFileTag input[type='file']"), function(i, file) {
			FileTagName=file.id;
			jQuery.each($("input[type='file']")[i].files, function(j, file) {				
				data.append(FileTagName, file);	
			});
		});
		
		data.append('DeviceTypeID', selDeviceType);	
		data.append('DeviceID', selDeviceID);	
		data.append('AppID', AppID);
		data.append('Title', menuTitle);
		data.append('RecID', hdnRecID);
		data.append('SortOrder', SortOrder);
		data.append('hdnImage', $('#hdnImage').val());
		
		$.ajax({
		url: siteurl+'/mega/SaveMenuIconImage',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){			
			//window.location=siteurl+'/mega';		
			if(res){
				var MyObj=$.parseJSON(res);					
				if(MyObj.result==true){
					window.location=siteurl+'/mega/getMenuIcon';
				}else{
					alert(MyObj.error);
				}
			}else{
				alert('unable to submit your request...');
			}
		}
		});	

		}else{
			alert(Error);
			return false;
		}
	

	
}
function isNumberKey(evt){
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;

 return true;
}
function ManuIconImageValidation(Obj){
var ext = Obj.value.split('.').pop().toLowerCase();
if($.inArray(ext, ['png','jpg']) == -1) {
alert('invalid extension! please Use PNG , JPG Image');
Obj.value='';
}
}

function validImage(Obj){
var ext = Obj.value.split('.').pop().toLowerCase();
if($.inArray(ext, ['png']) == -1) {
alert('invalid extension! please Use PNG Image');
Obj.value='';
}
}

function fnEditSplashScreen(){
	var DeviceTypeID= $('#hdnDeviceTypeID').val();
	var hdnImageSize= $('#hdnImageSize').val();
	var hdnID= $('#hdnID').val();
	var changeImg= $('#changeImg').val();
	var AppID= $('#HdnAppID').val();
	
	var Error="";
	if(DeviceTypeID==""){Error+=" Device Type Not found \n";}
	if(hdnImageSize==""){Error+="Image Size Not Found\n";}
	if(hdnID==""){Error+="Record ID Not found\n";}
	if(changeImg==""){Error+="Please Select Image\n";}
		
	
  		if(Error==""){			
		var data = new FormData();	
		var FileTagName="Image_";
		jQuery.each($("#imageTag input[type='file']"), function(i, file) {
			FileTagName=file.id;
			jQuery.each($("input[type='file']")[i].files, function(j, file) {				
				data.append(FileTagName, file);	
			});
		});
		
		data.append('DeviceTypeID', DeviceTypeID);	
		data.append('hdnImageSize', hdnImageSize);	
		data.append('hdnID', hdnID);
		
		
		$.ajax({
		url: siteurl+'/mega/updateSplashScreen',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){
			if(res){
				window.location=siteurl+'/mega/viewSplashScreen/'+AppID;
			}			
		}
		});	

		}else{
			alert(Error);
			return false;
		}
	

	
}

function fnEditHomeScreen(){
	var DeviceTypeID= $('#hdnDeviceTypeID').val();
	var hdnImageSize= $('#hdnImageSize').val();
	var hdnID= $('#hdnID').val();
	var changeImg= $('#changeImg').val();
	var AppID= $('#HdnAppID').val();
	
	var Error="";
	if(DeviceTypeID==""){Error+=" Device Type Not found \n";}
	if(hdnImageSize==""){Error+="Image Size Not Found\n";}
	if(hdnID==""){Error+="Record ID Not found\n";}
	if(changeImg==""){Error+="Please Select Image\n";}
		
	
  		if(Error==""){			
		var data = new FormData();	
		var FileTagName="Image_";
		jQuery.each($("#imageTag input[type='file']"), function(i, file) {
			FileTagName=file.id;
			jQuery.each($("input[type='file']")[i].files, function(j, file) {				
				data.append(FileTagName, file);	
			});
		});
		
		data.append('DeviceTypeID', DeviceTypeID);	
		data.append('hdnImageSize', hdnImageSize);	
		data.append('hdnID', hdnID);
		
		
		$.ajax({
		url: siteurl+'/mega/updateHomeScreens',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){
			if(res){
				window.location=siteurl+'/mega/viewHomeScreens/'+AppID;
			}			
		}
		});	

		}else{
			alert(Error);
			return false;
		}
		
}

function DeleteData(webService,RecID,Redirection,info){
if (confirm('are you sure! want to delete?')) { 	
 	$.post(siteurl+'/mega/'+webService,{RecID:RecID},function(data){ 
		alert('Record Delete Successfully...');
		if(Redirection!="" && info==""){
			window.location=siteurl+'/mega/'+Redirection;	
		}else if(Redirection!="" && info!=""){
			window.location=siteurl+'/mega/'+Redirection+"/"+info;	
		}else{
			
		}
		
	});
}
}

function fnSaveModules(){
	var ModuleTitle= $('#ModuleTitle').val();
	var Description= $('#Description').val();
	var hdnRecID= $('#hdnRecID').val();
	var moduleImg= $('#moduleImg').val();
	
	var Error="";
	if(ModuleTitle==""){Error+="Enter Module Title \n";}
	if(moduleImg==""){Error+="Enter Module Icon \n";}
	if(Description==""){Error+="Enter Description";}	
	
	var data = new FormData();
	
	var logoTagName="moduleImg";
	if(moduleImg!=""){		
		jQuery.each($("#tdModuleIcon input[type='file']"), function(i, file) {
			logoTagName=file.id;
			jQuery.each($("input[type='file']")[i].files, function(j, file) {				
				data.append(logoTagName, file);	
			});
		});
	}
	
	
	if(Error==""){
		/*$.post(siteurl+'/mega/SaveNewModule',{ModuleTitle:ModuleTitle,Description:Description,hdnRecID:hdnRecID},	function(data){ 
			alert('Save Data Successfully...');
			window.location=siteurl+'/mega/getModules';
		});*/
		data.append('ModuleTitle', ModuleTitle);	
		data.append('Description', Description);
		data.append('hdnRecID', hdnRecID);
		
		$.ajax({
		url: siteurl+'/mega/SaveNewModule',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){
			var MyObj=$.parseJSON(res);		
			//console.log(MyObj);
			//alert('Save Data Successfully...');
			//window.location=siteurl+'/mega/getModules';
			alert(MyObj.msg);
			if(MyObj.success==true){				
				window.location=siteurl+'/mega/getModules';
			}
		}
		});
		
		
	}else{
		alert(Error);
	}
}
function fnSaveAppScreen(){
	var selApp= $('#selApp').val();
	var selModule= $('#selModule').val();
	var screenTitle= $('#screenTitle').val();
	var Description= $('#Description').val();
	var selShow= $('#selShow').val();
	var SortOrder= $('#menuSortOrder').val();
	var hdnRecID= $('#hdnRecID').val();
	
	var Error="";
	if(selModule==""){Error+="Select Module  \n";}
	if(Description==""){Error+="Enter Description";}	
	if(selApp==""){Error+="Select App";}	
	if(screenTitle==""){Error+="Enter Title";}
	
	
	
	if(Error==""){
		$.post(siteurl+'/mega/SaveScreenData',{selApp:selApp,selModule:selModule,screenTitle:screenTitle,Description:Description,selShow:selShow,SortOrder:SortOrder,hdnRecID:hdnRecID},	function(data){ 
			alert('Save Data Successfully...');
			window.location=siteurl+'/mega/getAppScreens';
		});
	}else{
		alert(Error);
	}
}

function fnSaveScreenMenuIcon(){	
	var selDeviceID= $('#selDeviceName').val();
	var selScreen= $('#selScreen').val();
	var menuTitle= $('#menuTitle').val();	
	var file_image= $('#file_image').val();	
	var hdnRecID= $('#hdnRecID').val();
	
	var Error="";	
	if(selDeviceID==""){Error+="Please Select Device \n";}
	if(selScreen==""){Error+="Please Select Screen \n";}
	if(menuTitle==""){Error+="Please Enter Title \n";}
	
	if($('#hdnImage').val()==0){
		if(file_image==""){Error+="Please Select Image \n";}
	}		
	
  		if(Error==""){			
		var data = new FormData();	
		var FileTagName="Image_";
		jQuery.each($("#menuIconFileTag input[type='file']"), function(i, file) {
			FileTagName=file.id;
			jQuery.each($("input[type='file']")[i].files, function(j, file) {				
				data.append(FileTagName, file);	
			});
		});
		
		
		data.append('DeviceID', selDeviceID);	
		data.append('ScreenID', selScreen);
		data.append('Title', menuTitle);
		data.append('RecID', hdnRecID);		
		data.append('hdnImage', $('#hdnImage').val());
		
		$.ajax({
		url: siteurl+'/mega/SaveScreenMenuIconImage',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){			
			//window.location=siteurl+'/mega';		
			if(res){
				var MyObj=$.parseJSON(res);					
				if(MyObj.result==true){
					alert('Save Data Successfully...');
					window.location=siteurl+'/mega/getScreensMenuIcon';
				}else{
					alert(MyObj.error);
				}
			}else{
				alert('unable to submit your request...');
			}
		}
		});	

		}else{
			alert(Error);
			return false;
		}
	

	
}
