<?php include_once('header.php'); ?>
    <div class="container">
    	<div class="row">
			<h1>Development Websites</h1>
	        <table class="dev-sites table table-hover tablesorter">
		        <thead>
		        <tr>
			        <th>Name</th>
			        <th style="text-align:right;">Resources</th>
		        </tr>
		        </thead>
		        <tbody>
            	<?php
					include( dirname(__FILE__) . '/classes/gstring.php' );
					include( dirname(__FILE__) . '/classes/class-ds-utils.php' );
					$dashPath = '';
					foreach( $ds_runtime->preferences->sites as $domain => $detail ):

						// Locate dashboard page
						if ( is_dir( $detail->sitePath ) ){
							if ( file_exists( $detail->sitePath . '/wp-admin/admin-header.php' ) ) {
								$dashPath = '/wp-admin/';
							} else {
								$dashPath = DS_Utils::find_first_file( $detail->sitePath, 'admin-header.php' );
								if ( FALSE !== strpos( $dashPath, 'wp-admin' ) ){
									$dashPath = new GString( $dashPath );
									$dashPath = (string) $dashPath->delLeftMost( $detail->sitePath )->delRightMost( 'admin-header.php' );
								}
							}
						}
				?>
				<tr class="master" id="<?php echo str_replace(".", "-", $domain); ?>">
					<td>
                    	<a href="http://<?php echo $domain; ?>" target="_blank" title="<?php echo $detail->sitePath; ?>"><?php echo $domain; ?></a>
						<?php $ds_runtime->do_action( "list_domain", $domain ); ?>
                    </td>
					<td align="right">
						<div class="btn-group" role="group" aria-label="...">
							<?php $ds_runtime->do_action( "domain_button_group", $domain ); ?>
  							<a href="http://<?php echo $domain; ?>" class="btn btn-primary" target="_blank">
                            	Visit Website
                            </a>
  							<a href="http://<?php echo $domain . $dashPath; ?>" class="btn btn-success" target="_blank">
                            	Dashboard
                            </a>
                            <a href="http://localhost/phpmyadmin/db_structure.php?db=<?php echo $detail->dbName; ?>" class="btn btn-warning" target="_blank">
                            	Database
                            </a>
						</div>
					</td>
				</tr>
                <?php
					if ( property_exists( $detail, 'aliases' ) ):
					$aliases = $detail->aliases;
					foreach( $aliases as $subdomain ):
				?>
                    <tr class="alias" id="<?php echo str_replace(".", "-", $subdomain); ?>">
                        <td>
	                        &nbsp; &nbsp;&nbsp; <a href="http://<?php echo $subdomain; ?>" target="_blank"><?php echo $subdomain; ?></a>
	                        <?php $ds_runtime->do_action( "list_subdomain", $subdomain ); ?>
                        </td>
                        <td align="right">
                            <div class="btn-group" role="group" aria-label="...">
	                            <?php $ds_runtime->do_action( "subdomain_button_group", $subdomain ); ?>
                                <a href="http://<?php echo $subdomain; ?>" class="btn btn-primary" target="_blank">Visit Alias</a>
                                <a href="http://<?php echo $subdomain . $dashPath; ?>" class="btn btn-success" target="_blank">Dashboard</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                <?php endforeach; // foreach( $sites as $domain => $detail ) ?>
		        </tbody>
			</table>
		</div> <!-- /row -->
    </div> <!-- /container -->
<?php include_once("footer.php"); ?>
