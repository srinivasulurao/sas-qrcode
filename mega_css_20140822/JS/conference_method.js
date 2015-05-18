var siteurl="http://localhost/confcms";
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

function saveImage_()
{
	var angVal=$("#angVal").val();
	var imageName=$("#imageName").val();
	$.post(siteurl+"/admin/resizeImage",{imageName:imageName,angVal:angVal},
			function(data)
			{
				alert(data);
			});
}

function addAng_()
{
	var angVal=$("#angVal").val();
	newAng= Number(angVal)+90;
	$("#angVal").val(newAng);
}
function subAng_()
{
	var angVal=$("#angVal").val();
	newAng= Number(angVal)-90;
	$("#angVal").val(newAng)
}
function DeleteRecord(webService,RecID,Redirection,info){
if (confirm('are you sure! want to delete?')) { 	
 	$.post(siteurl+'/conference/'+webService,{RecID:RecID},function(data){ 		
		alert('Record Delete Successfully...');
		if(Redirection!="" && info==""){
			window.location=siteurl+'/conference/'+Redirection;	
		}else if(Redirection!="" && info!=""){
			window.location=siteurl+'/conference/'+Redirection+"/"+info;	
		}else{
			
		}
		
	});
}
}
//========================method===================
function saveConference()
{
	var con_name=$("#con_name").val();
	var recID=$("#recID").val();
	var selShow=$("#selShow").val();
	
	if(con_name!="" && selShow!=""){
		$.post(siteurl+'/conference/saveConference',{con_name:con_name,recID:recID,selShow:selShow},function(data){ 
			var result=$.parseJSON(data);
			
			if(result.success==true){
				//alert(result.msg);
				//window.location=siteurl+'/conference/index';
			}else{
				alert(result.msg);
			}
		});	
	}else{
		alert('Please Eneter conference Name OR Show');
	}
	
}
function saveConferenceSetting()
{

    saveConference();
	var conf_id=$("#conf_id").val();
	var recID=$("#recID").val();
	var logo=$("#logo").val();
	var bgImage=$("#bgImage").val();
	
	var data = new FormData();
	var logoTagName="logo";
	if(logo!=""){		
		jQuery.each($("#tdLogoImage input[type='file']"), function(i, file) {
			logoTagName=file.id;
			jQuery.each($("#tdLogoImage input[type='file']")[i].files, function(j, file) {				
				data.append(logoTagName, file);	
			});
		});
	}
	var BgImageTagName="bgImage";
	if(bgImage!=""){		
		jQuery.each($("#tdBgImage input[type='file']"), function(i, file) {
			BgImageTagName=file.id;
			
			jQuery.each($("#tdBgImage input[type='file']")[i].files, function(j, file2) {				
				data.append(BgImageTagName, file2);	
			});
		});
	}
		
	if(conf_id!=""){
		data.append('conf_id', conf_id);	
		data.append('recID', recID);	

		$.ajax({
		url: siteurl+'/conference/saveConferenceSetting',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){
			console.log(res);
			var result=$.parseJSON(res);
			
			if(result.success==true){
				alert(result.msg);
				window.location='';
			}else{
				alert(result.msg);
			}
		}
		});
		
	}else{
		alert('Please Select conference Name');
	}
	
}


function SaveConModules(){
var modules=[];
$("#sortable2").children().each(function(i,item){		
	modules.push($(item).attr('id'));
});
var conf_id=$("#conf_id").val();
var Error="";

if(conf_id==""){Error+="Please Select Conference Name \n";}
if(modules.length==0){Error+="Please Select Atleast on Module \n";}

if(Error==""){
	
$.post(siteurl+'/conference/saveConferenceModule',{con_name:conf_id,Modules:modules},function(data){ 
	var result=$.parseJSON(data);
	alert(result.msg);
	if(result.success==true){		
		window.location=siteurl+'/conference/ConModuleViewSetting/'+conf_id;
	}
});

}else{
	alert(Error);
}


}

