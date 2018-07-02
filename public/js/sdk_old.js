var BtyBug = {
    my_window: null,
    result: null,
    client_id:null,
    tmp: [],
    init: function (client_id, client_secret) {
        this.client_secret = client_secret;
        this.client_id = client_id;
        if (this.findGetParameter('code')) {
            my_window.clone();
        }
        this.postSendAjax(this.access_token.url, this.access_token, function (success) {
            console.log(success);
            request = success;
        });
    },
    findGetParameter: function (parameterName) {
        location.search
            .substr(1)
            .split("&")
            .forEach(function (item) {
                this.tmp = item.split("=");
                if (this.tmp[0] === parameterName) this.result = decodeURIComponent(this.tmp[1]);
            });
        return this.result;
    },
    access_token: {
        url: 'http://forms.albumbugs.com/oauth/token',
        grant_type: 'client_credentials',
        client_id:  this.client_id,
        client_secret: this.client_secret,
        scope: '',
    },
    login: {
        url: 'http://forms.albumbugs.com/oauth/authorize',
        data: {
            'client_id':this.client_id,
            'redirect_uri': 'http://www.albumbugs.com/callback',
            // 'access_token':null,
            'response_type': 'code',
            'scope': '*'
        }
    },
    refreshToken: {
        'grant_type': 'refresh_token',
        'refresh_token': 'the-refresh-token',
        client_id: this.client_id,
        client_secret: this.client_secret,
        'scope': '',
    },
    get_access_token: {
        'grant_type': 'authorization_code',
        'client_id': 'client-id',
        'client_secret': 'client-secret',
        'redirect_uri': 'http://example.com/callback',
        'code': null,
    },
    callwindow: function () {
        console.log(this.login.data);
        this.my_window = window.open(this.login.url + '?' + $.param(this.login.data), "popupWindow", "width=600,height=600,scrollbars=yes");
    },
    postSendAjax: function (url, data, success, error) {
        $.ajax({
            type: 'post',
            url: url,
            cache: false,
            datatype: "json",
            data: data,
            success: function (data) {
                if (success) {
                    success(data);
                }
                return data;
            },
            error: function (errorThrown) {
                if (error) {
                    error(errorThrown);
                }
                return errorThrown;
            }
        });
    }
}
