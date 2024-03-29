<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Reports - Base Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link href="./css/bootstrap-responsive.min.css" rel="stylesheet" />
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="./css/font-awesome.css" rel="stylesheet" />
    
    <link href="./css/base-admin.css" rel="stylesheet" />
    <link href="./css/base-admin-responsive.css" rel="stylesheet" />
    
    <link href="./css/pages/reports.css" rel="stylesheet" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="./">
				Base Admin				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Settings
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Account Settings</a></li>
							<li><a href="javascript:;">Privacy Settings</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
					</li>
			
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							Rod Howard
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">My Profile</a></li>
							<li><a href="javascript:;">My Groups</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Logout</a></li>
						</ul>						
					</li>
				</ul>
			
				<form class="navbar-search pull-right" />
					<input type="text" class="search-query" placeholder="Search" />
				</form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">

			<ul class="mainnav">
			
				<li>
					<a href="./">
						<i class="icon-home"></i>
						<span>Home</span>
					</a>	    				
				</li>
				
				<li>
					<a href="./faq.html">
						<i class="icon-pushpin"></i>
						<span>FAQ</span>
					</a>	    				
				</li>
				
				<li>					
					<a href="./pricing.html" class="dropdown-toggle">
						<i class="icon-th-large"></i>
						<span>Pricing Plans</span>
					</a>	  				
				</li>
				
				<li class="active">
					<a href="./reports.html">
						<i class="icon-bar-chart"></i>
						<span>Reports</span>
					</a>    				
				</li>
				
				<li>					
					<a href="./guidely.html">
						<i class="icon-facetime-video"></i>
						<span>Guided Tour</span>
					</a>  									
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-share-alt"></i>
						<span>More Pages</span>
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
						<li><a href="./charts.html">Charts</a></li>
						<li><a href="./account.html">User Account</a></li>
						<li class="divider"></li>
						<li><a href="./login.html">Login</a></li>
						<li><a href="./signup.html">Signup</a></li>
						<li><a href="./error.html">Error</a></li>
					</ul>    				
				</li>
			
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    

    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	    	
	      <div class="row">
	      
	      	<div class="span12">
	      		
	      		<div class="widget big-stats-container">
	      			
	      			<div class="widget-content">
	      				
			      		<div id="big_stats" class="cf">
							<div class="stat">								
								<h4>Pending Sales Today</h4>
								<span class="value">12</span>								
							</div> <!-- .stat -->
							
							<div class="stat">								
								<h4>Completed Sales Today</h4>
								<span class="value">23</span>								
							</div> <!-- .stat -->
							
							<div class="stat">								
								<h4>Returned Items Today</h4>
								<span class="value">2</span>								
							</div> <!-- .stat -->
							
							<div class="stat">								
								<h4>Something Else</h4>
								<span class="value">13</span>								
							</div> <!-- .stat -->
						</div>
					
					</div> <!-- /widget-content -->
					
				</div> <!-- /widget -->
	      		
	      	</div> <!-- /span12 -->	
	      	
	  	  </div> <!-- /row -->
	
	      <div class="row">
	      	
	      	<div class="span6">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Quick Stats</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div id="pie-chart" class="chart-holder"></div>
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
				
	      		
	      		
	      		
		    </div> <!-- /span6 -->
	      	
	      	
	      	<div class="span6">
	      		
	      		<div class="widget">
							
					<div class="widget-header">
						<i class="icon-list-alt"></i>
						<h3>Recent News</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div id="bar-chart" class="chart-holder"></div>
						
					</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->
									
		      </div> <!-- /span6 -->
	      	
	      </div> <!-- /row -->
	      
	      
	      
	      
			<div class="row">
	      	
	      		<div class="span4">
	      		
	      			<div class="widget widget-table">
						
						<div class="widget-header">
							<span class="icon-list-alt"></span>
							<h3>Top Referrers</h3>
						</div> <!-- .widget-header -->
						
						<div class="widget-content">
							<table class="table table-bordered table-striped">
								
								<thead><tr>								
									<th>Referrer</th>
									<th>Uniques</th>								
								</tr></thead>
						
							<tbody><tr>
								<td class="description"><a href="http://google.com">http://google.com</a></td>
								<td class="value"><span>1123</span></td>
							</tr>
							<tr>
								<td class="description"><a href="http://yahoo.com">http://yahoo.com</a></td>
								<td class="value"><span>927</span></td>
							</tr>
							<tr>
								<td class="description"><a href="http://themeforest.net">http://themeforest.net</a></td>
								<td class="value"><span>834</span></td>
							</tr>
							<tr>
								<td class="description"><a href="http://codecanyon.net">codecanyon.net</a></td>
								<td class="value"><span>625</span></td>
							</tr>
							<tr>
								<td class="description"><a href="http://graphicriver.net">http://graphicriver.net</a></td>
								<td class="value"><span>593</span></td>
							</tr>
							
							<tr>
								<td class="description"><a href="http://bing.com">http://bing.com</a></td>
								<td class="value"><span>324</span></td>
							</tr>
							
							
						</tbody></table>
							
						</div> <!-- .widget-content -->
						
					</div> <!-- /widget -->	
	      			
	  			</div> <!-- /span4 -->
	  			
	  			
	  			
	  			<div class="span4">
	  				
	  				<div class="widget widget-table">
						
						<div class="widget-header">
							<span class="icon-file"></span>
							<h3>Most Visited Pages</h3>
						</div> <!-- .widget-header -->
						
						<div class="widget-content">
							<table class="table table-bordered table-striped">
								
								<thead><tr>								
									<th>Page</th>
									<th>Visits</th>								
								</tr></thead>
						
							<tbody><tr>
								<td class="description"><a href="javascript:;">Homepage</a></td>
								<td class="value"><span>1123</span></td>
							</tr>
							<tr>
								<td class="description"><a href="javascript:;">Portfolio</a></td>
								<td class="value"><span>927</span></td>
							</tr>
							<tr>
								<td class="description"><a href="javascript:;">Services</a></td>
								<td class="value"><span>834</span></td>
							</tr>
							<tr>
								<td class="description"><a href="javascript:;">Contact Us</a></td>
								<td class="value"><span>625</span></td>
							</tr>
							<tr>
								<td class="description"><a href="javascript:;">Testimonials</a></td>
								<td class="value"><span>593</span></td>
							</tr>
							
							<tr>
								<td class="description"><a href="javascript:;">Signup</a></td>
								<td class="value"><span>456</span></td>
							</tr>
							
							
						</tbody></table>
							
						</div> <!-- .widget-content -->
						
					</div>
	  				
	  			</div> <!-- /span4 -->
	  			
	  			
	  			
	  			<div class="span4">
	  				
	  				<div class="widget widget-table">
						
						<div class="widget-header">
							<span class="icon-external-link"></span>
							<h3>Browsers</h3>
						</div> <!-- .widget-header -->
						
						<div class="widget-content">
							<table class="table table-bordered table-striped">
								
								<thead><tr>								
									<th>Browser</th>
									<th>Visits</th>								
								</tr></thead>
						
							<tbody><tr>
								<td class="description">Firefox</td>
								<td class="value"><span>1123</span></td>
							</tr>
							<tr>
								<td class="description">Chrome</td>
								<td class="value"><span>927</span></td>
							</tr>
							<tr>
								<td class="description">Internet Explorer</td>
								<td class="value"><span>834</span></td>
							</tr>
							<tr>
								<td class="description">Safari</td>
								<td class="value"><span>625</span></td>
							</tr>
							<tr>
								<td class="description">Opera</td>
								<td class="value"><span>593</span></td>
							</tr>
							
							<tr>
								<td class="description">Netscape</td>
								<td class="value"><span>123</span></td>
							</tr>
							
							
						</tbody></table>
							
						</div> <!-- .widget-content -->
						
					</div>
	  				
	  			</div> <!-- /span4 -->
	      	
			</div> <!-- /row -->
	      
	      
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    

    

