class setHttpForAjax{
    constructor(){
        /**set csrf token header for all ajax requests */
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
    }

    /* Send the post request */
    post({url, type, data={}}){
        return this.callHttpRequest({
            url,
            type: "POST",
            data
        });
    }

    /* Send the get request */
    get({url, type, data={}}){
        return this.callHttpRequest({
            url,
            type: "GET",
            data
        });
    }

    /*  Class http request to server  */
    
    callHttpRequest({url, type="POST", data={}}){
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
                }).done( xhrResponse =>{    
                    return resolve(xhrResponse.sucess);  
                }).fail((xhr, textStatus, errorThrown)=>{
                    return reject(xhr);
                })
            });
        }
        return response;
    }
}
var obj = new setHttpForAjax();


