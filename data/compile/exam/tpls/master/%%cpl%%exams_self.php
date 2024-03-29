<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="padding-top:10px;margin-bottom:0px;">
				<?php $this->_compileInclude('menu'); ?>
			</div>
			<div class="col-xs-10" id="datacontent">
<?php } ?>
				<div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-teach"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-exams&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">试卷管理</a></li>
							<li class="active">手工组卷</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						手工组卷
						<a class="btn btn-primary pull-right" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-exams&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">试卷管理</a>
					</h4>
			        <form action="index.php?exam-master-exams-selfpage" method="post" class="form-horizontal">
						<table class="table table-hover table-bordered">
							<tr>
								<td align="center">
									<b>试卷名称</b>
								</td>
								<td colspan=4 width="15">
									<input class="form-control" type="text" name="args[exam]" value="" needle="needle" placeholder="必填，字数控制在10字内" msg="您必须为该试卷输入一个名称"/>
								</td>
							</tr>
							<tr>
								<td align="center">
									<b>评卷方式</b>
								</td>
								<td colspan=4>
									<input name="args[examdecide]" type="radio" value="1"/>教师评卷
									<input name="args[examdecide]" type="radio" value="0" checked/>学生自评<font color="#999999">（教师评卷时有主观题则需要教师在后台评分后才能显示分数，无主观题自动显示分数）</font>
								</td>
							</tr>
							<tr class="info">
								<td align="center">
									<b>考试科目</b>
								</td>
								<td align="center">
									<b>考试时长</b>
								</td>
								<td align="center">
									<b>试卷总分</b>
								</td>
								<td align="center">
									<b>及格线</b>
								</td>
								<td align="center">
									<b>来源</b>
								</td>
							</tr>
							<tr>
								<td width="150" align="center">
									<select class="combox form-control" autocomplete="off" id="selectedsubjectid" msg="请选择科目" needle="needle" min="1" name="args[examsubject]" onchange="javascript:loadsubjectsetting(this);">
										<option value="">请选择科目</option>
										<?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
										<option value="<?php echo $subject['subjectid']; ?>"><?php echo $subject['subject']; ?></option>
										<?php } ?>
									</select>
								</td>
								<td width="120">
									<input class="form-control" type="text" name="args[examsetting][examtime]" value="" size="4" needle="needle" class="inline" placeholder="必填/分" msg="你要为本卷设置考试时长" datatype="number"/>
								</td>
								<td width="110">
									<input class="form-control" type="text" name="args[examsetting][score]" value="" size="4" needle="needle" placeholder="必填" msg="你要为本考卷设置总分" datatype="number"/>
								</td>
								<td width="110">
									<input class="form-control" type="text" name="args[examsetting][passscore]" value="" size="4" needle="needle" placeholder="必填" msg="你要为本考卷设置一个及格分数线" datatype="number"/>
								</td>
								<td>
									<input class="form-control" type="text" name="args[examsetting][comfrom]" value="" size="4" placeholder="选填"/>
								</td>
							</tr>
						</table>
						<table class="table table-hover table-bordered">
							<thead>
							<tr class="info">
								<td width="170" align="center">
									<b>题型</b>
								</td>
								<td width="80" align="center">
									<b>题数</b>
								</td>
								<td width="80" align="center">
									<b>分值</b>
								</td>
								<td width="50" align="center">
									<b>已选</b>
								</td>
								<td width="120" align="center">
									<b>操作</b>
								</td>
								<td width="520" align="center">
									<b>小题说明</b>
								</td>
							</tr>
							</thead>
						</table>
						<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
							<div class="form-group questpanel panel_<?php echo $questype['questid']; ?>">
								<label class="control-label col-sm-2"><?php echo $questype['questype']; ?></label>
								<div class="col-sm-10 form-inline">
									<input id="iselectallnumber_<?php echo $questype['questid']; ?>" type="text" class="form-control" needle="needle" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][number]" value="0" align="left" size="2" msg="您必须填写总题数"/>
									<input class="form-control" needle="needle" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][score]" value="0" size="2" msg="您必须填写每题的分值"/>
									<span class="info">&nbsp&nbsp&nbsp</span>
									<span id="ialreadyselectnumber_<?php echo $key; ?>">0</span>
									<span class="info">&nbsp&nbsp&nbsp</span>
									<a class="selfmodal btn btn-info" href="javascript:;" data-target="#modal" url="index.php?exam-master-exams-selected&questionids={iselectquestions_<?php echo $key; ?>}&rowsquestionids={iselectrowsquestions_<?php echo $key; ?>}" valuefrom="iselectquestions_<?php echo $key; ?>|iselectrowsquestions_<?php echo $key; ?>">看题</a>
									<a class="selfmodal btn btn-primary" href="javascript:;" data-target="#modal" url="index.php?exam-master-exams-selectquestions&search[questionsubjectid]={selectedsubjectid}&search[questiontype]=<?php echo $key; ?>&questionids={iselectquestions_<?php echo $key; ?>}&rowsquestionids={iselectrowsquestions_<?php echo $key; ?>}&useframe=1" valuefrom="iselectquestions_<?php echo $key; ?>|iselectrowsquestions_<?php echo $key; ?>|selectedsubjectid">选题</a>
				  					<input type="hidden" value="" id="iselectquestions_<?php echo $key; ?>" name="args[examquestions][<?php echo $key; ?>][questions]" />
				  					<input type="hidden" value="" id="iselectrowsquestions_<?php echo $key; ?>" name="args[examquestions][<?php echo $key; ?>][rowsquestions]" />
									<input class="form-control" type="text" name="args[examsetting][questype][<?php echo $questype['questid']; ?>][describe]" value="" size="52" placeholder="选填"/>
								</div>
							</div>
						<?php } ?>
						<div class="form-group">
							<label class="control-label col-sm-2">题型排序</label>
							<div class="col-sm-9">
								<div class="sortable btn-group">
									<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
									<a class="btn btn-primary questpanel panel_<?php echo $questype['questid']; ?>"><?php echo $questype['questype']; ?><input type="hidden" name="args[examsetting][questypelite][<?php echo $questype['questid']; ?>]" value="1" class="questypepanelinput" id="panel_<?php echo $questype['questid']; ?>"/></a>
									<?php } ?>
									<font color="#999999">&nbsp&nbsp&nbsp&nbsp拖拽进行题型排序</font>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2"></label>
							<div class="col-sm-9">
							  	<button class="btn btn-primary" type="submit">提交</button>
								<input type="hidden" name="submitsetting" value="1"/>
							</div>
						</div>
					</form>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<div id="modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
				<h4 id="myModalLabel">
					试题详情
				</h4>
			</div>
			<div class="modal-body" id="modal-body"></div>
			<div class="modal-footer">
				 <button aria-hidden="true" class="btn btn-primary" data-dismiss="modal">完成</button>
			</div>
		</div>
	</div>
</div>
<script>
function loadsubjectsetting(obj)
{
	$.getJSON('index.php?exam-master-basic-getsubjectquestype&subjectid='+$(obj).val()+'&'+Math.random(),function(data){$('.questpanel').hide();for(x in data){$('.panel_'+data[x]).show();}});
}
</script>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>