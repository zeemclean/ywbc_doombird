$(document).ready(function(){
	getTweets();

});

function getTweets(){
	$.getJSON('getTweets_1-1.php', function(feed){
			console.log(feed.statuses);
			
			$.each(feed.statuses, function(i, tweet){

				var timeSinceTweet = parseTwitterDate(tweet.created_at);
				console.log(timeSinceTweet);
				var tweetEgg = "<a class=\"egglink "+timeSinceTweet+
                "MinsOld\"  data-toggle=\"modal\" href=\"#"+tweet.id+"\">" +
				"<img src=\"assets/grey_egg.png\" data-toggle=\"tooltip\"" +
                "data-placement=\"top\" title=\"@"+tweet.user.screen_name+"\" class=\"eggicon\" id=\"eggicon_"+i+"\"></button>";
				$('.container-fluid').append(tweetEgg);
				


			})
			var source = $('#tweet-modal').html();
			var template = Handlebars.compile(source);

			$('body').append(template(feed));
			// var timeValue = new Date(Date.parse(feed.statuses.created_at));
			// console.log(timeValue);
	});
}

function parseTwitterDate(tdate) {
    var system_date = new Date(Date.parse(tdate));
    var user_date = new Date();
    if (K.ie) {
        system_date = Date.parse(tdate.replace(/( \+)/, ' UTC$1'))
    }
    var diff = Math.floor((user_date - system_date) / 1000);
    if (diff <= 600) {return 10;}
    if (diff <= 1200) {return 20;}
    if (diff <= 1800) {return 30;}
    if (diff <= 2400) {return 40;}
    if (diff <= 3000) {return 50;}
    if (diff <= 3600) {return 60;}
    if (diff <= 4200) {return 70;}
    if (diff <= 4800) {return 80;}
    if (diff <= 5400) {return 90;}
    if (diff <= 6000) {return 100;}
}

// from http://widgets.twimg.com/j/1/widget.js
var K = function () {
    var a = navigator.userAgent;
    return {
        ie: a.match(/MSIE\s([^;]*)/)
    }
}();