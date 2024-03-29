window.fbAsyncInit = function() {
    FB.init({
        appId: '602999063061173', // App ID
        channelUrl: '//www.ramifood.com/channel.html', // Channel File
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true,  // parse XFBML
        Oauth:true
    });
    FB.api('/me', function(user) {
        if (user) {
            var image = document.getElementById('image');
            image.src = 'https://graph.facebook.com/' + user.id + '/picture';
            var name = document.getElementById('name');
            name.innerHTML = user.name
        }
    });
};
// Load the SDK Asynchronously
(function(d) {
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement('script');
    js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/fr_FR/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));


$(function() {

    $('.fbconnect').click(function() {
        url = $(this).attr('href');
        FB.login(function(response) {
            if (response.authResponse) {
                window.location = url;
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        },{scope:'email, user_birthday'});
        
        return false;
    });
});