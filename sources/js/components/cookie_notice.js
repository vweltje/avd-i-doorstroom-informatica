export default class cookie_notice {
  constructor() {
    this.on_cookie_agree();
  }

  on_cookie_agree() {
    $("#cookie-notice-agree").on("click", e => {
      e.preventDefault();
      this.create_cookie("os-base-theme-cookie-statement", "accepted", 365);
      $("#cookie-notice").slideUp({
        complete: () => {
          $("#cookie-notice").remove();
        }
      });
    });
  }

  create_cookie(name, value, days) {
    let expires = "";
    if (days) {
      const date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = `; expires=${date.toGMTString()}`;
    }
    document.cookie = `${name}=${value}${expires}; path=/`;
  }
}
