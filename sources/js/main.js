"use_strict";

import Accordion from "./components/accordion.js";
import Cookie_notice from "./components/cookie_notice.js";
import Simple_header from "./components/simple_header.js";
import Inline_media from "./components/inline_media.js";

const init = () => {
  define_globals();

  $(() => {
    new Accordion();
    new Cookie_notice();
    new Simple_header();
    new Inline_media();
  });
};

const define_globals = () => {
  window.breakpoint = {
    extra_small: 450,
    small: 768,
    medium: 992,
    large: 1200,
    extra_large: 1440
  };
};

init();
