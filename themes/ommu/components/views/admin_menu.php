<?php
	if(($module == null && in_array($controller, array('admin','comment','reply','author'))) || ($module != null && $module == 'personal' && !isset($_GET['user'])) || ($module != null && in_array($module, array('report'))) || (in_array($module, array('support')) && (!in_array($currentAction, array('mail/setting')) || !in_array($controller, array('contact','contactcategory'))))) {
		$dashboard = 'class="active"';
		$title = 'Mainmenu';
		
	} elseif($module == null && in_array($controller, array('page','translate','globaltag','contentmenu','pluginmenu','anotherdetail'))) {
		$pages = 'class="active"';
		$title = 'Mainmenu';
		
	} elseif($module != null && $module == 'users') {
		$member = 'class="active"';
		$title = 'Mainmenu';
		
	} elseif($module == null && in_array($controller, array('module','settings','language','phrase','theme','locale','pluginphrase','meta')) || ($module != null && in_array($module, array('support')) && (in_array($currentAction, array('mail/setting')) || in_array($controller, array('contact','contactcategory'))))) {
		$settings = 'class="active"';
		$title = 'Mainmenu';
	}
?>

<?php //begin.Main Menu ?>
<div class="mainmenu">
	<ul>
		<li <?php echo $dashboard; ?>><a class="dashboard" href="<?php echo Yii::app()->createUrl('admin/index');?>" title="<?php echo Phrase::trans(132,0);?>"><?php echo Phrase::trans(132,0);?></a></li>
		
		<?php 
			$plugin = OmmuPlugins::getPlugin(1);
			if($plugin != null) {
				foreach($plugin as $key => $val) {
					$menu = OmmuPluginMenu::model()->findAll(array(
						//'select' => 'name, module, url, dialog',
						'condition' => 'module = :module AND enabled = :enabled',
						'params' => array(
							':module' => $val->folder,
							':enabled' => 1,
						),
						'order'=> 'orders ASC',
					));
					if($menu != null) {
						//attr url					
						$arrAttrParams = array();
						if($menu[0]->attr != '-') {
							$arrAttr = explode(',', $menu[0]->attr);
							if(count($arrAttr) > 0) {
								foreach($arrAttr as $row) {
									$part = explode('=', $row);
									if(strpos($part[1], '$_GET') !== false) {								
										$list = explode('*', $part[1]);
										if(count($list) == 2)
											$arrAttrParams[$part[0]] = $_GET[$list[1]];
										elseif(count($list) == 3)
											$arrAttrParams[$part[0]] = $_GET[$list[1]][$list[2]];
										elseif(count($list) == 4)
											$arrAttrParams[$part[0]] = $_GET[$list[1]][$list[2]][$list[3]];
										elseif(count($list) == 5)
											$arrAttrParams[$part[0]] = $_GET[$list[1]][$list[2]][$list[3]][$list[4]];
										
									} else {
										$arrAttrParams[$part[0]] = $part[1];
									}
								}
							}
						}

						$url = Yii::app()->createUrl($menu[0]->module.'/'.$menu[0]->url, $arrAttrParams);
						$titleApps = $val->name;
						if($val->folder == $module) {
							$class = 'class="active"';
							$title = $val->name;
						} else {
							$class = '';
						}

						$item = '<li '.$class.'>';
						$item .= '<a href="'.$url.'" title="'.$titleApps.'">'.$titleApps.'</a>';
						$item .= '</li>';
						echo $item;
					}
				}
			}
		?>
		<li <?php echo $member; ?>><a class="member" href="<?php echo $setting->site_type == 1 ? Yii::app()->createUrl('users/member/manage') : Yii::app()->createUrl('users/admin/manage') ?>" title="<?php echo Phrase::trans(16002,1);?>"><?php echo Phrase::trans(16002,1);?></a></li>
		<li <?php echo $settings; ?>><a class="setting" href="<?php echo Yii::app()->createUrl('settings/general');?>" title="<?php echo Phrase::trans(133,0);?>"><?php echo Phrase::trans(133,0);?></a></li>
	</ul>
</div>
<?php //end.Main Menu ?>

