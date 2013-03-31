window.fbAsyncInit = function() {
    FB.init({
        appId: '143633382480206', // App ID
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
        FB.login(function(response) {
            if (response.authResponse) {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function(response) {
                    console.log('Good to see you, ' + response.name + '.');
                });
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        },{scope:'email'});
    })
})