function OnSelectConference(Obj){
	if(Obj.value!=""){
		window.location=siteurl+'/conference/ConModuleViewSetting/'+Obj.value;
	}else{
		window.location=siteurl+'/conference/ConModuleViewSetting/';
	}
}

function SaveOverviewData(){
	
	var overview_title=$("#overview_title").val();
	var overview_text=$("#overview_text").val();	
	var recID=$("#recID").val();
	
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	
	$.post(siteurl+'/conference/saveMod_Overview',{overview_title:overview_title,overview_text:overview_text,recID:recID,ConferenceID:HdnConferenceID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID;
		}
	});
	
	
}
function DeleteOverviewData(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_Overview',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID;
		}
	});
}
}

function SaveSessionData(){
	
	var session_title=$("#session_title").val();
	var sessionType=$("#sessionType").val();
	var startDate=$("#startDate").val();
	var endDate=$("#endDate").val();
	var ShowType=$("#ShowType").val();
	var recID=$("#recID").val();
	
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	
	$.post(siteurl+'/conference/saveMod_Session',{session_title:session_title,sessionType:sessionType,recID:recID,ConferenceID:HdnConferenceID,startDate:startDate,endDate:endDate,ShowType:ShowType},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID;
		}
	});
	
	
}
function DeleteSessionData(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_Session',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID;
		}
	});
}
}

function DeleteSessionPresenationData(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_SessionPresentaion',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID+'/presentation_'+SessionID;
		}
	});
}
}


function SaveSessionPresentatorData(){
	
	var Title=$("#Title").val();
	var Presenter=$("#Presenter").val();
	var Audience=$("#Audience").val();
	var Strand=$("#Strand").val();
	var Floor=$("#Floor").val();
	var Description=$("#Description").val();
	var handout_link=$("#handout_link").val();
	var Room=$("#Room").val();
	
	var recID=$("#recID").val();	
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	var SessionID=$("#HdnSessionID").val();
	
	
	$.post(siteurl+'/conference/saveMod_SessionPresentaion',{Title:Title,Presenter:Presenter,recID:recID,Audience:Audience,Strand:Strand,Floor:Floor,Room:Room,Description:Description,handout_link:handout_link,SessionID:SessionID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){ 	
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID+'/presentation_'+SessionID;
		}
	});
	
	
}

function saveSpeakerData()
{
	var speaker_name=$("#speaker_name").val();
	var about_speaker=$("#about_speaker").val();
	var spaeakerImage=$("#spaeakerImage").val();
	var hdnImage=$("#hdnImage").val();
	
	var recID=$("#recID").val();
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	
	
	var data = new FormData();
	var SpeakerImgTagName="spaeakerImage";
	if(spaeakerImage!=""){		
		jQuery.each($("#tdSpeaker input[type='file']"), function(i, file) {
			SpeakerImgTagName=file.id;
			jQuery.each($("#tdSpeaker input[type='file']")[i].files, function(j, file) {				
				data.append(SpeakerImgTagName, file);	
			});
		});
	}
	
		
	if(HdnConferenceID!=""){
		data.append('ConferenceID', HdnConferenceID);	
		data.append('recID', recID);
		data.append('ModuleID', HdnModuleID);
		data.append('AboutSpeaker', about_speaker);
		data.append('SpeakerName', speaker_name);
		data.append('hdnImage', hdnImage);
		
		$.ajax({
		url: siteurl+'/conference/saveMod_SpeakerData',
		data:data,
		cache: false,
		contentType:false,
		processData: false,
		type: 'POST',
		success: function(res){
			//console.log(res); ManageModuleData/8/7/speaker_0
			var result=$.parseJSON(res);
			alert(result.msg);
			if(result.success==true){				
				window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID+'/speaker_0';
			}
		}
		});
		
	}else{
		alert('Please Select conference Name');
	}
	
}

function DeleteSpeakerData(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_SpeakerData',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID+'/speaker_0';
		}
	});
}
}


