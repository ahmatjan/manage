<{extends file="../layout.tpl" }>
	<{block name="head" append}>
		<script type="text/javascript" src="/manage/static/js/jquery.min.js"></script> 
		<script>
		$(document).ready(function() {
            //跳转发送邮件页面
           $('#sendMail').click(function(){
            	var body = $('.emailBody').html();
		        $.ajax({
				   type: "POST",
				   url: "./sendMail.php",
				   data: "title=John&body="+body,
				   success: function(msg){
				   	$('body').append("Data Saved: " + msg )
				     //console.log( );
				   }
				});

            });
		});
		</script>
	<{/block}>
	<{block name="content"}>
	<a href="#" id="sendMail">确定发送</a>
	<div class="emailBody">
		<style type="text/css">
			#myWrapTb{border: 1px #000 solid;
			border-collapse:collapse;border-spacing: 0;width:100%; font-family: Microsoft YaHei;}
			#myWrapTb .my-item-list{background: #b6dde8;height:30px;font-size: 14px;padding-left:10px;}
			#myWrapTb > td{ padding: 3px;border: 1px #000 solid;}
			.mytbstyle{border-collapse:collapse;border-spacing: 0;width:100%;font-family: Microsoft YaHei;}
			.mytbstyle td{
				border: 1px #ddd solid;
				padding: 2px 3px;
				word-break: keep-all;
				white-space: nowrap;
			}
		</style>

		 <table id="myWrapTb">
 		 	<tr>
		 		<td style="background: #4bacc6;height:40px;text-align: center;font-weight: 700;font-size: 16px;">FE团队工作周报（2015/6/29-2015/7/3）</td>
		 	</tr>
 		 	<tr>
		 		<td class="my-item-list">一、 本周工作中最重要的几件事：</td>
		 	</tr>
			<tbody>
				<tr>
					<td> 
					<table class="mytbstyle">
				  	<thead>
			 		 	<tr>
					 		<td>标题</td>
					 		<td>状态</td>
					 		<td>负责人</td>
					 		<td>详情</td>
					 	</tr>
		  			</thead>
					<tbody>
					 	<{foreach from=$list key=myId item=i}>
					 	<tr>
					 		<td>【<{$i.title}>】</td>
					 		<td><{$i.status}></td>
					 		<td><{$i.owner}></td>
					 		<td><{$i.content}></td>
					 	</tr>

					 	<tr>
					 		<td colspan='4'>
						 		<{if is_array($i)}> 
							 	<table class="mytbstyle">
								 	<{foreach from=$i.tasks key=taskId item=task}>
								 	<tr>
								 		<td>.<{$task.title}></td>
								 		<td><{$task.status}></td>
								 		<td><{$task.owner}></td>
								 	</tr>
									<{/foreach}>
								 </table>
								 <{/if}>
						 	</td>
						 	</tr>
						<{/foreach}>
					</tbody>
				 </table>
				 </td>
			 </tr>
			</tbody>

 		 	<tr>
		 		<td class="my-item-list">二、下周工作重心(侧重整体)、规划（布局分工）及目标(达成什么进展)：</td>
		 	</tr>

			<tbody>
				<tr>
					<td style="height:120px;font-size: 14px;padding-left:10px;"></td>
			 	</tr>
			</tbody>

			<tr>
		 		<td class="my-item-list">三、支持和分享（重要汇总）：</td>
		 	</tr>

			<tr>
		 		<td>					
	 		   <table class="mytbstyle">
					  	<thead>
				 		 	<tr>
						 		<td>内容</td>
						 		<td>表述</td>
						 		<td>后续建议</td>
						 	</tr>
			  			</thead>
						<tbody>
						 	<tr>
						 		<td>遇到问题</td>
						 		<td></td>
						 		<td></td>
						 	</tr>
						 	<tr>
						 		<td>所需支持</td>
						 		<td></td>
						 		<td></td>
						 	</tr>
						 	<tr>
						 		<td>团队和人员</td>
						 		<td></td>
						 		<td></td>
						 	</tr>
						 	<tr>
						 		<td>想分享的话/咨询</td>
						 		<td></td>
						 		<td></td>
						 	</tr>
						</tbody>
					 </table>
				 </td>
		 	</tr>

		 	<tr>
		 		<td class="my-item-list">四、抛砖引玉(对团队、对行业、对项目等有任何建议)：</td>
		 	</tr>

		 	<tr>
		 		<td style="height:160px;font-size: 14px;padding-left:10px;"></td>
		 	</tr>
		 </table>

	</div>
	<{/block}>