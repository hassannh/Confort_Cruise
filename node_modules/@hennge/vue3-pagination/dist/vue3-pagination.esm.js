import {openBlock,createBlock,createVNode,defineComponent,computed,pushScopeId,popScopeId,resolveComponent,toDisplayString,withScopeId,createCommentVNode,Fragment,renderList}from'vue';const _hoisted_1 = {
  viewBox: "0 0 8 2",
  fill: "none",
  xmlns: "http://www.w3.org/2000/svg"
};
const _hoisted_2 = /*#__PURE__*/createVNode("path", {
  d: "M2.24 1c0 .556-.445 1-1 1-.556 0-1-.444-1-1s.444-1 1-1c.555 0 1 .444 1 1zm5.333 0c0 .556-.444 1-1 1-.555 0-1-.444-1-1s.445-1 1-1c.556 0 1 .444 1 1z",
  fill: "#BBB"
}, null, -1 /* HOISTED */);

function render(_ctx, _cache) {
  return (openBlock(), createBlock("svg", _hoisted_1, [
    _hoisted_2
  ]))
}var script = defineComponent({
    name: 'VPage',
    components: { IconPaginationDots: render },
    props: {
        page: {
            type: Number,
            default: null,
        },
        current: {
            type: Number,
            default: 0,
        },
        activeColor: {
            type: String,
            default: '#DCEDFF',
        },
    },
    emits: ['update'],
    setup(props, { emit }) {
        const isActive = computed(() => {
            return props.page === props.current;
        });
        function clickHandler() {
            emit('update', props.page);
        }
        return { isActive, clickHandler };
    },
});const _withId = /*#__PURE__*/withScopeId("data-v-060ca318");

pushScopeId("data-v-060ca318");
const _hoisted_1$1 = {
  key: 0,
  class: "DotsHolder"
};
popScopeId();

const render$1 = /*#__PURE__*/_withId((_ctx, _cache, $props, $setup, $data, $options) => {
  const _component_icon_pagination_dots = resolveComponent("icon-pagination-dots");

  return (openBlock(), createBlock("li", null, [
    (_ctx.page === null)
      ? (openBlock(), createBlock("span", _hoisted_1$1, [
          createVNode(_component_icon_pagination_dots, { class: "Dots" })
        ]))
      : (openBlock(), createBlock("button", {
          key: 1,
          class: ["Page", { 'Page-active': _ctx.isActive }],
          type: "button",
          "aria-label": `Go to page ${_ctx.page}`,
          style: `background-color: ${_ctx.isActive ? _ctx.activeColor : 'transparent'};`,
          onClick: _cache[1] || (_cache[1] = (...args) => (_ctx.clickHandler && _ctx.clickHandler(...args)))
        }, toDisplayString(_ctx.page), 15 /* TEXT, CLASS, STYLE, PROPS */, ["aria-label"]))
  ]))
});script.render = render$1;
script.__scopeId = "data-v-060ca318";
script.__file = "src/components/atoms/VPage.vue";const _hoisted_1$2 = {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
};
const _hoisted_2$1 = /*#__PURE__*/createVNode("path", { d: "M18.41 16.59L13.82 12l4.59-4.59L17 6l-6 6 6 6 1.41-1.41M6 6h2v12H6V6z" }, null, -1 /* HOISTED */);

function render$2(_ctx, _cache) {
  return (openBlock(), createBlock("svg", _hoisted_1$2, [
    _hoisted_2$1
  ]))
}const _hoisted_1$3 = {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
};
const _hoisted_2$2 = /*#__PURE__*/createVNode("path", { d: "M5.59 7.41L10.18 12l-4.59 4.59L7 18l6-6-6-6-1.41 1.41M16 6h2v12h-2V6z" }, null, -1 /* HOISTED */);

function render$3(_ctx, _cache) {
  return (openBlock(), createBlock("svg", _hoisted_1$3, [
    _hoisted_2$2
  ]))
}const _hoisted_1$4 = {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
};
const _hoisted_2$3 = /*#__PURE__*/createVNode("path", { d: "M15.41 16.58L10.83 12l4.58-4.59L14 6l-6 6 6 6 1.41-1.42z" }, null, -1 /* HOISTED */);

function render$4(_ctx, _cache) {
  return (openBlock(), createBlock("svg", _hoisted_1$4, [
    _hoisted_2$3
  ]))
}const _hoisted_1$5 = {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
};
const _hoisted_2$4 = /*#__PURE__*/createVNode("path", { d: "M8.59 16.58L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.42z" }, null, -1 /* HOISTED */);

