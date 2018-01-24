function onSignIn(googleUser) {

    // Useful data for your client-side scripts:
    var profile = googleUser.getBasicProfile();
    // console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    // console.log('Full Name: ' + profile.getName());
    var forminputs = document.forms["authenticate"];
    forminputs["firstname"].value = profile.getGivenName();
    forminputs["lastname"].value = profile.getFamilyName();
    forminputs["email"].value = profile.getEmail();
    forminputs["profile_pic"].value = profile.getImageUrl();

    // The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;
    forminputs["id_token"].value = id_token;
    forminputs["team"].value = profile.getEmail().indexOf("pascack.org") != -1 ? 1676 : null;
    forminputs["acl"].value = profile.getEmail().indexOf("pascack.org") != -1 ? 1 : 2;

    document.getElementById('authenticate').submit();

}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
}