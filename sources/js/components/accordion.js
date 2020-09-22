export default class Accordion {
  constructor() {
    this.handle_click();
  }

  handle_click() {
    $(".accordion .accordion-item .accordion-item-head").on("click", e => {
      this.item = e.currentTarget;
      this.slide_up_current();
      this.handle_icon();
      this.show_new_item();
    });
  }

  slide_up_current() {
    $(this.item)
      .closest(".accordion")
      .find(".accordion-item .accordion-item-head svg #vertical")
      .stop()
      .fadeIn()
      .closest(".accordion-item")
      .find("> div")
      .stop()
      .slideUp();
  }

  handle_icon() {
    if (
      !$(this.item)
        .find("+ div")
        .is(":visible")
    ) {
      $(this.item)
        .find("svg #vertical")
        .stop()
        .fadeOut();
    }
  }

  show_new_item() {
    $(this.item)
      .find("+ div")
      .stop()
      .slideToggle("slow", "swing", () => {
        this.update_scroll_position();
      });
  }

  update_scroll_position() {
    let top = $(this.item).offset().top,
      scroll = $(window).scrollTop() + $("#menu").height() + 20;
    if (top < scroll) {
      $("html, body").animate(
        {
          scrollTop: top - ($("#menu").height() + 10)
        },
        "slow"
      );
    }
  }
}
