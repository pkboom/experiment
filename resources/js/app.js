/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

let handleOutsideClick;

Vue.directive("closable", {
    bind(el, binding, vnode) {
        handleOutsideClick = e => {
            e.stopPropagation();
            const { handler, exclude } = binding.value;
            let clickedOnExcludedEl = false;
            exclude.forEach(refName => {
                if (!clickedOnExcludedEl) {
                    const excludedEl = vnode.context.$refs[refName];
                    clickedOnExcludedEl = excludedEl.contains(e.target);
                }
            });
            if (!el.contains(e.target) && !clickedOnExcludedEl) {
                vnode.context[handler]();
            }
        };
        document.addEventListener("click", handleOutsideClick);
        document.addEventListener("touchstart", handleOutsideClick);
    },

    unbind() {
        document.removeEventListener("click", handleOutsideClick);
        document.removeEventListener("touchstart", handleOutsideClick);
    }
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context("./", true, /\.vue$/i);
files.keys().map(key =>
    Vue.component(
        key
            .split("/")
            .pop()
            .split(".")[0],
        files(key).default
    )
);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
