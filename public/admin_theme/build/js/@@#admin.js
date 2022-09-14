"use strict";
class Admin{
    constructor(){
        this.addEvent()
        .then(res =>{
            console.log(res)
            // location.reload;
           })
        .catch( err =>alert(err));
    }

    addEvent(){
        $(document).on("click", ".delete-category", this.DeleteCategory);
    }

    DeleteCategory(){
        let categoryId = $(this).data('id'); 
        if(confirm("Are you want to delete the categpory")){
                return new Promise(function (resolve, reject){                     
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });            
                    $.ajax({
                        type: 'post',
                        url: 'delete/category',
                        data: {"categoryId": categoryId},    
                        success:function(res){
                            resolve(res);
                        },
                        error:function(err){
                            reject(err);
                        }
                    })
                });        
        }
    };



}
new Admin;