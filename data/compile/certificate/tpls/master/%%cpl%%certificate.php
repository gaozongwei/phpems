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
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
							<li class="active">证书管理</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;overflow:visible">
					<h4 class="title" style="padding:10px;">
						证书管理
						<a class="btn btn-primary pull-right" href="index.php?certificate-master-certificate-add">添加证书</a>
					</h4>
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th width="60">ID</th>
			                    <th width="80">缩略图</th>
						        <th>标题</th>
						        <th width="120">价格（积分）</th>
						        <th width="120">添加时间</th>
						        <th width="140">操作</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?php $cid = 0;
 foreach($this->tpl_var['certificates']['data'] as $key => $certificate){ 
 $cid++; ?>
			            	<tr>
			                    <td><?php echo $certificate['ceid']; ?></td>
			                    <td class="picture"><img src="<?php if($certificate['cethumb']){ ?><?php echo $certificate['cethumb']; ?><?php } else { ?>app/core/styles/images/noupload.gif<?php } ?>" alt="" style="width:60px;"/></td>
			                    <td>
			                        <?php echo $certificate['cetitle']; ?>
			                    </td>
			                    <td>
			                        <?php echo $certificate['ceprice']; ?>
			                    </td>
			                    <td>
			                    	<?php echo date('Y-m-d',$certificate['cetime']); ?>
			                    </td>
			                    <td class="actions">
			                    	<div class="btn-group">
			                    		<a class="btn" href="index.php?certificate-master-certificate-queue&ceid=<?php echo $certificate['ceid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="列表"><em class="glyphicon glyphicon-list"></em></a>
			                    		<a class="btn" href="index.php?certificate-master-certificate-modify&ceid=<?php echo $certificate['ceid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="glyphicon glyphicon-edit"></em></a>
										<a class="btn confirm" href="index.php?certificate-master-certificate-del&ceid=<?php echo $certificate['ceid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="glyphicon glyphicon-remove"></em></a>
			                    	</div>
			                    </td>
			                </tr>
			                <?php } ?>
			        	</tbody>
			        </table>
					<ul class="pagination pull-right">
						<?php echo $this->tpl_var['certificates']['pages']; ?>
					</ul>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>