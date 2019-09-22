<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<?php $signPackage = $this->G->make('jssdk','user')->GetSignPackage();; ?>
<body>
<div id="content">
    <div class="pages" id="page1">
<?php } ?>
    	<div class="pagecontent">
		<header class="container-fluid" style="background-color:#337AB7;">
			<h5 class="text-center">
				<em style="font-size:2rem;" class="pull-left glyphicon glyphicon-home"></em>
				<span class="ttlo">山东职业学院模拟考试系统</span>
				<a style="font-size:2rem;color:#FFFFFF;" href="index.php?user-phone" class="pull-right glyphicon glyphicon-user ajax" data-target="user" data-page="user"></a>
			</h5>
		</header>
    	<div class="container-fluid" style="overflow:hidden;margin-top:1rem;margin-bottom:0.4rem;">
			<div class="swiper-container">
	    		<div class="swiper-wrapper">
		    		<?php $cid = 0;
 foreach($this->tpl_var['contents'][2]['data'] as $key => $content){ 
 $cid++; ?>
		    		<div class="swiper-slide">
		    			<a href="index.php?content-phone-content&contentid=<?php echo $content['contentid']; ?>" class="ajax" data-page="rollpage" data-target="rollpage">
		    				<img src="<?php echo $content['contentthumb']; ?>">
		    			</a>
		    		</div>
		    		<?php } ?>
	    		</div>
	    		<div class="swiper-pagination"></div>
	    	</div>
		</div>
		<div class="container-fluid">
			<div style="clear:both;overflow:hidden;" class="items">
				<div class="col-xs-3" style="padding:0.2rem;">
					<div class="text-center" style="padding:0.2rem;padding-top:1.5rem;">
						<a href="index.php?exam-phone-index" class="ajax" data-page="mybasic" data-target="mybasic">
							<p>
								<img src="app/core/styles/img/exam.png" style="width:92%;"/>
							</p>
							<h5>在线考试</h5>
						</a>
					</div>
				</div>
				<div class="col-xs-3" style="padding:0.2rem;">
					<div class="text-center" style="padding:0.2rem;padding-top:1.5rem;">
						<a class="ajax" href="index.php?course-phone-index" data-target="course" data-page="course">
							<p>
								<img src="app/core/styles/img/video.png" style="width:92%;"/>
							</p>
							<h5>视频课程</h5>
						</a>
					</div>
				</div>
				<div class="col-xs-3" style="padding:0.2rem;">
					<div class="text-center" style="padding:0.2rem;padding-top:1.5rem;">
						<a href="index.php?certificate-phone" data-target="certificate" data-page="certificate" class="ajax">
							<p>
								<img src="app/core/styles/img/t3.png" style="width:92%;"/>
							</p>
							<h5>证书申请</h5>
						</a>
					</div>
				</div>
				<div class="col-xs-3" style="padding:0.2rem;">
					<div class="text-center" style="padding:0.2rem;padding-top:1.5rem;">
						<a href="index.php?content-phone-category" data-target="contentcategory" data-page="contentcategory" class="ajax">
							<p>
								<img src="app/core/styles/img/news.png" style="width:92%;"/>
							</p>
							<h5>考试资讯</h5>
						</a>
					</div>
				</div>
			</div>
			<h4 style="overflow:hidden;clear:both;padding-top:0.2rem;">
				<span class="pull-left" style="width:35%"><hr /></span>
				<span class="col-xs-4 text-center" style="width:30%;line-height:4rem;">热门考场</span>
				<span class="pull-right" style="width:35%"><hr /></span>
			</h4>
			<div style="clear:both;padding:0px;margin-bottom:1rem;overflow: hidden;">
				<?php $bid = 0;
 foreach($this->tpl_var['basics']['basic'] as $key => $basic){ 
 $bid++; ?>
				<div class="col-xs-6" style="padding:3px;">
					<div style="background-color:#FFFFFF;padding:7px">
						<a href="index.php?exam-phone-index-setCurrentBasic&basicid=<?php echo $basic['basicid']; ?>" class="ajax" data-target="basic" data-page="basic">
							<img src="<?php echo $basic['basicthumb']; ?>" style="width:100%;"/>
						</a>
						<h5 class="text-center">
							<a href="index.php?exam-phone-index-setCurrentBasic&basicid=<?php echo $basic['basicid']; ?>" class="ajax" data-target="basic" data-page="basic"><?php echo $basic['basic']; ?></a>
						</h5>
					</div>
				</div>
				<?php } ?>
			</div>
			<div>
				<h4 style="overflow:hidden;clear:both;padding-top:0.2rem;">
					<span class="pull-left" style="width:35%"><hr /></span>
					<span class="col-xs-4 text-center" style="width:30%;line-height:4rem;">视频课程</span>
					<span class="pull-right" style="width:35%"><hr /></span>
				</h4>
			</div>
			<div style="clear:both;padding:0px;margin-bottom:1rem;">
				<?php $cid = 0;
 foreach($this->tpl_var['courses']['data'] as $key => $course){ 
 $cid++; ?>
				<div class="col-xs-6" style="padding:3px;">
					<div style="background-color:#FFFFFF;padding:7px">
						<a class="ajax" href="index.php?course-phone-course&csid=<?php echo $course['csid']; ?>" data-target="courseplatform" data-page="courseplatform" style="width:8rem;">
							<img src="<?php echo $course['csthumb']; ?>" style="width:100%;" alt="<?php echo $course['cstitle']; ?>">
						</a>
						<h5 class="text-center"><a class="ajax" href="index.php?course-phone-course&csid=<?php echo $course['csid']; ?>" data-target="courseplatform" data-page="courseplatform"><?php echo $course['cstitle']; ?></a></h5>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php $cid = 0;
 foreach($this->tpl_var['contents'] as $key => $contents){ 
 $cid++; ?>
			<?php if($key != 2){ ?>
			<div>
				<h4 style="overflow:hidden;clear:both;padding-top:0.2rem;">
					<span class="pull-left" style="width:35%"><hr /></span>
					<span class="col-xs-4 text-center" style="width:30%;line-height:4rem;"><?php echo $this->G->make('strings')->subString($this->tpl_var['rcats'][$key]['catname'],15); ?></span>
					<span class="pull-right" style="width:35%"><hr /></span>
				</h4>
			</div>
			<div style="clear:both;padding:1.5rem;background-color:#FFFFFF;margin-bottom:1rem;" class="col-xs-12">
				<?php $cid = 0;
 foreach($contents['data'] as $key => $content){ 
 $cid++; ?>
				<div class="media">
					<div class="media-body">
						<h5 class="media-heading"><a class="ajax" href="index.php?content-phone-content&contentid=<?php echo $content['contentid']; ?>" data-target="contentpage" data-page="contentpage"><?php echo $content['contenttitle']; ?></a></h5>
						<p style="font-size:0.8rem;"><?php echo $this->G->make('strings')->subString($content['contentdescribe'],81); ?> </p>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			<?php } ?>
		</div>
		</div>
		<script>
			$(function(){
				var mySwiper = new Swiper('.swiper-container',{
					"pagination":".swiper-pagination",
					"loop":true,
					"autoplay": 3000,
					"observer":true,
					"observeParents":true
				});
			});
		</script>
		<?php $this->_compileInclude('footer'); ?>
<?php if(!$this->tpl_var['userhash']){ ?>
    </div>
</div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	wx.config({
        debug: false,
        appId: '<?php echo $signPackage['appId']; ?>',
        timestamp: <?php echo $signPackage['timestamp']; ?>,
		nonceStr: '<?php echo $signPackage['nonceStr']; ?>',
        signature: '<?php echo $signPackage['signature']; ?>',
        jsApiList:  ['onMenuShareTimeline','onMenuShareAppMessage']
    });
</script>
</body>
</html>
<?php } ?>