var email = $("input.uEmail").val();

var OneSignal = window.OneSignal || [];
OneSignal.push(function() {
  OneSignal.init({
    appId: "4f816c01-60fc-425e-9c4c-57cd67cffb1b",
    autoRegister: false,
    notifyButton: {
      enable: true,
    },
    allowLocalhostAsSecureOrigin: true,
  });
  OneSignal.sendTag("email", email);
});
