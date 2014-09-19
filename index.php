<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DoomBird: A little bird told me the world is about to end.</title>
	<!-- css -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/handlebars-v1.3.0.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<!-- icons -->
	<link rel="apple-touch-icon" href="assets/apple-touch-icon-iphone.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/touch-icon-ipad.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/touch-icon-ipad-retina.png">
</head>
<body>
	<header>
		<div class="row">
			<img class="img-responsive hidden-sm hidden-xs" src="assets/doombird_header.png" 
			alt="Doom Bird: A little bird told me that the world is about to end.">
			<img class="img-responsive hidden-lg hidden-md" src="assets/doombird_header--small.png" 
			alt="Doom Bird: A little bird told me that the world is about to end.">
		</div>
	</header>
	<div class="container-fluid">
	<script type="text/x-handlebars-template" id="tweet-modal">
	{{#each statuses}}		
		<div class="modal fade" id="{{id}}" tabindex="-1" role="dialog" aria-labelledby="{{id_string}}"
		aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header clearfix">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<div class="col-md-2">
						<img class="img-responsive" src="{{user.profile_image_url}}" alt="">
						</div>
						<div class="col-md-8">
						<span class="userName">{{user.name}}    </span>
						<span class="screenName">    @{{user.screen_name}}</span>
						</div>
					</div>
					<div class="modal-body">
					
						<p class="tweettext">{{text}}</p>
						{{#each entities.media}}
						<img src={{media_url}} alt="twitter picture" class="tweetPic img-resposive">
						<a href={{expanded_url}}>Original tweet</a>
						{{/each}}

					</div>
					<div class="modal-body entities">
					<label for="hashtags">Hashtags:</label>
					<p id="hashtags">{{#each entities.hashtags}}
					#{{text}}{{/each}}</p>
					<hr>
					<label for="externUrl">Links:</label>
					<ul id="externUrl">
					{{#each entities.urls}}
					<li><a href={{expanded_url}}>{{display_url}}</a></li> 
					{{/each}}
					</div>
					<div class="modal-footer">
					<div class="btn-group" data-toggle="buttons">
					  <label class="btn btn-primary nothing">
					    <input type="checkbox"> Probably nothing
					  </label>
					  <label class="btn btn-primary doom">
					    <input type="checkbox"> We are doomed
					  </label>
					</div>
					 	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	{{/each}}
	</script>
</div>
</body>
</html>