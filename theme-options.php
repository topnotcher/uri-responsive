	<div class="wrap">  
		<?php screen_icon('themes'); ?> <h2>Network Alert Messages</h2>  
		
		<form method="POST" action="">  
			<table class="form-table">  
				<tr valign="top">  
					<td width="15%">  
						<label for="<?php echo $options["alert_general"]["id"]?>">  
							<?php echo $options["alert_general"]["name"]?>
						</label>  
					</td>  
					<td width="85%">  
						<input type="<?php echo $options["alert_general"]["type"]?>" 
							name="<?php echo $options["alert_general"]["id"]?>" 
							style="width:700px;" value="<?php echo $alert_general;?>"/> <br />
						 <?php echo $options["alert_general"]["desc"]?>
					</td>  
				</tr>
				<tr valign="top">  
					<td width="15%">  
						<label for="<?php echo $options["alert_general_enable"]["id"]?>">  
							<?php echo $options["alert_general_enable"]["name"]?>
						</label>  
					</td>  
					<td width="85%">  
						<input type="checkbox" name="<?php echo $options["alert_general_enable"]["id"]?>" 
							<?php if($alert_general_enable) echo 'checked="yes"';?>/>
						 <?php echo $options["alert_general_enable"]["desc"]?>
						 <br /><br />
					</td> 
				</tr>
				
				<tr valign="top">
					<td width="15%">  
						<label for="<?php echo $options["alert_weather"]["id"]?>">  
							<?php echo $options["alert_weather"]["name"]?>
						</label>	
					</td>  
					<td width="85%">  
						<input type="<?php echo $options["alert_weather"]["type"]?>" 
							name="<?php echo $options["alert_weather"]["id"]?>" 
							style="width:700px;" value="<?php echo $alert_weather;?>"/> <br />
						 <?php echo $options["alert_weather"]["desc"]?>
					</td>  
				</tr>
				 <tr valign="top">  
					<td width="15%">  
						<label for="<?php echo $options["alert_weather_enable"]["id"]?>">  
							<?php echo $options["alert_weather_enable"]["name"]?>
						</label> 
					</td>  
					<td width="85%">  
						<input type="checkbox" name="<?php echo $options["alert_weather_enable"]["id"]?>" 
							<?php if($alert_weather_enable) echo 'checked="yes"';?>/>
						 <?php echo $options["alert_weather_enable"]["desc"]?>
					</td>  
				</tr>
			</table>
			 <p class="submit">
				<input name="save" type="submit" value="Save changes" />
				<input type="hidden" name="update_settings" value="save" />
			</p>
		</form> 
		</div>


