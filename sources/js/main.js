"use_strict";

import foldableList, {
  trigger as foldableListTrigger,
} from "./components/foldableList";

const init = () => {
  $(() => {
    $(foldableListTrigger).each((i, e) => {
      new foldableList(e);
    });
  });
};

init();
