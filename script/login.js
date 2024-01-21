$(document).ready(function () {
  const signUp = $(".sign-up");
  const sTitle = $(".sign-up .title");
  const sFrom = $(".sign-up .login-form");
  const tLogin = $(".loginLink");
  const tSignUp = $(".signUpLink");

  tLogin.click(function () {
    tLogin.addClass("title-actived");
    tSignUp.removeClass("title-actived");
    sTitle.addClass("dis-active");
    sFrom.addClass("dis-active");
    signUp.removeClass("sign-up-actived");
  });

  tSignUp.click(function () {
    signUp.addClass("sign-up-actived");
    tSignUp.addClass("title-actived");
    tLogin.removeClass("title-actived");
    sTitle.removeClass("dis-active");
    sFrom.removeClass("dis-active");
  });
});
