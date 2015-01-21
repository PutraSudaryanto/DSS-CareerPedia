<?php
	/* @var $this SearchController */
	/* @var $model CareerpediaPositions */

	$this->breadcrumbs=array(
		'Careerpedia Positions'=>array('manage'),
		$model->name,
	);
?>

<div class="block">	
	<h3>What they do</h3>
	<?php echo $model->task;?>
	<div class="jobdesc">
		<div class="tr noborder">
			<div class="td"><br/></div>
			<div class="td center"><br/>&nbsp;</div>
			<div class="td"><br/></div>
		</div>	
		<div class="tr noborder">
			<div class="td">
				<h3>Jobdesc</h3>
				<?php echo $model->job_desc;?><br/>
			</div>
			<div class="td center"><br/>&nbsp;</div>
			<div class="td">
				<h3>Education</h3>
				<?php if($education != null) {
					echo '<ol>';
					foreach($education as $val) {?>
						<li>
							<?php echo $val->major->name;?></a> (<?php echo $val->degree;?>)
							<?php echo $val->spesification != '' ? '<br/>Spesialisasi: <span>'.$val->spesification.'</span>' : ''?>
						</li>
				<?php }
					echo '</ol>';
				}?><br/>
			</div>
		</div>	
		<div class="tr noborder">
			<div class="td"></div>
			<div class="td center">&nbsp;</div>
			<div class="td"></div>
		</div>	
		<div class="tr">
			<div class="td">
				<h3>Skills</h3>
				<div><?php echo $model->skills;?></div>
			</div>
			<div class="td center">&nbsp;</div>
			<div class="td">
				<h3>Knowledge</h3>
				<div><?php echo $model->knowledge;?></div>
			</div>
		</div>	
		<div class="tr noborder">
			<div class="td"></div>
			<div class="td center">&nbsp;</div>
			<div class="td"></div>
		</div>	
		<div class="tr">
			<div class="td">
				<h3>Personality</h3>
				<div><?php echo $model->personality;?></div>
			</div>
			<div class="td center">&nbsp;</div>
			<div class="td">
				<h3>Average Salary</h3>
				<div><?php echo $model->average_salary;?></div>
			</div>
		</div>
	</div>
</div>
