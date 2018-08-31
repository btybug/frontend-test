window._ = require("lodash");
window.Popper = require("popper.js").default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

// try {
//     window.$ = window.jQuery = require('jquery');

//     require('bootstrap');
// } catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
  console.error(
    "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
  );
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });]

console.log(122);

import EchoLibrary from "laravel-echo";
window.io = require("socket.io-client");
// Have this in case you stop running your laravel echo server
if (typeof io !== "undefined") {
  window.Echo = new EchoLibrary({
    broadcaster: "socket.io",
    host: window.location.hostname + ":6001"
  });
}

Echo.private("socket.io").listen("MessagePushed", e => {
  console.log(e);
  $("body")
    .find(`div[data-id=${e.post.id}]`)
    .append(`<div class=" col-md-12 red">${e.comment}</div>`);
});
Echo.private("socket.io").listen("CommentPushed", e => {
  let html = `<div class="message1">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <img src="${
                                                                  e.user
                                                                    .site_image
                                                                }" alt="">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="name">
                                                                    <span>${
                                                                      e.user
                                                                        .f_name
                                                                    } ${
    e.user.l_name
  }</span>
                                                                    <span style="color: #909090">${e.comment.created_at}</span>
                                                                </div>
                                                                <div class="text">
                                                                    <p>${
                                                                      e.comment
                                                                        .comment
                                                                    }</p>
                                                                </div>
                                                                <div class="reply">
                                                                    <span style="margin-right: 22px">Reply</span>
                                                                    <span>Light</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;
  $("body")
    .find(`.bug-comments-${e.bug_id}`)
    .append(html);
});
