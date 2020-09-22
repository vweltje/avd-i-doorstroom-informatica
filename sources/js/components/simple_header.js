export default class simple_header {
  constructor() {
    this.set_client_type();
    this.animate();
  }

  set_client_type() {
    this.is_desktop = $(window).width() >= window.breakpoint.medium;
    $(window).on("resize", () => {
      this.is_desktop = $(window).width() >= window.breakpoint.medium;
    });
  }

  animate() {
    $(window).on("scroll", () => {
      this.check_scroll();
    });
    this.check_scroll();
  }

  check_scroll() {
    if (!this.is_desktop) return;
    if ($(window).scrollTop() > 20) $("#menu").addClass("scrolled");
    else $("#menu").removeClass("scrolled");
  }
}
