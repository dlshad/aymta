<?php // $Id: node.tpl.php,v 1.1.2.3 2009/11/17 09:02:35 ipwa Exp $ ?>

<div class="container">
	
	<div id="header">
		<div class="titles">
		  <?php if ($site_name): ?>
		    <h1 id="site-name">
		      <a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a>
		    </h1>
		  <?php endif; ?>
		  <?php if ($site_slogan): ?>
		    <div class="slogan"><h2><?php print $site_slogan; ?></h2></div>
		  <?php endif; ?>
		</div>
	</div>
	
	
	<div id="content">	
		<?php if ($breadcrumb): ?>
            <div id="breadcrumb">
          <?php print $breadcrumb; ?>
            </div><!-- /breadcrumb -->
        <?php endif; ?>
         
		<?php if ($tabs): ?>
          <div id="content-tabs">
            <?php print render($tabs); ?>
          </div>
        <?php endif; ?>
	
	<div class="post-frame">
		<div class="post-frame-top"></div>		  
		   
		   <?php print render($page['content_top']); ?>
		            
			<div class="post-content">
				<?php print render($page['help']); ?>
				
				<?php print render($page['content']); ?>
				<div class="clear"></div>
			</div>
			
			<?php print render($page['content_bottom']); ?>
			<div class="post-footer"></div>
		<span class="post-frame-bottom"></span>
	</div></div>
	
	
	
	
<div id="sidebar">
	<?php if ($main_menu): ?>
		<div class="widget grassland-navigation-widget" id="navigation">
			<span class="widget-top"></span>
			<div class="widget-centre">
        		<h3>Navigation</h3>
          		<?php print theme('links__system_main_menu', array(
		          'links' => $main_menu,
		          'attributes' => array(
		            'id' => 'main-menu',
		            'class' => array('links', 'clearfix'),
		          ),
		          'heading' => array(
		            'text' => t('Main menu'),
		            'level' => 'h2',
		            'class' => array('element-invisible'),
		          ),
		        )); ?>  	
			</div>
			<span class="widget-bottom"></span>
		</div>
	<?php endif; ?>	
				
	<div class="widget grassland-navigation-widget">
		<span class="widget-top"></span>
		<div class="widget-centre">
			<?php print render($page['sidebar_first']) ?>
			<?php print render($page['sidebar_last']) ?>			
		</div>
		<span class="widget-bottom"></span>
	</div>

</div>		
	
	
	
<div id="footer">

			<div class="footer-frame-top"></div>	
			<div class="footer-content"><?php print render($page['footer']) ?></div>
			<div class="post-footer"></div>
			<span class="footer-frame-bottom"></span>
			
			<span class="footer-link"><?php //print $footer_message ?></span>
			
		</div>
	</div>