<?php //begin.Submenu ?>
<div class="submenu">
	<h3><?php echo $title;?></h3>
	<ul>
	<?php //Begin.Dashboard ?>
	<?php if(($module == null && in_array($controller, array('admin','comment','reply','author'))) || ($module != null && $module == 'personal' && !isset($_GET['user'])) || ($module != null && in_array($module, array('report'))) || (in_array($module, array('support')) && (!in_array($currentAction, array('mail/setting')) || !in_array($controller, array('contact','contactcategory'))))) {?>
		<li><a href="<?php echo Yii::app()->createUrl('admin/dashboard');?>" title="<?php echo Phrase::trans(330,0);?>"><?php echo Phrase::trans(330,0);?></a></li>
		<?php 
			$core = OmmuPlugins::getPlugin(2);
			if($core != null) {
				foreach($core as $key => $val) {
					$menu = OmmuPluginMenu::model()->findAll(array(
						//'select' => 'name, module, url, dialog',
						'condition' => 'module = :module AND enabled = :enabled',
						'params' => array(
							':module' => $val->folder,
							':enabled' => 1,
						),
						'order'=> 'orders ASC',
					));
					if($menu != null) {
						if(count($menu) == 1) {
							$url = Yii::app()->createUrl($menu[0]->module.'/'.$menu[0]->url);
							$titleApps = $val->name;
						} else {
							if($val->folder == $module) {
								$class = 'class="selected"';
								$url = 'javascript:void(0);';
							} else {
								$class = '';
								$url = Yii::app()->createUrl($menu[0]->module.'/'.$menu[0]->url);
							}
							$titleApps = $val->name;
						}

						$item = '<li '.$class.'>';
						$item .= '<a href="'.$url.'" title="'.$titleApps.'">'.$titleApps.'</a>';
						if(count($menu) > 1) {
							$item .= '<ul>';
							foreach($menu as $key => $data) {
								$aClass = $data->dialog == 1 ? 'id="default"' : '';
								$icons = $data->icon != '-' ? $data->icon : 'C';

								$item .= '<li><a '.$aClass.' href="'.Yii::app()->createUrl($data->module.'/'.$data->url).'" title="'.Phrase::trans($data->name, 2).'"><span class="icons">'.$icons.'</span>'.Phrase::trans($data->name, 2).'</a></li>';
							}	
							$item .= '</ul>';
						}
						$item .= '</li>';
						echo $item;
					}
				}
			}
		?>
		<li><a href="<?php echo Yii::app()->createUrl('users/admin/edit')?>" title="<?php echo Phrase::trans(16222,1).': '.Yii::app()->user->displayname;?>"><?php echo Phrase::trans(16222,1);?></a></li>
		<li><a href="<?php echo Yii::app()->createUrl('users/admin/password')?>" title="<?php echo Phrase::trans(16122,1).': '.Yii::app()->user->displayname;?>"><?php echo Phrase::trans(16122,1);?></a></li>

	<?php //Begin.Content ?>
	<?php } elseif($module == null && in_array($controller, array('page','translate','globaltag','contentmenu','pluginmenu','anotherdetail'))) {?>
		<li><a <?php echo $controller == 'page' ? 'class="active"' : '' ?> href="<?php echo Yii::app()->createUrl('page/manage');?>" title="<?php echo Phrase::trans(134,0);?>"><?php echo Phrase::trans(134,0);?></a></li>

	<?php //Begin.Module ?>
	<?php } elseif($module != null && !in_array($module, array('users','report','support'))) {?>
		<?php 
		$menu = OmmuPluginMenu::model()->findAll(array(
			//'select' => 'name, module, url, dialog',
			'condition' => 'module = :module AND enabled = :enabled',
			'params' => array(
				':module' => $module,
				':enabled' => 1,
			),
			'order'=> 'orders ASC',
		));
		if($menu != null) {
			if(count($menu) > 1) {
				foreach($menu as $key => $data) {
					$aClass = $data->dialog == 1 ? 'id="default"' : '';
					$icons = $data->icon != '-' ? $data->icon : 'C';

					//attr url					
					$arrAttrParams = array();
					if($data->attr != '-') {
						$arrAttr = explode(',', $data->attr);
						if(count($arrAttr) > 0) {
							foreach($arrAttr as $row) {
								$part = explode('=', $row);
								if(strpos($part[1], '$_GET') !== false) {								
									$list = explode('*', $part[1]);
									if(count($list) == 2)
										$arrAttrParams[$part[0]] = $_GET[$list[1]];
									elseif(count($list) == 3)
										$arrAttrParams[$part[0]] = $_GET[$list[1]][$list[2]];
									elseif(count($list) == 4)
										$arrAttrParams[$part[0]] = $_GET[$list[1]][$list[2]][$list[3]];
									elseif(count($list) == 5)
										$arrAttrParams[$part[0]] = $_GET[$list[1]][$list[2]][$list[3]][$list[4]];
									
								} else {
									$arrAttrParams[$part[0]] = $part[1];
								}
							}
						}
					}
					echo '<li><a '.$aClass.' href="'.Yii::app()->createUrl($data->module.'/'.$data->url, $arrAttrParams).'" title="'.Phrase::trans($data->name, 2).'">'.Phrase::trans($data->name, 2).'</a></li>';
				}
			}
		}
		?>

	<?php //Begin.Users ?>
	<?php } elseif($module != null && $module == 'users') {?>
		<?php if($setting->site_type == 1) {?>
			<li><a <?php echo $controller == 'member' ? 'class="active"' : '' ?> href="<?php echo Yii::app()->createUrl('users/member/manage');?>" title="<?php echo Phrase::trans(16001,1);?>"><?php echo Phrase::trans(16001,1);?></a></li>
		<?php }?>
		<li><a <?php echo $controller == 'admin' ? 'class="active"' : '' ?> href="<?php echo Yii::app()->createUrl('users/admin/manage');?>" title="<?php echo Phrase::trans(16003,1);?>"><?php echo Phrase::trans(16003,1);?></a></li>

	<?php //Begin.Setting ?>
	<?php } elseif($module == null && in_array($controller, array('module','settings','language','phrase','theme','locale','pluginphrase','meta')) || ($module != null && in_array($module, array('support')) && (in_array($currentAction, array('mail/setting')) || in_array($controller, array('contact','contactcategory'))))) {?>
		<?php if($setting->site_admin == 1) {?>
			<li><a <?php echo $controller == 'module' ? 'class="active"' : '' ?> href="<?php echo Yii::app()->createUrl('module/manage');?>" title="<?php echo Phrase::trans(135,0);?>"><?php echo Phrase::trans(135,0);?></a></li>
		<?php }?>
		<li><a <?php echo $currentAction == 'settings/general' ? 'class="active"' : '' ?> href="<?php echo Yii::app()->createUrl('settings/general');?>" title="<?php echo Phrase::trans(94,0);?>"><?php echo Phrase::trans(94,0);?></a></li>

	<?php }?>
	</ul>
</div>
<?php //end.Submenu ?>