<div class="extra">

	<div class="extra-inner">

		<div class="container">

			<div class="row">
				
    			<div class="span3">
    				
    				<h4>About</h4>
    				
    				<ul>
    					<li><a href="javascript:;">About Us</a></li>
    					<li><a href="javascript:;">Twitter</a></li>
    					<li><a href="javascript:;">Facebook</a></li>
    					<li><a href="javascript:;">Google+</a></li>
    				</ul>
    				
    			</div> <!-- /span3 -->
    			
    			<div class="span3">
    				
    				<h4>Support</h4>
    				
    				<ul>
    					<li><a href="javascript:;">Frequently Asked Questions</a></li>
    					<li><a href="javascript:;">Ask a Question</a></li>
    					<li><a href="javascript:;">Video Tutorial</a></li>
    					<li><a href="javascript:;">Feedback</a></li>
    				</ul>
    				
    			</div> <!-- /span3 -->
    			
    			<div class="span3">
    				
    				<h4>Legal</h4>
    				
    				<ul>
    					<li><a href="javascript:;">License</a></li>
    					<li><a href="javascript:;">Terms of Use</a></li>
    					<li><a href="javascript:;">Privacy Policy</a></li>
    					<li><a href="javascript:;">Security</a></li>
    				</ul>
    				
    			</div> <!-- /span3 -->
    			
    			<div class="span3">
    				
    				<h4>Settings</h4>
    				
    				<ul>
    					<li><a href="javascript:;">Consectetur adipisicing</a></li>
    					<li><a href="javascript:;">Eiusmod tempor </a></li>
    					<li><a href="javascript:;">Fugiat nulla pariatur</a></li>
    					<li><a href="javascript:;">Officia deserunt</a></li>
    				</ul>
    				
    			</div> <!-- /span3 -->    			
    		</div> <!-- /row -->

		</div> <!-- /container -->

	</div> <!-- /extra-inner -->

</div> <!-- /extra -->


    
    
<div class="footer">
	
	<div class="footer-inner">
		
		<div class="container">
			
			<div class="row">
				
    			<div class="span12">
    				&copy; 2012 <a href="http://bootstrapadmin.com">Base Admin</a>.
    			</div> <!-- /span12 -->
    			
    		</div> <!-- /row -->
    		
		</div> <!-- /container -->
		
	</div> <!-- /footer-inner -->
	
</div> <!-- /footer -->
    

<script src="./js/jquery-1.7.2.min.js"></script>
<script src="./js/excanvas.min.js"></script>
<script src="./js/jquery.flot.js"></script>
<script src="./js/jquery.flot.pie.js"></script>
<script src="./js/jquery.flot.orderBars.js"></script>
<script src="./js/jquery.flot.resize.js"></script>
	
<script src="./js/bootstrap.js"></script>
<script src="./js/base.js"></script>

<script src="./js/charts/pie.js"></script>
<script src="./js/charts/bar.js"></script>


  </body>
</html>
