export const trigger = ".foldable-list-trigger";
const container = ".foldable-list-container";

export default class foldableList {
  constructor(element) {
    this.$element = $(element);
    this.setConstants();
    this.onTriggerClick();
  }

  setConstants() {
    this.$container = this.$element.find(container);
    this.active = false;
    this.height = this.$container.find("ul").outerHeight();
  }

  onTriggerClick() {
    this.$element.on("click", () => {
      this.$container.css("height", !this.active ? this.height : 0);
      this.active = !this.active;
    });
  }
}
