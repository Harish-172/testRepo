class SetHttp{
    constructor(){
        /**set csrf token header for all ajax requests */
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
    }

    get(url, type, data={}){
        return this.callHttpRequest({
            type: "GET",
            url,
            data
        });
    }

    /*  Class http request to server  */
    
    callHttpRequest({type="POST", url, data={}}){
        let response = {
            xhr: null,
            subscribe: null
        };
        response.subscribe = ()=>{
            return new Promise((resolve, reject) => {
                response.xhr = $.ajax({
                    type: type,
                    url: url,
                    data:data
                }).done() 
            });
        }
    }
}
const SetHttp = new SetHttp();











class PrioHttp {
    constructor() {
        this.widgetId = prioWidgetConfigs.getConfigItem("widget_id");

        /**set csrf token header for all ajax requests */
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
    }

    /** used to send http get request */
    get({ url, data = {}, crossDomain = false, prioDomain = true }) {
        return this.callHttpRequest({
            type: "GET",
            url,
            data,
            crossDomain,
            prioDomain
        });
    }

    /** used to send http put request */
    put({ url, data = {}, crossDomain = false, prioDomain = true }) {
        return this.callHttpRequest({
            type: "put",
            url,
            data,
            crossDomain,
            prioDomain
        });
    }
    /** used to send http delete request */
    delete({ url, data = {}, crossDomain = false, prioDomain = true }) {
        return this.callHttpRequest({
            type: "DELETE",
            url,
            data,
            crossDomain,
            prioDomain
        });
    }

    /** used to send http post request */
    post({ url, data = {}, crossDomain = false, prioDomain = true }) {
        return this.callHttpRequest({
            type: "POST",
            url,
            data,
            crossDomain,
            prioDomain
        });
    }

    /** class http request to server */
    callHttpRequest({
        type = "POST",
        url,
        data = {},
        crossDomain = false,
        prioDomain = true
    }) {
        let response = {
            xhr: null,
            subscribe: null
        };
        response.subscribe = () => {
            return new Promise((resolve, reject) => {
                if (!prioWidgetConfigs.getConfigItem("is_widget_id_in_route")) {
                    if (prioDomain) url = `${prioBaseUrl}/${url}`;
                } else {
                    if (prioDomain) url = `${prioBaseUrl}/${this.widgetId}/${url}`;
                }

                response.xhr = $.ajax({
                    type: type,
                    url: url,
                    crossDomain: crossDomain,
                    dataType: "json",
                    data: data
                })
                    .done(xhrRresponse => {
                        if (prioDomain) {
                            if(xhrRresponse.gtmData) {
                                if(xhrRresponse.gtmData.gtmAddToCartEventData) {
                                    prioGoogleTagManager.productAddToCart(xhrRresponse.gtmData.gtmAddToCartEventData,prioWidgetConfigs.getConfigItem("GA4_enable"));
                                }

                                if (xhrRresponse.gtmData.tealiumAddToCartEventData) {
                                    prioTealiumManager.productAddToCart(xhrRresponse.gtmData.tealiumAddToCartEventData)
                                }

                                if(xhrRresponse.gtmData.gtmRemoveCartEventData) {
                                    prioGoogleTagManager.productRemoveFromCart(xhrRresponse.gtmData.gtmRemoveCartEventData,prioWidgetConfigs.getConfigItem("GA4_enable"));
                                }

                                if (xhrRresponse.gtmData.tealiumRemoveCartEventData) {
                                    prioTealiumManager.productRemoveFromCart(xhrRresponse.gtmData.tealiumRemoveCartEventData);
                                }
                            }

                            if(xhrRresponse.fbPixelData) {
                                prioFacebookPixel.fbq(xhrRresponse.fbPixelData)
                            }
                            if (xhrRresponse.redirect) {
                                window.location.href = xhrRresponse.redirect.url;
                            } else if (xhrRresponse.result) {
                                return resolve(xhrRresponse.result);
                            } else {
                                let errorMessage = prio.isKeyExistsInObject(
                                    xhrRresponse.error,
                                    "errorMessage"
                                )
                                    ? xhrRresponse.error.errorMessage
                                    : prioLang.trans("error.common_error");
                                prioErrorHanlder.showError(errorMessage);
                                return reject({
                                    errorMessage: errorMessage,
                                    errorDetails: prio.isKeyExistsInObject(
                                        xhrRresponse.error,
                                        "errorDetails"
                                    )
                                        ? xhrRresponse.error.errorDetails
                                        : null
                                });
                            }
                        } else {
                            return resolve(xhrRresponse);
                        }
                    })
                    .fail((xhr, textStatus, errorThrown) => {
                        if (prio.isKeyExistsInObject(xhr, "responseJSON")) {
                            let errorMessage = prio.isKeyExistsInObject(
                                xhr.responseJSON.error,
                                "errorMessage"
                            )
                                ? xhr.responseJSON.error.errorMessage
                                : prioLang.trans("error.common_error");
                            if (prio.isKeyExistsInObject(xhr.responseJSON, "message") && xhr.responseJSON.message == "CSRF token mismatch.") {
                                prioErrorHanlder.showError(prioLang.trans("error.csrf_token_error_message"));
                                window.location.reload();
                            } else if (xhr.statusText !== "abort") {
                                prioErrorHanlder.showError(errorMessage);
                            }

                            return reject({
                                errorMessage: errorMessage,
                                errorDetails: prio.isKeyExistsInObject(
                                    xhr.responseJSON.error,
                                    "errorDetails"
                                )
                                    ? xhr.responseJSON.error.errorDetails
                                    : null,
                                xhr: xhr
                            });
                        }
                        if (xhr.statusText !== "abort") {
                            prioErrorHanlder.showError(
                                prioLang.trans("error.common_error")
                            );
                        }
                        reject({
                            errorMessage: prioLang.trans("error.common_error"),
                            errorDetails: null,
                            xhr: xhr
                        });
                    });
            });
        };

        return response;
    }
}
// Create prioHttp object
const prioHttp = new PrioHttp();