/*
 jquery-param (c) 2015 KNOWLEDGECODE | MIT
*/
(function(h){var c=function(c){var f=[],g=function(d,a){a="function"===typeof a?a():a;a=null===a?"":void 0===a?"":a;f[f.length]=encodeURIComponent(d)+"="+encodeURIComponent(a)},e=function(d,a){var c;if(d)if(Array.isArray(a)){var b=0;for(c=a.length;b<c;b++)e(d+"["+("object"===typeof a[b]&&a[b]?b:"")+"]",a[b])}else if("[object Object]"===String(a))for(b in a)e(d+"["+b+"]",a[b]);else g(d,a);else if(Array.isArray(a))for(b=0,c=a.length;b<c;b++)g(a[b].name,a[b].value);else for(b in a)e(b,a[b]);return f};
    return e("",c).join("&")};"object"===typeof module&&"object"===typeof module.exports?module.exports=c:"function"===typeof define&&define.amd?define([],function(){return c}):h.param=c})(this);

var BtyBug = {
    my_window: null,
    result: null,
    init: function (client_id, client_secret) {
        this.client_secret = client_secret;
        this.client_id = client_id;
    },
    login: {
        url: 'http://forms.albumbugs.com/bty-api/authorize',
        data: {
            'client_id': null,
            'redirect_uri': null,
            'response_type': 'code',
            'scope': '*'
        }
    },
    callwindow: function (callback) {
        // console.log(callback(123));
        this.login.data.client_id = this.client_id;
        var strWindowFeatures = "location=yes,resizable=yes,scrollbars=yes,status=yes";
        var my_window = window;
        my_window.cms = {
            callback: callback,
            done: function () {
                my_window.close();
            }
        };
        my_window.open(this.login.url + '?' + window.param(this.login.data), "popupWindow", 'height=500,width=500');
        // this.my_window.proto
    },
    postSendAjax: function (url, data, success, error) {

        var xhr = new XMLHttpRequest();
        xhr.open('PUT', url);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function() {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                if (success) {
                    success(data);
                }
                return data;
            }else{
                var errorThrown = xhr.status;
                if (error) {
                    error(errorThrown);
                }
                return errorThrown;
            }
        };

        xhr.send(JSON.stringify(data));

        // $.ajax({
        //     type: 'post',
        //     url: url,
        //     cache: false,
        //     datatype: "json",
        //     data: data,
        //     success: function (data) {
        //         if (success) {
        //             success(data);
        //         }
        //         return data;
        //     },
        //     error: function (errorThrown) {
        //         if (error) {
        //             error(errorThrown);
        //         }
        //         return errorThrown;
        //     }
        // });
    }
};
