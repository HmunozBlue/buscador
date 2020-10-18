
function wsRefreshToken(){
    var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
myHeaders.append("Cookie", "__cfduid=dcf24405969790c3cc9c897bd174bd6c01602002626");

var urlencoded = new URLSearchParams();
urlencoded.append("client_id", "53a14205c80b1de3");
urlencoded.append("client_secret", "97b8063f23cfd74935c4f38bead307febc65fa724db93560e42f187ccb238560");
urlencoded.append("grant_type", "client_credentials");
urlencoded.append("scope", "develop");
urlencoded.append("refresh_token", "refresh_token");

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: urlencoded
};

fetch("https://frontapp.mibluemedical.com:8443/oauth/v2/token", requestOptions)
  .then(response => response.json())
  .then(result => result)
  .catch(error => console.log('error', error));

  return result;
}