function render$5(_ctx, _cache) {
  return (openBlock(), createBlock("svg", _hoisted_1$5, [
    _hoisted_2$4
  ]))
}var script$1 = defineComponent({
    name: 'VPagination',
    components: { IconPageFirst: render$2, IconChevronLeft: render$4, IconChevronRight: render$5, IconPageLast: render$3, VPage: script },
    props: {
        pages: {
            type: Number,
            default: 0,
        },
        rangeSize: {
            type: Number,
            default: 1,
        },
        modelValue: {
            type: Number,
            default: 0,
        },
        activeColor: {
            type: String,
            default: '#DCEDFF',
        },
        hideFirstButton: {
            type: Boolean,
            default: false,
        },
        hideLastButton: {
            type: Boolean,
            default: false,
        },
    },
    emits: ['update:modelValue'],
    setup(props, { emit }) {
        // pagination
        const pagination = computed(() => {
            const res = [];
            const minPaginationElems = 5 + props.rangeSize * 2;
            let rangeStart = props.pages <= minPaginationElems ? 1 : props.modelValue - props.rangeSize;
            let rangeEnd = props.pages <= minPaginationElems ? props.pages : props.modelValue + props.rangeSize;
            rangeEnd = rangeEnd > props.pages ? props.pages : rangeEnd;
            rangeStart = rangeStart < 1 ? 1 : rangeStart;
            if (props.pages > minPaginationElems) {
                const isStartBoundaryReached = rangeStart - 1 < 3;
                const isEndBoundaryReached = props.pages - rangeEnd < 3;
                if (isStartBoundaryReached) {
                    rangeEnd = minPaginationElems - 2;
                    for (let i = 1; i < rangeStart; i++) {
                        res.push(i);
                    }
                }
                else {
                    res.push(1);
                    res.push(null);
                }
                if (isEndBoundaryReached) {
                    rangeStart = props.pages - (minPaginationElems - 3);
                    for (let i = rangeStart; i <= props.pages; i++) {
                        res.push(i);
                    }
                }
                else {
                    for (let i = rangeStart; i <= rangeEnd; i++) {
                        res.push(i);
                    }
                    res.push(null);
                    res.push(props.pages);
                }
            }
            else {
                for (let i = rangeStart; i <= rangeEnd; i++) {
                    res.push(i);
                }
            }
            return res;
        });
        function updatePageHandler(params) {
            emit('update:modelValue', params);
        }
        // controls
        const isPrevControlsActive = computed(() => {
            return props.modelValue > 1;
        });
        const isNextControlsActive = computed(() => {
            return props.modelValue < props.pages;
        });
        function goToFirst() {
            if (isPrevControlsActive.value) {
                emit('update:modelValue', 1);
            }
        }
        function goToPrev() {
            if (isPrevControlsActive.value) {
                emit('update:modelValue', props.modelValue - 1);
            }
        }
        function goToLast() {
            if (isNextControlsActive.value) {
                emit('update:modelValue', props.pages);
            }
        }
        function goToNext() {
            if (isNextControlsActive.value) {
                emit('update:modelValue', props.modelValue + 1);
            }
        }
        return {
            pagination,
            updatePageHandler,
            isPrevControlsActive,
            isNextControlsActive,
            goToFirst,
            goToLast,
            goToPrev,
            goToNext,
        };
    },
});const _withId$1 = /*#__PURE__*/withScopeId("data-v-2a30deb0");

pushScopeId("data-v-2a30deb0");
const _hoisted_1$6 = { class: "Pagination" };
const _hoisted_2$5 = {
  key: 0,
  class: "PaginationControl"
};
const _hoisted_3 = { class: "PaginationControl" };
const _hoisted_4 = { class: "PaginationControl" };
const _hoisted_5 = {
  key: 1,
  class: "PaginationControl"
};
popScopeId();

const render$6 = /*#__PURE__*/_withId$1((_ctx, _cache, $props, $setup, $data, $options) => {
  const _component_icon_page_first = resolveComponent("icon-page-first");
  const _component_icon_chevron_left = resolveComponent("icon-chevron-left");
  const _component_v_page = resolveComponent("v-page");
  const _component_icon_chevron_right = resolveComponent("icon-chevron-right");
  const _component_icon_page_last = resolveComponent("icon-page-last");

  return (openBlock(), createBlock("ul", _hoisted_1$6, [
    (!_ctx.hideFirstButton)
      ? (openBlock(), createBlock("li", _hoisted_2$5, [
          createVNode(_component_icon_page_first, {
            class: ["Control", { 'Control-active': _ctx.isPrevControlsActive }],
            onClick: _ctx.goToFirst
          }, null, 8 /* PROPS */, ["class", "onClick"])
        ]))
      : createCommentVNode("v-if", true),
    createVNode("li", _hoisted_3, [
      createVNode(_component_icon_chevron_left, {
        class: ["Control", { 'Control-active': _ctx.isPrevControlsActive }],
        onClick: _ctx.goToPrev
      }, null, 8 /* PROPS */, ["class", "onClick"])
    ]),
    (openBlock(true), createBlock(Fragment, null, renderList(_ctx.pagination, (page) => {
      return (openBlock(), createBlock(_component_v_page, {
        key: `pagination-page-${page}`,
        page: page,
        current: _ctx.modelValue,
        "active-color": _ctx.activeColor,
        onUpdate: _ctx.updatePageHandler
      }, null, 8 /* PROPS */, ["page", "current", "active-color", "onUpdate"]))
    }), 128 /* KEYED_FRAGMENT */)),
    createVNode("li", _hoisted_4, [
      createVNode(_component_icon_chevron_right, {
        class: ["Control", { 'Control-active': _ctx.isNextControlsActive }],
        onClick: _ctx.goToNext
      }, null, 8 /* PROPS */, ["class", "onClick"])
    ]),
    (!_ctx.hideLastButton)
      ? (openBlock(), createBlock("li", _hoisted_5, [
          createVNode(_component_icon_page_last, {
            class: ["Control", { 'Control-active': _ctx.isNextControlsActive }],
            onClick: _ctx.goToLast
          }, null, 8 /* PROPS */, ["class", "onClick"])
        ]))
      : createCommentVNode("v-if", true)
  ]))
});script$1.render = render$6;
script$1.__scopeId = "data-v-2a30deb0";
script$1.__file = "src/components/VPagination.vue";export default script$1;