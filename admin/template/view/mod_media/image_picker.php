<?php
if (!defined('IN_CONTEXT')) die('access violation error!');

$cols = 4;
?>
<script type="text/javascript" language="javascript">
<!--
function do_pick(img_path) {
	var rel_path = "upload/image/" + img_path;
	var clean_path = rel_path.replace(/\/\//, "/");
	var preview_img = new Image();
	preview_img.src = clean_path;
	preview_img.onload = function() {
	    resizeImg(this);
	};
	$("#full_preview").empty();
	$("#full_preview").append(preview_img);
    var pick_path = document.getElementById("pick_path");
    pick_path.innerHTML = clean_path;
    var parent_doc = window.parent.document;
    var parent_image_id = "<?php echo Html::escSpecialChars($imgid); ?>";
    parent_doc.getElementById(parent_image_id).value = clean_path;
    
    //resizeImg(preview_img);
}

function closeme() {
    window.parent.tb_remove();
}
//-->
</script>
<div class="picker_body">
	<a name="preview_pos"></a>
	<table cellspacing="1" class="list_table">
		<thead>
			<tr>
				<td colspan="2">
					<table cellspacing="0" class="wrap_table">
						<tbody>
							<tr>
								<td><?php include_once(dirname(__FILE__).'/_path_switch.php'); ?></td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr class="row_style_0">
				<td class="right" width="100"><?php _e('Current Pick'); ?>: </td>
				<td class="left"><div id="full_preview"></div><!-- img id="full_preview" src="javascript:void(0);" / --></td>
			</tr>
			<tr class="row_style_0">
				<td class="right"><?php _e('Path'); ?>: </td>
				<td class="left"><span id="pick_path"></span></td>
			</tr>
			<tr class="row_style_0">
				<td class="right" width="100"></td>
				<td class="left">
					<?php
					echo Html::input('button', 'closeme', __('Done'), 'onclick="closeme();return false;"')
					?>
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="2">
				<?php
				$n_img = sizeof($files);
				if ($n_img > 0){
				?>
					<table class="media_grid" cellspacing="1">
						<?php
						for ($i = 0; $i < $n_img; $i++) {
				        	if ($i % $cols == 0) {
				        	    echo '<tr>';
				        	}
				    	?>
				            <td width="<?php echo intval(100 / $cols); ?>%">
				            	<img border="0" src="upload/image/<?php echo $curr_entry.$files[$i];?>" class="media_thumb" />
				            	<br />
				            	<span class="small">
				                <a href="#preview_pos" onclick="do_pick('<?php echo $curr_entry.$files[$i];?>');totop();return false;" alt="<?php echo $files[$i]; ?>" title="<?php _e('Pick It'); ?>"><?php _e('Pick It'); ?></a>
				            	</span>
				            </td>
				        <?php
				        	if (($i % $cols) == ($cols - 1)) {
				        	    echo '</tr>';
				        	}
						}
				        if ($i % $cols != 0) {
					        for ($j = 0; $j < ($cols - $i); $j++) {
					            echo '<td width="'.intval(100 / $cols).'%">&nbsp;</td>';
					        }
					        echo '</tr>';
				        }
						?>
					</table>
				<?php } ?>
				</td>
			</tr>
		</tbody>
	</table>
    <div class="space"></div>
    <?php
    include_once(P_TPL.'/common/pager.php');
    ?>
</div>