function SaveKeynoteDetail(){
	var keynote_date=$("#keynote_date").val();
	var keynote_start_time=$("#keynote_start_time").val();
	var keynote_end_time=$("#keynote_end_time").val();
	var keynote_place=$("#keynote_place").val();
	
	var recID=$("#recID").val();
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	
	var SelSpeakerList=0;
	var keynote_address=0;
	
	$("[name^=SelSpeaker]").each(function () {
       if($(this).val()==""){
		 SelSpeakerList++;  
	   }
    });
	$("[name^=keynote_address]").each(function () {
       if($(this).val()==""){
		 keynote_address++;  
	   }
    });
	var Error="";
	
	if(keynote_date==""){Error+="Enter keynote date \n";}
	if(keynote_start_time==""){Error+="Enter keynote start time \n";}
	if(keynote_end_time==""){Error+="Enter keynote end time \n";}
	if(keynote_place==""){Error+="Enter keynote place \n";}
	if(keynote_address>0){Error+="Enter Keynote Address \n";}
	if(SelSpeakerList>0){Error+="Enter Speaker \n";}
	
	if(Error==""){		
		var datastring = $("#keynoteForm").serialize();
		$.ajax({
            type: "POST",
            url: siteurl+'/conference/saveMod_KeynoteData',
            data: datastring,
            dataType: "json",
            success: function(data) {
                //var result=$.parseJSON(data);
				//console.log(data);
				//var result=$.parseJSON(data);
				alert(data.msg);
				if(data.success==true){	 
					window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID;
				}
            },
            error: function(error){
				console.log(error);                  
            }
        });
		
	}else{
		alert(Error);	
	}

}

function DeleteKeynoteDetailInfo(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_KeynoteData',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);
		console.log(result);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID;
		}
	});
}
}
function saveKeynoteSessionData(){
	
	var SelSpeaker=$("#SelSpeaker").val();
	var keynote_session=$("#keynote_session").val();
	var startDate=$("#startDate").val();
	var endDate=$("#endDate").val();
	var keynote_session_detail=$("#keynote_session_detail").val();
	
	var recID=$("#recID").val();	
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	var KeyNoteDetailID=$("#KeyNoteDetailID").val();
	
	
	$.post(siteurl+'/conference/saveMod_KeynoteSessionData',{SelSpeaker:SelSpeaker,keynote_session:keynote_session,startDate:startDate,endDate:endDate,keynote_session_detail:keynote_session_detail,recID:recID,KeyNoteDetailID:KeyNoteDetailID},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){ 	
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID+'/sessioninfo_'+KeyNoteDetailID;
		}
	});
	
	
}
function DeleteKeynoteSessionData(RecID,ModuleID,ConferenceID,keyDetailID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_KeynoteSessionData',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);		
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID+'/sessioninfo_'+keyDetailID;
		}
	});
}
}



function SavePlannerData(){
	
	var planner_title=$("#planner_title").val();
	var planner_date=$("#planner_date").val();
	var planner_detail=$("#planner_detail").val();
	
	var recID=$("#recID").val();	
	var HdnConferenceID=$("#HdnConferenceID").val();
	var HdnModuleID=$("#HdnModuleID").val();
	
	$.post(siteurl+'/conference/saveMod_PlannerData',{planner_title:planner_title,planner_date:planner_date,recID:recID,ConferenceID:HdnConferenceID,planner_detail:planner_detail},function(data){ 
		var result=$.parseJSON(data);
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+HdnModuleID+'/'+HdnConferenceID;
		}
	});	
	
}
function DeletePlannerData(RecID,ModuleID,ConferenceID){
if (confirm('are you sure! want to delete?')) { 
	
 	$.post(siteurl+'/conference/deleteMod_PlannerData',{RecID:RecID},function(data){ 
		var result=$.parseJSON(data);		
		alert(result.msg);
		if(result.success==true){		
			window.location=siteurl+'/conference/ManageModuleData/'+ModuleID+'/'+ConferenceID;
		}
	});
}
}