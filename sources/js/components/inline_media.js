export default class Inline_media {
  constructor() {
    this.gallery();
    this.init_close_gallery();
  }

  gallery() {
    $(".inline-media").each((i, gallery) => {
      $(gallery)
        .find(".media")
        .each((i, media) => {
          this.media_click(media);
        });
    });
  }

  media_click(media) {
    $(media).on("click", e => {
      this.create_gallery(media);
    });
  }

  create_gallery(media) {
    $("body").append(
      `<div class="media-preview">
        <div class="media-preview-wrap">
        <svg id="media-preview-close" xmlns="http://www.w3.org/2000/svg" width="24.828" height="24.829">
          <g data-name="Group 115" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
            <path data-name="Line 19" d="M23.414 1.414l-22 22"/>
            <path data-name="Line 20" d="M23.414 23.414l-22-22"/>
          </g>
        </svg>
        ${this.get_gallery_content(media)}
        </div>
      </div>`
    );
    $("body").css("overflow", "hidden");
    $("body")
      .find(".media-preview")
      .animate({ opacity: 1 }, 300);
    $("body")
      .find(".media-preview-wrap")
      .animate({ "margin-top": 0 }, 300);
  }

  init_close_gallery() {
    $("body").on("click", ".media-preview-wrap", event => {
      event.stopPropagation();
    });
    $("body").on("click", ".media-preview, #media-preview-close", event => {
      if (!$(event.currentTarget).hasClass("media-preview-wrap")) {
        $("body")
          .find(".media-preview")
          .animate({ opacity: 0 }, 300);
        $("body")
          .find(".media-preview-wrap")
          .animate({ "margin-top": "10vh" }, 300, () => {
            $(".media-preview").remove();
            $("body").removeAttr("style");
          });
      }
    });
  }

  get_gallery_content(media) {
    const media_type = $(media).data("type");
    if (media_type === "image") {
      const image = $(media).find("img");
      return `<img src="${$(image).data("image-original")}" title="${image.attr(
        "title"
      )}" alt="${image.attr("alt")}" />
      <div class="media-preview-title">
      ${image.attr("title")}
      </div>`;
    } else {
      return `<iframe width="1120" height="630" src="${$(media).data(
        "video"
      )}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
    }
  }
}
